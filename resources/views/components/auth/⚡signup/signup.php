<?php

use Livewire\Component;
use Livewire\Attributes\Validate;
use App\Services\OtpService;
use App\Interfaces\UserInterface;
use Livewire\Attributes\On;
use Livewire\Attributes\Computed;
use App\Services\RegisterUserService;

new class extends Component
{
    protected OtpService $otpService;
    protected RegisterUserService $registerUserService;

    public $verificationStep = 0;
    public $passwordSetup = false;
    public $isUserRegistered = false;

    // public $verificationStep = 1;
    // public $passwordSetup = true;
    // public $isUserRegistered = false;
    
    public $code = [];
    
    // #[Validate('required|email')]
    #[Validate('required')]
    public $email;

    public function boot(
        OtpService $otpService, 
        RegisterUserService $registerUserService,
    ) {
        $this->otpService = $otpService;
        $this->registerUserService = $registerUserService;
    }

    #[Computed]
    public function isRegistrationDone()
    {
        return $this->passwordSetup || $this->isUserRegistered;
    }

    public function hasRequestedOTP()
    {

    }

    public function startVerification(): void
    {
        $this->validate();

        $this->verificationStep = 1;
    }

    public function sendCode(string $type): void
    {
        $this->verificationStep = 2;

        $this->otpService->process($type, $this->email);
    }

    public function verifyCode()
    {
        if (! $this->otpService->verifyCode($this->email, implode('', $this->code))) {
            session()->flash('otp_error', 'Code provided is incorrect!');
            return;
        }

        $this->passwordSetup = true;
    }

    #[On('password-set')]
    public function registerUser(string $password): void
    {
        $user = $this->registerUserService->createSeller([
            'email' => $this->email,
            'password' => $password,
        ]);

        $this->passwordSetup = false;
        $this->isUserRegistered = true;
    }
};