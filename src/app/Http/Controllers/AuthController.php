<?php

namespace App\Http\Controllers;

use App\Abilities;
use App\Events\VerificationCodeRequested;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;

class AuthController extends Controller
{
    public function login(Request $request): JsonResponse
    {
        $request->validate([
            'email' => 'required|string|exists:users|max:255',
            'password' => 'required|min:8'
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        if(!$user->active) {
            event(new VerificationCodeRequested($user));

            return response()->json([
                'active' => false,
                'message' => 'Your account is not active'
            ], 401);
        }

        $user->tokens()->delete();
        $token = $user->createToken(
            $request->email,
            [Abilities::Delivery->value],
            Carbon::now()->addDays(3),
        );

        return response()->json([ 'token' => $token->plainTextToken, 'user' => $user ], 200);
    }

    public function register(Request $request): JsonResponse
    {
        $fields = $request->validate([
            'email' => 'required|string|email|unique:users,email|max:255',
            'name' => 'required|string|max:255|min:3',
            'document' => 'required|string|unique:users,document',
            'password' => 'required|string|min:8',
        ]);

        $user = User::create($fields);

        event(new VerificationCodeRequested($user));

        return response()->json([ 'created' => true ], 200);
    }

    public function logout(Request $request): JsonResponse
    {
        $request->user()->tokens()->delete();

        return response()->json([ 'message' => 'You have been logged out' ], 200);
    }

    public function confirmAccount(Request $request): JsonResponse
    {
        $fields = $request->validate([
            'email' => 'required|string',
            'code' => 'required|string|min:6|max:6'
        ]);

        $redis_code = Redis::get("otp:{$request->email}");

        if($redis_code != $fields['code']) {
            return response()->json([ 'message' => 'Invalid token' ], 401);
        }

        Redis::del("otp:{$request->email}");
        User::where('email', $request->email)
            ->update([
                'active' => true,
                'email_verified_at' => Carbon::now(),
            ]);

        $user = User::where('email', $request->email)->first();
        $token = $user->createToken(
            $user->email,
            [Abilities::Delivery->value],
            Carbon::now()->addDays(3),
        );

        return response()->json([
            'success' => true,
            'token' => $token->plainTextToken
        ], 200);
    }

    public function resendCode(Request $request): JsonResponse {
        $fields = $request->validate([
            'email' => 'required|string|exists:users|max:255',
        ]);
        $user = User::where('email', $fields['email'])->first();

        if(!$user || $user->active) {
            return response()->json([ 'message' => 'Invalid User' ], 401);
        }

        event(new VerificationCodeRequested($user));

        return response()->json([ 'success' => true ], 200);
    }

    public function dashboard(Request $request): JsonResponse {
        if(!$request->user()->tokenCan(Abilities::Delivery->value)) {
            return response()->json(['message' => 'Access Denied'], 401);
        }

        return response()->json([
            'success' => true,
        ]);
    }
}
