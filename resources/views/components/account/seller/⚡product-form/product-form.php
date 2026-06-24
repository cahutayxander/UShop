<?php

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Attributes\Computed;
use App\Actions\CreateProductAction;
use App\Actions\UpdateProductAction;
use App\Interfaces\CategoryInterface;
use App\Dtos\CreateUpdateProductDto;
use App\Models\Product;

new #[Layout('layouts.seller')] class extends Component
{
    use WithFileUploads;
    protected CreateProductAction $createProductAction;
    protected UpdateProductAction $updateProductAction;
    protected CategoryInterface $categoryRepository;

    public string $formTitle;

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
    public ?float $regularPrice = null;

    #[Validate('nullable')]
    #[Validate('numeric', message: 'Selling price must be a number')]
    #[Validate('min:0', message: 'Selling price must be at least 0')]
    public ?float $sellingPrice = null;

    #[Validate('required', message: 'Quantity is required')]
    #[Validate('integer', message: 'Quantity must be an integer')]
    #[Validate('min:0', message: 'Quantity must be at least 0')]
    public ?int $quantity = null;

    #[Validate('required', message: 'Description is required')]
    public string $description = '';
    public bool $useWideDisplay = false;
    public bool $isUpdate = false;
    public ?int $productId = null;
    public array $existingImages = [];

    public function boot(
        CreateProductAction $createProductAction,
        UpdateProductAction $updateProductAction,
        CategoryInterface $categoryRepository,
    ) {
        $this->createProductAction = $createProductAction;
        $this->updateProductAction = $updateProductAction;
        $this->categoryRepository = $categoryRepository;
    }

    public function mount(string $formTitle, ?Product $product = null)
    {
        $this->formTitle = $formTitle;
        $this->isUpdate = request()->is('*/update');

        if ($this->isUpdate && $product) {
            $this->productId = $product->id;
            $this->categoryId = $product->category_id;
            $this->productName = $product->name;
            $this->description = $product->description;
            $this->useWideDisplay = $product->use_wide_display;

            $variant = $product->productVariants()->first();
            if ($variant) {
                $this->regularPrice = $variant->regular_price;
                $this->sellingPrice = $variant->selling_price;
                $this->quantity = $variant->quantity;
            }

            $this->existingImages = $product->productImages()->get()->toArray();
        }
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

    public function removeExistingImage(int $index): void
    {
        array_splice($this->existingImages, $index, 1);
        $this->existingImages = array_values($this->existingImages);
    }

    public function updatedRegularPrice($value)
    {
        $this->sellingPrice = null;
    }

    public function addProduct()
    {
        if ($this->sellingPrice === null || $this->sellingPrice === '') {
            $this->sellingPrice = $this->regularPrice;
        }

        // ── 1. Run full field validation (name, code, description, images) ──
        $this->validate();

        if (empty($this->regularImages) && empty($this->existingImages)) {
            $this->addError('regularImages', 'At least 1 image must be present.');
            return;
        }

        $payload = new CreateUpdateProductDto(
            $this->categoryId,
            auth()->user()->productSeller->id,
            $this->productName,
            $this->description,
            $this->useWideDisplay,
            $this->regularPrice,
            $this->sellingPrice,
            $this->quantity,
        );

        try {
            if ($this->isUpdate) {
                $this->updateProductAction->handle(
                    $this->productId,
                    $payload,
                    array_column($this->existingImages, 'id'),
                    $this->regularImages,
                );
            } else {
                $this->createProductAction->handle($payload, $this->regularImages);
            }

            session()->flash('success', 'Product ' . ($this->isUpdate ? 'updated' : 'created') . ' successfully!');
            $this->redirect('/seller/products', navigate: false);
        } catch (\Throwable) {
            $this->addError('productName', 'Failed to save product. Please try again.');
        }
    }
};