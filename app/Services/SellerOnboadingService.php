<?php

namespace App\Services;

use App\Interfaces\ProductSellerInterface;
use Illuminate\Validation\ValidationException;

class SellerOnboadingService 
{
    public function __construct(
        private readonly ProductSellerInterface $sellerRepository,
        private readonly OtpService $otpService
    ) {}

    public function handle(array $data): void
    {
        \Log::info($data);
        // 1. Verify OTP
        if (! $this->otpService->verifyCode($data['phone_number'], $data['otp'])) {
            throw ValidationException::withMessages([
                'invalid_otp' => 'Invalid OTP code'
            ]);
        }
        
        $user = auth()->user();
        
        // 2. Update USER info
        $user->update([
            'phone_number' => $data['phone_number'],
        ]);
        
        // 3. Attached user to sellers table
        $this->sellerRepository->create([
            'user_id' => $user->id,
            'shop_name' => $data['shop_name'],
            'address' => $data['address'],
            'zip_code' => $data['zip_code'],
        ]);
    }
}