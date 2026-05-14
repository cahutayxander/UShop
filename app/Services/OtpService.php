<?php

namespace App\Services;

use App\Factories\OtpSenderFactory;
use Illuminate\Support\Facades\Cache;

class OtpService
{
    private string $cacheKey = 'otp_';

    /**
     * Generates the cache key for OTP
     * 
     * @param string $toWhom
     * @return string
     */
    private function cacheKey(string $toWhom): string
    {
        return $this->cacheKey . $toWhom;
    }

    /**
     * Sends OTP code to the user
     * 
     * @param string $via
     * @param string $toWhom
     * @return void
     */
    public function sendCode(string $via, string $toWhom): void
    {
        // TODO: later on let us create a service or class helper that would generate the code
        $code = rand(100000, 999999);
        $expiration = now()->addMinutes(5);

        // 1. Save code to Cache for 5 minutes
        Cache::put($this->cacheKey($toWhom), $code, $expiration);

        // 2. Get the right sender class from the factory
        $otpSender = OtpSenderFactory::make($via);

        // 3. Send the code now
        $otpSender->send($code, $toWhom);
    }

    /**
     * Verifies the OTP code sent to the user
     *  
     * @param string $toWhom
     * @param string $codeFromUser
     * @return bool
     */
    public function verifyCode(string $toWhom, string $codeFromUser): bool
    {
        $codeInCache = Cache::get($this->cacheKey($toWhom));

        if (! $codeInCache || $codeFromUser !== $codeInCache) {
            return false;
        }

        // Success! Remove it so it can't be used again
        Cache::forget($this->cacheKey($toWhom));

        return true;
    }
}