<?php

use Livewire\Component;
use App\Models\Product;
use App\Models\ProductVariant;
use Livewire\Attributes\Computed;
use App\Actions\CalculateProductDiscountAction;
use Illuminate\Database\Eloquent\Collection;
use App\Services\ProductPricingService;
use App\Services\RoleService;

new class extends Component
{
    protected ProductInterface $productRepository;
    protected CalculateProductDiscountAction $discountAction;
    protected ProductPricingService $pricingService;
    protected RoleService $roleService;
    public Product $product;          

    public function boot(
        CalculateProductDiscountAction $discountAction,
        ProductPricingService $pricingService,
        RoleService $roleService,
    ) {
        $this->discountAction = $discountAction;
        $this->pricingService = $pricingService;
        $this->roleService = $roleService;
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

    #[Computed]
    public function linkToRedirect(): string
    {
        $isSeller = $this->roleService->isSeller(auth()->user()->role_id);
        if($isSeller) {
            return "/seller/products/{$this->product->id}/update";
        }

        return "/category/{$this->product->category_id}/{$this->product->id}";
    }
};