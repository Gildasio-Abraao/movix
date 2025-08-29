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
        $otp = random_int(100000, 999999);
        $emailHash = hash('sha256', $user->email);

        Redis::set("otp:{$emailHash}", $otp, 'EX', 300);
        Mail::to($user->email)->send(New OtpMail($otp, $user->name));
    }
}
