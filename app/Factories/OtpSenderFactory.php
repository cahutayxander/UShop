<?php

namespace App\Factories;

use Exception;
use App\Interfaces\OtpSenderInterface;
use App\Services\EmailOTPService;
use App\Services\SmsOTPService;

class OtpSenderFactory
{
    public function make(string $via): OtpSenderInterface
    {
        return match ($via) {
            'email' => app(EmailOTPService::class),
            'sms' => app(SmsOTPService::class),
            default => throw new Exception('Invalid OTP type'),
        };
    }
}