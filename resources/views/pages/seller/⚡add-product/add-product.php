<?php

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;

new #[Layout('layouts.seller')] class extends Component
{
    use WithFileUploads;

    /** @var \Livewire\Features\SupportFileUploads\TemporaryUploadedFile[] */
    public $images = [];

    /** @var \Livewire\Features\SupportFileUploads\TemporaryUploadedFile[] */
    public $images34 = [];

    public string $productName = '';
    public string $productCode = '';
    public string $description = '';
    public bool $use34Image = false;

    public function updatedImages()
    {
        $this->validate([
            'images.*' => 'image|max:5120', // 5MB max per image
        ]);
    }

    public function updatedImages34()
    {
        $this->validate([
            'images34.*' => 'image|max:5120',
        ]);
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
};