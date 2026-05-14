<?php

use Livewire\Component;
use Livewire\Attributes\Validate;
use App\Services\OtpService;

new class extends Component
{
    protected OtpService $otpService;

    public $step = 0;
    public $code = [];
    
    // #[Validate('required|email')]
    #[Validate('required')]
    public $email;

    public function boot(OtpService $otpService)
    {
        $this->otpService = $otpService;
    }

    public function submit(): void
    {
        $this->validate();

        $this->step = 1;
    }

    public function sendCode(string $type): void
    {
        $this->step = 2;

        // $this->otpService->process($type, $this->email);
    }

    public function verifyCode()
    {
        if (! $this->otpService->verifyCode($this->email, implode('', $this->code))) {
            // session()->flash('error', 'Invalid code.');

            return;
        }

        // return redirect()->route('login');
    }
};