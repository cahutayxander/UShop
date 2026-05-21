<?php

use Livewire\Component;
use App\Models\User;
use Livewire\Attributes\Computed;
use App\Services\AuthenticationService;

new class extends Component
{
    protected AuthenticationService $authenticationService;

    #[Computed]
    public function user(): User
    {
        return auth()->user();
    }

    public function boot(AuthenticationService $authenticationService)
    {
        $this->authenticationService = $authenticationService;
    }

    public function logout()
    {
        $this->authenticationService->logout();

        $this->redirect('login');
    }
};