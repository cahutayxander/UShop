<?php

use Livewire\Component;

new class extends Component
{
    public $products;

    public function mount()
    {
        $this->products = [
            ['name' => 'Wireless Headphones', 'price' => '$49.00', 'tag' => 'Best Seller'],
            ['name' => 'Smart Watch', 'price' => '$89.00', 'tag' => 'New Arrival'],
            ['name' => 'Running Shoes', 'price' => '$59.00', 'tag' => 'Top Rated'],
            ['name' => 'Desk Lamp', 'price' => '$24.00', 'tag' => 'Hot Deal'],
        ];
    }
};
?>

<section class="rounded-3xl bg-white p-5 shadow-sm sm:p-6">
<div class="mb-5 flex flex-col justify-between gap-2 sm:flex-row sm:items-end">
    <div>
        <p class="text-sm font-semibold uppercase tracking-[0.18em] text-orange-500">Featured</p>
        <h2 class="text-2xl font-black tracking-tight">Top Products</h2>
    </div>
    <a href="#" class="text-sm font-semibold text-orange-600 hover:text-orange-700">See more products</a>
</div>

<div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
    @foreach ($products as $product)
        <article class="overflow-hidden rounded-2xl border border-slate-200 bg-white transition hover:-translate-y-1 hover:shadow-md">
            <div class="grid aspect-square place-items-center bg-gradient-to-br from-slate-100 to-orange-100">
                <div class="grid size-20 place-items-center rounded-3xl bg-white text-orange-500 shadow-sm">
                    <svg class="size-10" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                        <path d="M5 8.5 12 4l7 4.5v7L12 20l-7-4.5v-7Z" stroke="currentColor" stroke-width="2" stroke-linejoin="round" />
                        <path d="M12 12 5.5 8.5M12 12l6.5-3.5M12 12v7.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                    </svg>
                </div>
            </div>
            <div class="p-4">
                <span class="rounded-full bg-orange-100 px-3 py-1 text-xs font-bold text-orange-700">{{ $product['tag'] }}</span>
                <h3 class="mt-3 font-bold text-slate-900">{{ $product['name'] }}</h3>
                <div class="mt-3 flex items-center justify-between gap-3">
                    <p class="text-lg font-black text-orange-600">{{ $product['price'] }}</p>
                    <button type="button" class="rounded-full bg-slate-900 px-4 py-2 text-xs font-bold text-white transition hover:bg-orange-600">
                        Add
                    </button>
                </div>
            </div>
        </article>
    @endforeach
</div>
</section>