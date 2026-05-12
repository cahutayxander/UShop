<?php

use Livewire\Component;
use Livewire\Attributes\Layout;

new #[Layout('layouts.auth', ['action' => 'Be A Seller'])] class extends Component
{
    public $phoneNumber;

    public function submit()
    {
        // Placeholder for sending OTP
    }
};
