<?php

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Category;
use App\Interfaces\CategoryInterface;
use App\Interfaces\ProductInterface;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Url;

new class extends Component
{
    use WithPagination;

    protected CategoryInterface $categoryRepository;
    protected ProductInterface $productRepository;
    public Category $category;          

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

    public function mount(Category $category)
    {
        $this->category = $category;
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
            ->productsByCategory(
                $this->category->id,
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