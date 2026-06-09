<?php

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;

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

    // public function updatedImages()
    // {
    //     $this->validate([
    //         'images.*' => 'image|max:5120', // 5MB max per image
    //     ]);
    // }

    // public function updatedImages34()
    // {
    //     $this->validate([
    //         'images34.*' => 'image|max:5120',
    //     ]);
    // }

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

    private function processImagesToStorage(): array
    {
        $productSeller = auth()->user()->productSeller;
        $sellerId = $productSeller->id;
        $mainFolder = "products";
        $normalImgFolder = "$mainFolder/$sellerId";
        $largeImgFolder = "$mainFolder/enlarged/$sellerId";

        // ── 3. Store 1:1 images on the private disk ────────────────────────
        //    Files land in storage/app/products/ and are NOT web-accessible.
        //    The returned $path is what you persist in the database.
        $imagePaths = array_map(
            fn($image) => $image->store($normalImgFolder, 'local'),
            $this->images
        );

        // ── 4. Store 3:4 images on the private disk (optional) ────────────
        $image34Paths = array_map(
            fn($image) => $image->store($largeImgFolder, 'local'),
            $this->images34
        );

        return [
            'imagePaths' => $imagePaths,
            'image34Paths' => $image34Paths,
        ];
    }

    public function addProduct()
    {
        // ── 1. Run full field validation (name, code, description, images) ──
        $this->validate();

        if (empty($this->images)) {
            $this->addError('images', 'At least 1 image must be uploaded.');
            return;
        }

        [
            'imagePaths' => $imagePaths,
            'image34Paths' => $image34Paths,
        ] = $this->processImagesToStorage();

        // ── 5. Persist paths in the DB ─────────────────────────────────────
        //    Store the raw storage paths (e.g. "products/filename.jpg").
        //    To serve them later, generate a temporary signed URL:
        //      Storage::disk('local')->temporaryUrl($path, now()->addMinutes(30))
        //    Or stream through a private controller route.
        //
        // TODO: replace with your actual model:
        $product = Product::create([
            'name'        => $this->productName,
            'description' => $this->description,
            'images'      => $imagePaths,    // 1:1 private paths
            'images34'    => $image34Paths,  // 3:4 private paths (nullable)
        ]);
    }
};