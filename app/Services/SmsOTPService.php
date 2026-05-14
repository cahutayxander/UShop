<?php

namespace App\Services;
use App\Interfaces\OtpSenderInterface;

class SmsOTPService implements OtpSenderInterface
{
    public function send($code): void
    {
        // Logic for sending OTP via sms
    }
}