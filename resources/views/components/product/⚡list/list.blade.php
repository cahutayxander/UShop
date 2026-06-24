<div>
    @php
        $coverImage = $product->productImages->first();
    @endphp

    <a href="{{ $this->linkToRedirect }}" wire:navigate>
        <article class="group flex flex-col overflow-hidden rounded-sm bg-white shadow-sm ring-1 ring-black/[0.06] transition hover:-translate-y-0.5 hover:shadow-md">
            <div class="relative aspect-square overflow-hidden bg-slate-200">
                @if ($coverImage)
                    <img
                        src="{{ Storage::url($coverImage->path) }}"
                        alt="{{ $product->name }}"
                        class="size-full object-cover transition duration-300 group-hover:scale-105"
                        loading="lazy"
                    >
                @else
                    <div class="flex size-full items-center justify-center text-xs text-slate-400">No image</div>
                @endif
                @if ($product->discount)
                    <span class="absolute right-0 top-0 bg-[#ee4d2d] px-1.5 py-0.5 text-[11px] font-bold text-white">-{{ $product->discount }}%</span>
                @endif
                <span class="absolute right-0 top-0 bg-[#ee4d2d] px-1.5 py-0.5 text-[11px] font-bold text-white">-{{ $this->discountPercentage($product->productVariants) }}%</span>
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
                <!-- <div class="inline-flex w-fit rounded border border-[#ee4d2d] px-1 py-px text-[10px] font-bold text-[#ee4d2d]">
                    TODO promo here
                </div> -->
                <div class="mt-auto flex flex-wrap items-end justify-between gap-1 pt-1">
                    <div class="flex items-center gap-1">
                        <span class="text-sm font-bold text-[#ee4d2d]">₱{{ $this->minimumSellingPrice($product->productVariants) }}</span>
                        <span class="inline-flex text-orange-500" title="Free shipping eligible" aria-hidden="true">
                            <svg class="size-4" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M20 8h-3V4H3v13h2a2 2 0 104 0h6a2 2 0 104 0h2v-5l3-4zM8 17a1 1 0 110-2 1 1 0 010 2zm8 0a1 1 0 110-2 1 1 0 010 2zm.5-6H17V9.5L18.5 8H20v3z" />
                            </svg>
                        </span>
                    </div>
                    <span class="text-[11px] text-slate-400">{{ $product->total_sold }} sold</span>
                </div>
            </div>
        </article>
    </a>
</div>
