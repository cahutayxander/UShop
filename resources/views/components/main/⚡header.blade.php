<?php

use Livewire\Component;

new class extends Component
{
    //
};
?>

<header class="sticky top-0 z-50 border-b border-orange-200 bg-orange-500 text-white shadow-sm">
    <div class="mx-auto flex max-w-[1200px] flex-col gap-3 px-4 py-3 lg:px-0">
        <div class="flex flex-wrap items-center justify-between gap-2 text-xs font-medium sm:text-sm">
            <nav class="flex flex-wrap items-center gap-3">
                <a href="#" class="transition hover:text-orange-100">Seller Centre</a>
                <span class="hidden h-4 w-px bg-orange-300 sm:block"></span>
                <a href="#" class="transition hover:text-orange-100">Be a Seller</a>
                <span class="hidden h-4 w-px bg-orange-300 sm:block"></span>
                <a href="#" class="transition hover:text-orange-100">Download App</a>
            </nav>

            <nav class="flex flex-wrap items-center gap-3">
                <a href="#" class="transition hover:text-orange-100">Notifications</a>
                <a href="#" class="transition hover:text-orange-100">Help</a>
                <a href="#" class="font-semibold transition hover:text-orange-100">Login</a>
            </nav>
        </div>

        <div class="grid gap-3 md:grid-cols-[auto_1fr_auto] md:items-center">
            <a href="/" wire:navigate class="flex items-center gap-2 text-2xl font-black tracking-tight">
                <span class="grid size-10 place-items-center rounded-xl bg-white text-orange-500 shadow-sm">U</span>
                <span>UShop</span>
            </a>

            <form class="flex overflow-hidden rounded-xl bg-white p-1 shadow-sm">
                <label for="search" class="sr-only">Search products</label>
                <input
                    id="search"
                    type="search"
                    placeholder="Search for products, brands and shops"
                    class="min-w-0 flex-1 rounded-lg border-0 px-4 py-3 text-sm text-slate-800 outline-none placeholder:text-slate-400"
                >
                <button
                    type="button"
                    class="inline-flex items-center justify-center rounded-lg bg-orange-500 px-4 text-white transition hover:bg-orange-600 focus:outline-none focus:ring-2 focus:ring-orange-300"
                    aria-label="Search"
                >
                    <svg class="size-5" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                        <path d="m21 21-4.35-4.35m1.35-5.65a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                    </svg>
                </button>
            </form>

            <a
                href="#"
                class="relative inline-flex size-12 items-center justify-center justify-self-start rounded-xl bg-white text-orange-500 shadow-sm transition hover:bg-orange-50 md:justify-self-end"
                aria-label="View cart"
            >
                <svg class="size-6" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                    <path d="M6.5 8h14l-1.5 9h-11L6.5 8Zm0 0L6 5H3m6 15h.01M18 20h.01" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <span class="absolute -right-1 -top-1 grid size-5 place-items-center rounded-full bg-slate-900 text-[10px] font-bold text-white">3</span>
            </a>
        </div>
    </div>
</header>
