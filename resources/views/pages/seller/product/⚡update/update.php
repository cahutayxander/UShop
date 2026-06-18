<?php

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Models\Product;

new #[Layout('layouts.seller')] class extends Component
{
    public Product $product;

    public function mount(Product $product)
    {
        $this->product = $product;
    }

};