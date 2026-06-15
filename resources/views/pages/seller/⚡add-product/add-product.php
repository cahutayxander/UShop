<?php

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Attributes\Computed;
use App\Actions\CreateProductAction;
use App\Interfaces\CategoryInterface;

new #[Layout('layouts.seller')] class extends Component
{
    use WithFileUploads;
    protected CreateProductAction $createProductAction;
    protected CategoryInterface $categoryRepository;

    #[Validate('required', message: 'Category is required')]
    public ?int $categoryId = null;

    #[Validate(['regularImages.*' => 'image|max:5120'], message: ['regularImages.*' => 'Each image must be a valid image file (max 5MB)'])]
    public array $regularImages = [];

    #[Validate('required', message: 'Product name is required')]
    #[Validate('min:5', message: 'Product name must be at least 5 characters')]
    #[Validate('max:30', message: 'Product name must be at most 30 characters')]
    public string $productName = '';

    #[Validate('required', message: 'Regular price is required')]
    #[Validate('numeric', message: 'Regular price must be a number')]
    #[Validate('min:0', message: 'Regular price must be at least 0')]
    public float $regularPrice = 0;

    #[Validate('required', message: 'Selling price is required')]
    #[Validate('numeric', message: 'Selling price must be a number')]
    #[Validate('min:0', message: 'Selling price must be at least 0')]
    public float $sellingPrice = 0;

    #[Validate('required', message: 'Quantity is required')]
    #[Validate('integer', message: 'Quantity must be an integer')]
    #[Validate('min:0', message: 'Quantity must be at least 0')]
    public int $quantity = 0;

    #[Validate('required', message: 'Description is required')]
    public string $description = '';
    public bool $useWideDisplay = false;

    public function boot(CreateProductAction $createProductAction, CategoryInterface $categoryRepository)
    {
        $this->createProductAction = $createProductAction;
        $this->categoryRepository = $categoryRepository;
    }

    #[Computed]
    public function categories()
    {
        return $this->categoryRepository->all();
    }

    public function removeImage(int $index): void
    {
        $removed = array_splice($this->regularImages, $index, 1);
        $this->regularImages = array_values($this->regularImages);
    }

    public function removeImage34(int $index): void
    {
        $removed = array_splice($this->wideImages, $index, 1);
        $this->wideImages = array_values($this->wideImages);
    }

    public function addProduct()
    {
        // ── 1. Run full field validation (name, code, description, images) ──
        $this->validate();

        if (empty($this->regularImages)) {
            $this->addError('regularImages', 'At least 1 image must be uploaded.');
            return;
        }

        $this->createProductAction->handle(
            [
                'category_id' => $this->categoryId,
                'product_seller_id' => auth()->user()->productSeller->id,
                'name' => $this->productName,
                'description' => $this->description,
                'use_wide_display' => $this->useWideDisplay,
                'regular_price' => $this->regularPrice,
                'selling_price' => $this->sellingPrice,
                'quantity' => $this->quantity,
            ],
            $this->regularImages
        );

        $this->redirect('/seller/products');
    }
};