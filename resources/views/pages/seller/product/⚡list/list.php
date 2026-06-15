<?php

use Livewire\Component;
use App\Models\Category;
use App\Models\ProductVariant;
use App\Interfaces\CategoryInterface;
use App\Interfaces\ProductInterface;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Illuminate\Database\Eloquent\Collection;

new #[Layout('layouts.seller')] class extends Component
{
    protected CategoryInterface $categoryRepository;
    protected ProductInterface $productRepository;

    public $categoryIds = [];

    public function boot(
        CategoryInterface $categoryRepository, 
        ProductInterface $productRepository,
    ) {
        $this->categoryRepository = $categoryRepository;
        $this->productRepository = $productRepository;
    }

    #[Computed]
    public function categories()
    {
        return $this->categoryRepository->all();
    }

    #[Computed]
    public function productsByCategory()
    {
        return $this
            ->productRepository
            ->productsByCategory($this->categoryIds);
    }
};