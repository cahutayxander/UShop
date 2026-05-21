<?php

use Livewire\Component;
use App\Services\AuthenticationService;

new class extends Component
{
    public $username;
    public $password;

    protected AuthenticationService $authenticationService;

    public function boot(AuthenticationService $authenticationService)
    {
        $this->authenticationService = $authenticationService;
    }

    public function login()
    {
        $this->authenticationService->login($this->username, $this->password);

        $this->redirect('/seller/welcome');
    }
};