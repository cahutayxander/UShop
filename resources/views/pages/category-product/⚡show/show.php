<?php

use Livewire\Component;
use App\Interfaces\ProductInterface;
use App\Models\Product;
use Livewire\Attributes\Computed;

new class extends Component
{
    public string $currency = '₱';
    public int $totalQuantity = 1;

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
    public function hasMultipleVariants(): bool
    {
        return $this->productVariants()->count() > 1;
    }

    #[Computed]
    public function minimumSellingPrice()
    {
        return $this->hasMultipleVariants() ? $this->productVariants()->min('selling_price') : $this->productVariants()->first()->selling_price;
    }

    #[Computed]
    public function maximumSellingPrice()
    {
        return $this->productVariants()->max('selling_price');
    }

    #[Computed]
    public function sellingPriceRange(): string
    {
        $minimumSellingPrice = $this->minimumSellingPrice();
        
        if ($this->hasMultipleVariants()) {
            return $this->currency . $minimumSellingPrice . ' - ' . $this->currency . $this->maximumSellingPrice();
        }
        
        return $this->currency . $minimumSellingPrice;
    }

    #[Computed]
    public function regularPrice(): string
    {
        return $this->productVariants->max('regular_price');
    }

    #[Computed]
    public function discountPercentage(): string
    {
        return number_format((($this->regularPrice() - $this->minimumSellingPrice()) / $this->regularPrice()) * 100);
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
};