<?php

use Livewire\Component;
use App\Interfaces\ProductInterface;
use App\Models\Product;
use Livewire\Attributes\Computed;

new class extends Component
{
    protected ProductInterface $productRepository;
    public Product $product;

    public function boot(ProductInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function mount(Product $product)
    {
        $this->product = $product;
    }

    #[Computed]
    public function product()
    {
        return $this->productRepository->find($this->product->id);
    }
};