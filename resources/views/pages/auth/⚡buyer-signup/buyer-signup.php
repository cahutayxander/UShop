<?php

use Livewire\Component;
use Livewire\Attributes\Layout;

new #[Layout('layouts.auth', ['action' => 'Sign Up'])] class extends Component
{
    public $phoneNumber;

    public function submit()
    {
        // Placeholder for sending OTP
    }
};
