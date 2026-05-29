<?php

use Livewire\Component;
use Livewire\Attributes\Layout;

new #[Layout('layouts::auth', ['action' => ''])] class extends Component
{
    public function mount()
    {
        // if (auth()->user()->productSeller) {
        //     return $this->redirect('seller/onboarding');
        // }
        // 1. Redirect guests to login
        // if (!auth()->check()) {
        //     return $this->redirect('seller/login');
        // }
        
        // // 2. Redirect existing sellers to the home page
        // if (auth()->user()->productSeller) {
        //     return $this->redirect('/');
        // }
    }
};