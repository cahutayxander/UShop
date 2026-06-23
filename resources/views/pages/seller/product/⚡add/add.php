<?php

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use App\Dtos\CreateUpdateProductDto;
use App\Actions\CreateProductAction;

new #[Layout('layouts.seller')] class extends Component
{
    protected CreateProductAction $createProductAction;

    public function boot(CreateProductAction $createProductAction): void
    {
        $this->createProductAction = $createProductAction;
    }

    #[On('createProduct')]
    public function handleProductCreation(CreateUpdateProductDto $payload, array $images): void
    {
        $this->createProductAction->handle(
            $payload,
            $images
        );
    }
};