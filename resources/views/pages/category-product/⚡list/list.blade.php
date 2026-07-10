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
                        <p class="mb-2 text-xs font-bold uppercase tracking-wide text-slate-800">Search filter</p>

                        <div class="mb-4">
                            <p class="mb-2 text-xs font-semibold text-slate-600">Shipped From</p>
                            <ul class="space-y-1.5 text-xs text-slate-700">
                                @foreach (['Visayas', 'Domestic', 'Overseas', 'Metro Manila'] as $region)
                                    <li class="flex items-center gap-2">
                                        <input id="ship-{{ $loop->index }}" type="checkbox" class="size-3.5 rounded border-slate-300 text-orange-500 focus:ring-orange-400">
                                        <label for="ship-{{ $loop->index }}" class="cursor-pointer">{{ $region }}</label>
                                    </li>
                                @endforeach
                            </ul>
                            <button type="button" class="mt-1 text-xs text-slate-500 hover:text-orange-600">More ⌄</button>
                        </div>

                        <div class="mb-4">
                            <p class="mb-2 text-xs font-semibold text-slate-600">Shops &amp; Promos</p>
                            <button type="button" class="text-xs text-slate-500 hover:text-orange-600">More ⌄</button>
                        </div>

                        <div class="mb-4">
                            <p class="mb-2 text-xs font-semibold text-slate-600">Brand</p>
                            <ul class="space-y-1.5 text-xs text-slate-700">
                                @foreach (['Huilishi', 'Inspi', 'KENTUCKY', 'Lifeline'] as $brand)
                                    <li class="flex items-center gap-2">
                                        <input id="brand-{{ $loop->index }}" type="checkbox" class="size-3.5 rounded border-slate-300 text-orange-500 focus:ring-orange-400">
                                        <label for="brand-{{ $loop->index }}" class="cursor-pointer">{{ $brand }}</label>
                                    </li>
                                @endforeach
                            </ul>
                            <button type="button" class="mt-1 text-xs text-slate-500 hover:text-orange-600">More ⌄</button>
                        </div>

                        <div>
                            <p class="mb-2 text-xs font-semibold text-slate-600">Price Range</p>
                            <div class="flex items-center gap-2">
                                <input
                                    type="text"
                                    inputmode="numeric"
                                    placeholder="₱ MIN"
                                    class="w-full rounded border border-slate-200 px-2 py-1.5 text-xs outline-none focus:border-orange-400"
                                >
                                <span class="text-slate-400">–</span>
                                <input
                                    type="text"
                                    inputmode="numeric"
                                    placeholder="₱ MAX"
                                    class="w-full rounded border border-slate-200 px-2 py-1.5 text-xs outline-none focus:border-orange-400"
                                >
                            </div>
                            <button type="button" class="mt-3 w-full rounded bg-orange-500 py-2 text-xs font-bold uppercase tracking-wide text-white shadow-sm hover:bg-orange-600">
                                Apply
                            </button>
                        </div>
                    </div>
                </div>
            </aside>

            {{-- Main grid (static) --}}
            <div class="min-w-0 flex-1">
                <div class="mb-3 flex flex-col gap-3 rounded-sm bg-white px-3 py-2 shadow-sm ring-1 ring-black/5 sm:flex-row sm:items-center sm:justify-between">
                    <div class="flex flex-wrap items-center gap-2">
                        <span class="text-xs text-slate-500">Sort by</span>
                        <div class="flex flex-wrap gap-1">
                            <button 
                                wire:click="setSort('popular')"
                                type="button" 
                                class="rounded px-3 py-1.5 text-xs font-medium {{ $sortBy === 'popular' ? 'bg-orange-500 text-white shadow-sm' : 'border border-slate-200 bg-white text-slate-700 hover:border-orange-200' }}"
                            >
                                Popular
                            </button>
                            <button 
                                wire:click="setSort('latest')"
                                type="button" 
                                class="rounded px-3 py-1.5 text-xs font-medium {{ $sortBy === 'latest' ? 'bg-orange-500 text-white shadow-sm' : 'border border-slate-200 bg-white text-slate-700 hover:border-orange-200' }}"
                            >
                                Latest
                            </button>
                            <button 
                                wire:click="setSort('top_sales')"
                                type="button" 
                                class="rounded px-3 py-1.5 text-xs font-medium {{ $sortBy === 'top_sales' ? 'bg-orange-500 text-white shadow-sm' : 'border border-slate-200 bg-white text-slate-700 hover:border-orange-200' }}"
                            >
                                Top Sales
                            </button>
                        </div>
                        <div class="relative">
                            <button 
                                wire:click="setSort('price')"
                                type="button" 
                                class="inline-flex items-center gap-1 rounded px-3 py-1.5 text-xs font-medium {{ $sortBy === 'price' ? 'bg-orange-500 text-white shadow-sm' : 'border border-slate-200 bg-white text-slate-700 hover:border-orange-200' }}"
                            >
                                Price
                                @if ($sortBy === 'price')
                                    @if ($sortOrder === 'asc')
                                        <span class="text-[10px] opacity-90">(Low to High)</span>
                                        <svg class="size-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <line x1="12" y1="19" x2="12" y2="5"></line>
                                            <polyline points="5 12 12 5 19 12"></polyline>
                                        </svg>
                                    @else
                                        <span class="text-[10px] opacity-90">(High to Low)</span>
                                        <svg class="size-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <line x1="12" y1="5" x2="12" y2="19"></line>
                                            <polyline points="19 12 12 19 5 12"></polyline>
                                        </svg>
                                    @endif
                                @else
                                    <svg class="size-3.5 text-slate-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="m7 15 5 5 5-5M7 9l5-5 5 5" />
                                    </svg>
                                @endif
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
                    @foreach ($this->productsByCategory as $product)
                        <livewire:product.list :product="$product" />
                    @endforeach

                {{ $this->productsByCategory->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
