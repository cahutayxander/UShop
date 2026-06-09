<?php

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use App\Actions\CreateProductAction;

new #[Layout('layouts.seller')] class extends Component
{
    use WithFileUploads;

    #[Validate(['images.*' => 'image|max:5120'], message: ['images.*' => 'Each image must be a valid image file (max 5MB)'])]
    public array $images = [];

    public array $images34 = [];

    #[Validate('required', message: 'Product name is required')]
    #[Validate('min:5', message: 'Product name must be at least 5 characters')]
    #[Validate('max:30', message: 'Product name must be at most 30 characters')]
    public string $productName = '';

    #[Validate('required', message: 'Description is required')]
    public string $description = '';
    public bool $use34Image = false;

    public function boot(CreateProductAction $createProductAction)
    {
        $this->createProductAction = $createProductAction;
    }

    public function removeImage(int $index): void
    {
        $removed = array_splice($this->images, $index, 1);
        $this->images = array_values($this->images);
    }

    public function removeImage34(int $index): void
    {
        $removed = array_splice($this->images34, $index, 1);
        $this->images34 = array_values($this->images34);
    }

    public function addProduct()
    {
        // ── 1. Run full field validation (name, code, description, images) ──
        $this->validate();

        if (empty($this->images)) {
            $this->addError('images', 'At least 1 image must be uploaded.');
            return;
        }

        $this->createProductAction->handle(
            [
                'name' => $this->productName,
                'description' => $this->description,
            ],
            $this->images,
            $this->images34
        );
    }
};