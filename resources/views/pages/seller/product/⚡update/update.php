<?php

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use App\Models\Product;
use App\Actions\UpdateProductAction;
use App\Dtos\CreateUpdateProductDto;

new #[Layout('layouts.seller')] class extends Component
{
    public Product $product;
    protected UpdateProductAction $updateProductAction;

    public function boot(UpdateProductAction $updateProductAction): void
    {
        $this->updateProductAction = $updateProductAction;
    }

    public function mount(Product $product)
    {
        $this->product = $product;
    }

    #[On('updateProduct')]
    public function handleProductUpdate(int $productId, CreateUpdateProductDto $payload, array $existingImages, array $images): void
    {
        $this->updateProductAction->handle(
            $productId,
            $payload,
            $existingImages,
            $images
        );
    }

};