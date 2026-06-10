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

    public array $enlargedImages = [];

    #[Validate('required', message: 'Product name is required')]
    #[Validate('min:5', message: 'Product name must be at least 5 characters')]
    #[Validate('max:30', message: 'Product name must be at most 30 characters')]
    public string $productName = '';

    #[Validate('required', message: 'Description is required')]
    public string $description = '';
    public bool $use34Image = false;

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
        $removed = array_splice($this->enlargedImages, $index, 1);
        $this->enlargedImages = array_values($this->enlargedImages);
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
            ],
            $this->regularImages,
            $this->enlargedImages
        );
    }
};