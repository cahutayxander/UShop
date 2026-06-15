<?php

use Livewire\Component;
use App\Models\Product;
use App\Models\ProductVariant;
use Livewire\Attributes\Computed;
use App\Actions\CalculateProductDiscountAction;
use Illuminate\Database\Eloquent\Collection;
use App\Services\ProductPricingService;

new class extends Component
{
    protected ProductInterface $productRepository;
    protected CalculateProductDiscountAction $discountAction;
    protected ProductPricingService $pricingService;
    public Product $product;          

    public function boot(
        CalculateProductDiscountAction $discountAction,
        ProductPricingService $pricingService
    ) {
        $this->discountAction = $discountAction;
        $this->pricingService = $pricingService;
    }

    public function mount(Product $product)
    {
        $this->product = $product;
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