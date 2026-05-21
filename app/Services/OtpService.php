<?php

namespace App\Services;

use App\Factories\OtpSenderFactory;
use Illuminate\Support\Facades\Cache;
use Exception;
use Illuminate\Validation\ValidationException;

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
     * Processes the OTP request
     * 
     * @param string $type
     * @param string $toWhom
     * @return void
     */
    public function process(string $type, string $toWhom): void
    {
        $this->isTypeValid($type);

        $this->processRequestRejection($toWhom);

        $this->sendCode($type, $toWhom);
    }

    /**
     * Checks if there is an existing OTP for the user
     * 
     * @param string $toWhom
     * @return void
     */
    public function processRequestRejection(string $toWhom): void
    {
        if (! Cache::has($this->cacheKey($toWhom))) {
            return;
        }

        throw ValidationException::withMessages([
            'multiple_otp_request_prevention' => 'You have requested verification codes too frequently. Please try again later.'
        ]);
    }

    /**
     * Checks if the type of OTP is valid
     * 
     * @param string $type
     * @return void
     */
    public function isTypeValid(string $type): void
    {
        if (! in_array($type, ['email', 'sms'])) {
            throw new Exception("Invalid OTP type");
        }
    }

    /**
     * Sends OTP code to the user
     * 
     * @param string $type
     * @param string $toWhom
     * @return void
     */
    public function sendCode(string $type, string $toWhom): void
    {
        // TODO: later on let us create a service or class helper that would generate the code
        $code = rand(100000, 999999);
        $expiration = now()->addMinutes(5);

        \Log::info($code);
        // 1. Save code to Cache for 5 minutes
        Cache::put($this->cacheKey($toWhom), $code, $expiration);

        // 2. Get the right sender class from the factory
        $otpSender = OtpSenderFactory::make($type);

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

        if (! $codeInCache || (string) $codeFromUser !== (string) $codeInCache) {
            return false;
        }

        // Success! Remove it so it can't be used again
        Cache::forget($this->cacheKey($toWhom));

        return true;
    }
}