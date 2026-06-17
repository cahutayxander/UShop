<div class="min-h-screen bg-[#f5f5f5] pb-10">

    <div class="mx-auto max-w-[1320px] px-3 py-4 sm:px-4 lg:px-6">
        <div class="flex flex-col gap-4 lg:flex-row lg:items-start">
             {{-- Sidebar (static) --}}
            <aside class="w-full shrink-0 lg:w-[220px] lg:pt-1">
                <div class="rounded-sm bg-white shadow-sm ring-1 ring-black/5">
                    <div class="border-b border-slate-100 px-3 py-3">
                        <p class="text-sm font-bold text-slate-800">All Categories</p>
                    </div>

                    <div class="border-t border-slate-100 px-3 py-3">
                        <div class="mb-4">
                            <ul class="space-y-1.5 text-xs text-slate-700">
                                @foreach ($this->categories as $category)
                                    <li class="flex items-center gap-2">
                                        <input id="category-{{ $loop->index }}" type="checkbox" wire:model.live="categoryIds" value="{{ $category->id }}" class="size-3.5 rounded border-slate-300 text-orange-500 focus:ring-orange-400">
                                        <label for="category-{{ $loop->index }}" class="cursor-pointer">{{ $category->name }}</label>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </aside>

            {{-- Main grid (static) --}}
            <div class="min-w-0 flex-1">
                <div class="flex justify-end my-2">
                    <a
                        href="/seller/products/new"
                        wire:navigate
                        class="inline-flex items-center gap-2 rounded border border-orange-400/60 bg-orange-500/15 px-4 py-2 text-sm font-medium uppercase tracking-wide text-orange-600 backdrop-blur-sm transition-all hover:bg-orange-500/25 hover:border-orange-500 hover:text-orange-700">
                        <svg class="size-4" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                            <path d="M12 5v14M5 12h14" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                        </svg>
                        Add New Product
                    </a>
                </div>

                <div class="mb-3 flex flex-col gap-3 rounded-sm bg-white px-3 py-2 shadow-sm ring-1 ring-black/5 sm:flex-row sm:items-center sm:justify-between">
                    <div class="flex flex-wrap items-center gap-2">
                        <span class="text-xs text-slate-500">Sort by</span>
                        <div class="flex flex-wrap gap-1">
                            <button type="button" class="rounded bg-orange-500 px-3 py-1.5 text-xs font-medium text-white shadow-sm">Popular</button>
                            <button type="button" class="rounded border border-slate-200 bg-white px-3 py-1.5 text-xs font-medium text-slate-700 hover:border-orange-200">Latest</button>
                            <button type="button" class="rounded border border-slate-200 bg-white px-3 py-1.5 text-xs font-medium text-slate-700 hover:border-orange-200">Top Sales</button>
                        </div>
                        <div class="relative">
                            <button type="button" class="inline-flex items-center gap-1 rounded border border-slate-200 bg-white px-3 py-1.5 text-xs font-medium text-slate-700 hover:border-orange-200">
                                Price
                                <svg class="size-3.5 text-slate-400" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                    <path d="m6 9 6 6 6-6" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="flex items-center gap-2 text-xs text-slate-500">
                        <span>1 / 8</span>
                        <div class="flex rounded border border-slate-200">
                            <button type="button" class="grid size-7 place-items-center text-slate-600 hover:bg-slate-50" aria-label="Previous page">‹</button>
                            <button type="button" class="grid size-7 place-items-center text-slate-600 hover:bg-slate-50" aria-label="Next page">›</button>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5">
                    @foreach ($this->sellerProductsByCategory as $product)
                        <livewire:product.list :product="$product" />
                    @endforeach

                {{ $this->sellerProductsByCategory->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
