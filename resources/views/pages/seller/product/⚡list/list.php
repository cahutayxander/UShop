<?php

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Category;
use App\Models\ProductVariant;
use App\Interfaces\CategoryInterface;
use App\Interfaces\ProductInterface;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Url;
use Illuminate\Database\Eloquent\Collection;

new #[Layout('layouts.seller')] class extends Component
{
    use WithPagination;

    protected CategoryInterface $categoryRepository;
    protected ProductInterface $productRepository;

    public $categoryIds = [];

    #[Url(as: 'sort')]
    public string $sortBy = 'latest';

    #[Url(as: 'order')]
    public string $sortOrder = 'desc';

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
    public function sellerProductsByCategory()
    {
        return $this
            ->productRepository
            ->sellerProductsByCategory(
                auth()->user()->productSeller->id,
                $this->categoryIds,
                15,
                $this->sortBy,
                $this->sortOrder
            );
    }

    public function setSort(string $sortBy)
    {
        if ($sortBy === 'price') {
            if ($this->sortBy === 'price') {
                $this->sortOrder = $this->sortOrder === 'asc' ? 'desc' : 'asc';
            } else {
                $this->sortOrder = 'asc';
            }
        } else {
            $this->sortOrder = 'desc';
        }

        $this->sortBy = $sortBy;
        $this->resetPage();
    }
};