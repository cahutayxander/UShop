<?php

use Livewire\Component;
use App\Models\Category;
use App\Models\ProductVariant;
use App\Interfaces\CategoryInterface;
use App\Interfaces\ProductInterface;
use Livewire\Attributes\Computed;
use App\Actions\CalculateProductDiscountAction;
use Illuminate\Database\Eloquent\Collection;
use App\Services\ProductPricingService;

new class extends Component
{
    protected CategoryInterface $categoryRepository;
    protected ProductInterface $productRepository;
    protected CalculateProductDiscountAction $discountAction;
    protected ProductPricingService $pricingService;
    public Category $category;          

    public function boot(
        CategoryInterface $categoryRepository, 
        ProductInterface $productRepository,
        CalculateProductDiscountAction $discountAction,
        ProductPricingService $pricingService
    ) {
        $this->categoryRepository = $categoryRepository;
        $this->productRepository = $productRepository;
        $this->discountAction = $discountAction;
        $this->pricingService = $pricingService;
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

    #[Computed]
    public function minimumSellingPrice(Collection $productVariants): float
    {
        return $this->pricingService->minimumSellingPrice($productVariants);
    }

    #[Computed]
    public function discountPercentage(Collection $productVariants): string
    {
        $sellingPrice = $this->pricingService->minimumSellingPrice($productVariants);
        $regularPrice = $this->pricingService->regularPrice($productVariants);
        
        return $this->discountAction->handle($sellingPrice, $regularPrice);
    }
};