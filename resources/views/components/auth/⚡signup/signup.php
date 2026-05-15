<?php

use Livewire\Component;
use Livewire\Attributes\Validate;
use App\Services\OtpService;
use App\Interfaces\UserInterface;
use Livewire\Attributes\On;

new class extends Component
{
    protected OtpService $otpService;
    protected UserInterface $userRepository;

    // public $verificationStep = 0;
    // public $passwordSetup = false;
    public $verificationStep = 1;
    public $passwordSetup = false;
    public $isUserRegistered = true;
    public $code = [];
    
    // #[Validate('required|email')]
    #[Validate('required')]
    public $email;

    public function boot(OtpService $otpService, UserInterface $userRepository)
    {
        $this->otpService = $otpService;
        $this->userRepository = $userRepository;
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
            // session()->flash('error', 'Invalid code.');

            return;
        }

        $this->passwordSetup = true;

        // return redirect()->route('login');
    }

    #[On('password-set')]
    public function registerUser(string $password): void
    {
        // $user = $this->userRepository->create([
        //     'email' => $this->email,
        //     'password' => $password,
        // ]);

        $this->passwordSetup = false;
        // $this->isSuccess = true;
    }
};