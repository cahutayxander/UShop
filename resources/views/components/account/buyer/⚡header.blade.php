<?php

use Livewire\Component;
use App\Models\User;

new class extends Component
{
    public ?User $user;

    public function mount(User $user = null)
    {
        $this->user = $user;
    }

    public function logout()
    {
        $this->dispatch('session-logout');
    }
};
?>

<nav class="flex flex-wrap items-center gap-3">
    <a href="#" class="transition hover:text-orange-100">Notifications</a>
    <a href="#" class="transition hover:text-orange-100">Help</a>

    @if (! $user)
        <a href="/buyer/signup" wire:navigate class="font-semibold transition hover:text-orange-100">Sign Up</a>
        <span class="hidden h-4 w-px bg-orange-300 sm:block"></span>
        <a href="/buyer/login" wire:navigate class="font-semibold transition hover:text-orange-100">Login</a>
    @else
        <div x-data="{ open: false }" @click.away="open = false" class="relative z-50">
            <button @click="open = !open" class="flex items-center space-x-2 cursor-pointer focus:outline-none select-none text-left">
                <div class="h-8 w-8 rounded-full bg-[#7a4c43] text-white flex items-center justify-center font-semibold text-sm shadow-sm transition hover:opacity-95">
                    A
                </div>
                <span class="text-sm font-medium text-gray-700 hover:text-gray-900 transition">
                    {{ $this->user?->email }}
                </span>
            </button>

            <div x-show="open"
                x-transition:enter="transition ease-out duration-100 transform"
                x-transition:enter-start="opacity-0 scale-95"
                x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-75 transform"
                x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-95"
                class="absolute right-0 mt-2 w-48 rounded-sm bg-white py-1.5 shadow-md border border-gray-100 focus:outline-none"
                style="display: none;"
            >
                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 transition-colors">My Account</a>
                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 transition-colors">My Purchase</a>

                <div class="border-t border-gray-100 my-1"></div>
                <button type="button" wire:click="logout" class="w-full text-left block px-4 py-2 text-sm text-[#ee4d2d] hover:bg-red-50 transition-colors font-medium">
                    Logout
                </button>
            </div>
        </div>
    @endif
</nav>