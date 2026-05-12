<?php

use Livewire\Component;
use App\Interfaces\ProductInterface;
use App\Models\Product;
use Livewire\Attributes\Computed;
use App\Actions\CalculateProductDiscountAction;
use App\Services\ProductPricingService;

new class extends Component
{
    public string $currency = '₱';
    public int $totalQuantity = 1;
    public bool $isQtyExceeded = false;

    protected ProductInterface $productRepository;
    protected CalculateProductDiscountAction $discountAction;
    public Product $product;

    public function boot(
        ProductInterface $productRepository, 
        CalculateProductDiscountAction $discountAction,
        ProductPricingService $pricingService
    ) {
        $this->productRepository = $productRepository;
        $this->discountAction = $discountAction;
        $this->pricingService = $pricingService;
    }

    public function mount(Product $product)
    {
        $this->product = $product;
    }

    #[Computed]
    public function product()
    {
        return $this->productRepository->find($this->product->id, ['productVariants', 'productReviews']);
    }

    #[Computed]
    public function productReviews()
    {
        return $this->product->productReviews;
    }

    #[Computed]
    public function productVariants()
    {
        return $this->product->productVariants;
    }

    #[Computed]
    public function totalRatings(): int
    {
        return $this->productReviews->count();
    }

    #[Computed]
    public function totalSold(): int
    {
        return $this->product->total_sold;
    }

    #[Computed]
    public function minimumSellingPrice()
    {
        return $this->pricingService->minimumSellingPrice($this->productVariants());
    }

    #[Computed]
    public function maximumSellingPrice()
    {
        return $this->pricingService->maximumSellingPrice($this->productVariants());
    }

    #[Computed]
    public function sellingPriceRange(): string
    {
        $priceRange = $this->pricingService->sellingPriceRange($this->productVariants());
        if (is_array($priceRange)) {
            return $this->currency . $priceRange['minimum_selling_price'] . ' - ' . $this->currency . $priceRange['maximum_selling_price'];
        }

        return $this->currency . $priceRange;
    }

    #[Computed]
    public function regularPrice(): string
    {
        return $this->pricingService->regularPrice($this->productVariants());
    }

    #[Computed]
    public function discountPercentage(): string
    {
        return $this->discountAction->handle($this->minimumSellingPrice(), $this->regularPrice());
    }

    #[Computed]
    public function starRating(): float
    {
        return number_format($this->productReviews()->avg('rating'), 1);
    }

    public function decrementQuantity(): void
    {
        if ($this->totalQuantity === 1) {
            return;
        }

        $this->totalQuantity--;
    }

    public function incrementQuantity(): void
    {
        $this->totalQuantity++;
    }

    #[Computed]
    public function availableColors(): array
    {
        return $this->productVariants()->unique('color')->pluck('color')->toArray();
    }

    #[Computed]
    public function availableSizes(): array
    {
        return $this->productVariants()->unique('size')->pluck('size')->toArray();
    }
};