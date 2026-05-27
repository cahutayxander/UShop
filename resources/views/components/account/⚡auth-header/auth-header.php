<?php

use Livewire\Component;
use App\Models\User;
use Livewire\Attributes\Computed;
use App\Services\AuthenticationService;
use App\Services\RoleService;
use Livewire\Attributes\On;

new class extends Component
{
    protected AuthenticationService $authenticationService;
    protected RoleService $roleService;

    #[Computed]
    public function user(): ?User
    {
        return auth()->user();
    }

    public function boot(AuthenticationService $authenticationService, RoleService $roleService)
    {
        $this->authenticationService = $authenticationService;
        $this->roleService = $roleService;
    }

    #[On('session-logout')]
    public function logout(): void
    {
        $this->authenticationService->logout();

        $this->redirect('/');
    }

    #[Computed]
    public function isSeller()
    {
        if (!$this->user) {
            return false;
        }

        return $this->roleService->isSeller($this->user->role_id);
    }
};