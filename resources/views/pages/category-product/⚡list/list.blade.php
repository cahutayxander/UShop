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
                    @foreach ($this->productsByCategory as $i => $product)
                        <a href="/category/{{ $product->category_id }}/{{ $product->id }}" wire:navigate/>
                            <article class="group flex flex-col overflow-hidden rounded-sm bg-white shadow-sm ring-1 ring-black/[0.06] transition hover:-translate-y-0.5 hover:shadow-md">
                                <div class="relative aspect-square overflow-hidden bg-slate-200">
                                    <img
                                        src="https://picsum.photos/id/{{ 30 + $i }}/400/400"
                                        alt=""
                                        class="size-full object-cover transition duration-300 group-hover:scale-105"
                                        loading="lazy"
                                    >
                                    @if ($product->discount)
                                        <span class="absolute right-0 top-0 bg-[#ee4d2d] px-1.5 py-0.5 text-[11px] font-bold text-white">-{{ $product->discount }}%</span>
                                    @endif
                                    <div class="absolute bottom-0 left-0 right-0 flex flex-wrap gap-0.5 bg-black/55 px-1 py-0.5">
                                        <span class="rounded-[2px] bg-[#00bfa5] px-1 py-px text-[9px] font-bold leading-tight text-white">SPayLater</span>
                                        <span class="rounded-[2px] bg-[#ff6b00] px-1 py-px text-[9px] font-bold leading-tight text-white">0% INTEREST</span>
                                        <span class="rounded-[2px] bg-[#26a69a] px-1 py-px text-[9px] font-bold leading-tight text-white">UNLI FREE SHIPPING</span>
                                    </div>
                                </div>
                                <div class="flex flex-1 flex-col gap-1 p-2">
                                    <div class="flex flex-wrap items-center gap-1">
                                        <span class="rounded-[2px] px-1 py-px text-[10px] font-semibold }}">{{ $product->name }}</span>
                                    </div>
                                    <h3 class="line-clamp-2 min-h-[2.5rem] text-[13px] leading-tight text-slate-900">
                                        TODO title here
                                    </h3>
                                    <div class="inline-flex w-fit rounded border border-[#ee4d2d] px-1 py-px text-[10px] font-bold text-[#ee4d2d]">
                                        TODO promo here
                                    </div>
                                    <div class="mt-auto flex flex-wrap items-end justify-between gap-1 pt-1">
                                        <div class="flex items-center gap-1">
                                            <span class="text-sm font-bold text-[#ee4d2d]">₱{{ $product->price }}</span>
                                            <span class="inline-flex text-orange-500" title="Free shipping eligible" aria-hidden="true">
                                                <svg class="size-4" viewBox="0 0 24 24" fill="currentColor">
                                                    <path d="M20 8h-3V4H3v13h2a2 2 0 104 0h6a2 2 0 104 0h2v-5l3-4zM8 17a1 1 0 110-2 1 1 0 010 2zm8 0a1 1 0 110-2 1 1 0 010 2zm.5-6H17V9.5L18.5 8H20v3z" />
                                                </svg>
                                            </span>
                                        </div>
                                        <span class="text-[11px] text-slate-400">{{ $product->total_sold }}</span>
                                    </div>
                                </div>
                            </article>
                        </a>
                    @endforeach

                {{ $this->productsByCategory->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
