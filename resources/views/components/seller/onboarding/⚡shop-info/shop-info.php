<?php

use Livewire\Attributes\Validate;
use Livewire\Component;
use App\Services\SellerOnboadingService;
use App\Services\OtpService;

new class extends Component
{
    protected SellerOnboadingService $sellerOnboardingService;
    protected OtpService $otpService;

    #[Validate('required', message: 'Shop name is required')]
    #[Validate('min:5', message: 'Shop name must be at least 5 characters')]
    #[Validate('max:30', message: 'Shop name must be at most 30 characters')]
    public string $shopName = '';

    #[Validate('required', message: 'Address is required')]
    public string $address = '';

    #[Validate('required', message: 'Zip code is required')]
    #[Validate('digits:4', message: 'Zip code must be at most 4 digits')]
    public string $zipCode = '';

    #[Validate('required', message: 'Phone number is required')]
    #[Validate('digits:10', message: 'Phone number must be exactly 10 digits')]
    public string $phoneNumber = '';

    #[Validate('required', message: 'Verification code is required')]
    #[Validate('digits:6', message: 'Verification code must be exactly 6 digits')]
    public string $otpCode = '';

    public function boot(
        SellerOnboadingService $sellerOnboardingService,
        OtpService $otpService
    ) {
        $this->sellerOnboardingService = $sellerOnboardingService;
        $this->otpService = $otpService;
    }

    public function sendOtp(): void
    {
        $this->validateOnly('phoneNumber');

        try {
            $this->otpService->process('sms', $this->phoneNumber);
            session()->flash('otp_message', 'Verification code sent successfully!');
        } catch (\Exception $e) {
            $this->addError('phoneNumber', $e->getMessage());
        }
    }

    public function save(): void
    {
        $this->validate();
        
        $this->sellerOnboardingService->handle([
            'shop_name' => $this->shopName,
            'address' => $this->address,
            'zip_code' => $this->zipCode,
            'phone_number' => $this->phoneNumber,
            'otp' => $this->otpCode,
        ]);

        session()->flash('success', 'Seller onboarding completed successfully');
    }
};