<?php

use Livewire\Component;
use Livewire\Attributes\Validate;
use App\Services\OtpService;
use App\Interfaces\UserInterface;
use Livewire\Attributes\On;
use Livewire\Attributes\Computed;
use App\Services\RegisterUserService;
use App\Services\AuthenticationService;

new class extends Component
{
    protected OtpService $otpService;
    protected RegisterUserService $registerUserService;
    protected AuthenticationService $authenticationService;

    public int $verificationStep = 0;
    public bool $passwordSetup = false;
    public bool $isUserRegistered = false;
    public string $otpType = 'email';

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
        AuthenticationService $authenticationService,
    ) {
        $this->otpService = $otpService;
        $this->registerUserService = $registerUserService;
        $this->authenticationService = $authenticationService;
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

    public function resendCode(): void
    {
        $this->sendCode($this->otpType);
    }

    public function sendCode(string $otpType): void
    {
        $this->otpType = $otpType;
        $this->verificationStep = 2;

        $this->otpService->process($otpType, $this->email);
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

        $this->authenticationService->login($user->email, $password);

        $this->passwordSetup = false;
        $this->isUserRegistered = true;
    }
};