<?php

use Livewire\Component;
use Livewire\Attributes\Validate;

new class extends Component
{
    public $startVerification = false;
   
    // #[Validate('required|email')]
    #[Validate('required')]
    public $email;

    // #[Validate('required|integer|min:4')]
    // public $code;

    public function submit()
    {
        $this->validate();

        $this->startVerification = true;
    }

    public function sendCode(string $type)
    {
        // $this->startVerification = true;
    }
};