<?php

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Services\AuthenticationService;

new #[Layout('layouts.account', ['action' => 'Login'])] class extends Component
{
    public bool $isForSeller = false;
    public $username;
    public $password;

    public function mount()
    {
        $this->isForSeller = request()->is('seller/login');
    }

    // TODO: for method render, conditional action text seller center for seller then login for buyer

    protected AuthenticationService $authenticationService;

    public function boot(AuthenticationService $authenticationService)
    {
        $this->authenticationService = $authenticationService;
    }

    public function login()
    {
        $this->authenticationService->login($this->username, $this->password);

        $redirectPath = $this->isForSeller ? '/seller/welcome' : '/';

        $this->redirect($redirectPath);
    }
};