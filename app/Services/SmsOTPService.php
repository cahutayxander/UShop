<?php

namespace App\Services;
use App\Interfaces\OtpSenderInterface;

class SmsOTPService implements OtpSenderInterface
{
    public function send(string $code, string $toWhom): void
    {
        // Logic for sending OTP via sms
    }
}