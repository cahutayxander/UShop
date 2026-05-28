<?php

use Livewire\Attributes\Validate;
use Livewire\Component;

new class extends Component
{
    #[Validate('required', message: 'Shop name is required')]
    #[Validate('min:5|max:30', message: 'Shop name must be between 5 and 30 characters')]
    public string $shopName;

    #[Validate('required', message: 'Address is required')]
    public string $address;

    #[Validate('required', message: 'Zip code is required')]
    public string $zipCode;

    #[Validate('required|digits:11', message: 'Phone number is required')]
    public string $phoneNumber;

    #[Validate('required|digits:6', message: 'Verification code is required')]
    public string $verificationCode;
    
    public function save(): void
    {
        $this->validate();
    }
};