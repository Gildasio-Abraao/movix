<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request): JsonResponse
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|min:8'
        ]);

        $user = User::where('email', $request->email)->first();

        if(!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([ 'message' => 'Invalid Credentials' ], 401);
        }

        $token = $user->createToken($request->email);

        return response()->json([  'token' => $token->plainTextToken, 'user' => $user ], 200);
    }

    public function register(Request $request): JsonResponse
    {
        $fields = $request->validate([
            'email' => 'required|string',
            'name' => 'required|max:255',
            'password' => 'required|string',
        ]);

        $user = User::create($fields);
        $token = $user->createToken($request->email);

        return response()->json([ 'token' => $token->plainTextToken, 'user' => $user ], 200);
    }

    public function logout(Request $request): JsonResponse
    {
        $request->user()->tokens()->delete();

        return response()->json([ 'message' => 'You have been logged out' ], 200);
    }
}
