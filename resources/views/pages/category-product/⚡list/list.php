<?php

use Livewire\Component;
use App\Models\Category;
use App\Interfaces\CategoryInterface;
use App\Interfaces\ProductInterface;
use Livewire\Attributes\Computed;

new class extends Component
{
    protected CategoryInterface $categoryRepository;
    protected ProductInterface $productRepository;
    public Category $category;          

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
            ->productsByCategory($this->category->id);
    }
};