<?php

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;

new #[Layout('layouts.auth')] class extends Component
{
    #[On('user-is-verified-seller')]
    public function onSellerProfileSaved(): void
    {
        // Just receiving this event triggers a re-render.
        // hasVerifiedProfile() will be re-computed automatically.
    }

    #[Computed(cache: false)]
    public function hasVerifiedProfile()
    {
        return auth()->user()->productSeller;
    }
};