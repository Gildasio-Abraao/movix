<?php

namespace App\Listeners;

use App\Events\VerificationCodeRequested;
use App\Mail\OtpMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redis;

class SendOTPCode
{
    public function handle(VerificationCodeRequested $event): void
    {
        $user = $event->user;
        $otp = rand(100000, 999999);

        Redis::set("otp:{$user->email}", $otp, 'EX', 300);
        Mail::to($user->email)->send(New OtpMail($otp, $user->name));
    }
}
