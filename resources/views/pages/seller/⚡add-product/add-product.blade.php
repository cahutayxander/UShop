<div class="min-h-screen bg-[#f5f5f5] text-[#222] antialiased">

    {{-- Breadcrumb --}}
    <nav class="bg-white border-b border-gray-200 px-4 sm:px-6 lg:px-10">
        <div class="mx-auto flex items-center gap-2 py-3 text-sm text-gray-500 max-w-7xl">
            <a href="#" class="hover:text-[#ee4d2d] transition">Home</a>
            <svg class="h-3 w-3 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
            <a href="#" class="hover:text-[#ee4d2d] transition">My Products</a>
            <svg class="h-3 w-3 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
            <span class="font-semibold text-gray-900">Add a New Product</span>
        </div>
    </nav>

    {{-- Page body --}}
    <div class="mx-auto flex max-w-7xl gap-6 px-4 py-8 sm:px-6 lg:px-10">

        {{-- ═══════════ Main content card ═══════════ --}}
        <div class="flex-1 min-w-0">
            <div class="rounded-lg border border-gray-200 bg-white shadow-sm overflow-hidden">

                {{-- Title --}}
                <div class="px-6 pt-7 pb-5 border-b border-gray-100">
                    <h1 class="text-xl font-bold text-gray-900">Add a New Product</h1>
                    <p class="mt-2 text-sm leading-relaxed text-gray-500">
                        Enter a name or image and UShop will intelligently match it to a standard product, auto-filling title, description and images to speed up listing creation. Make sure to check and fix any mismatches before publishing to guarantee listing accuracy.
                    </p>
                </div>

                <form wire:submit="addProduct">
                    <div class="px-6 py-7 space-y-8">
                            {{-- ──── Product Images ──── --}}
                            <div>
                                <h2 class="text-sm font-semibold text-gray-800 mb-4">Product Images</h2>

                                {{-- 1:1 Image --}}
                                <div class="mb-4">
                                    <p class="text-sm text-gray-700 mb-3">
                                        <span class="text-[#ee4d2d] mr-0.5">*</span> 1:1 Image
                                    </p>

                                    {{-- Upload grid --}}
                                    <div class="flex flex-wrap gap-3">
                                        {{-- Uploaded image previews --}}
                                        @foreach($regularImages as $index => $image)
                                            <div class="relative group h-24 w-24 rounded border border-gray-200 bg-gray-50 overflow-hidden shadow-sm">
                                                {{-- Image preview --}}
                                                <img
                                                    src="{{ $image->temporaryUrl() }}"
                                                    alt="Product image {{ $index + 1 }}"
                                                    class="h-full w-full object-cover"
                                                />

                                                {{-- Cover badge on first image --}}
                                                @if($index === 0)
                                                    <div class="absolute bottom-0 inset-x-0 bg-[#ee4d2d] py-0.5 text-center">
                                                        <span class="text-[10px] font-semibold text-white tracking-wide">★ Cover</span>
                                                    </div>
                                                @endif

                                                {{-- Remove button (on hover) --}}
                                                <button
                                                    type="button"
                                                    wire:click="removeImage({{ $index }})"
                                                    class="absolute top-1 right-1 flex h-5 w-5 items-center justify-center rounded-full bg-black/60 text-white opacity-0 group-hover:opacity-100 transition-opacity hover:bg-red-600 cursor-pointer"
                                                    aria-label="Remove image"
                                                >
                                                    <svg class="h-3 w-3" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                                                    </svg>
                                                </button>
                                            </div>
                                        @endforeach

                                        {{-- Upload button (show if under 9 images) --}}
                                        @if(count($regularImages) < 9)
                                            <label
                                                for="product-image-upload"
                                                class="group flex h-24 w-24 cursor-pointer flex-col items-center justify-center rounded border-2 border-dashed border-gray-300 bg-white transition hover:border-[#ee4d2d] hover:bg-[#fff8f6]"
                                            >
                                                <svg class="h-7 w-7 text-[#ee4d2d] transition group-hover:scale-110" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909M3.75 21h16.5A2.25 2.25 0 0 0 22.5 18.75V5.25A2.25 2.25 0 0 0 20.25 3H3.75A2.25 2.25 0 0 0 1.5 5.25v13.5A2.25 2.25 0 0 0 3.75 21Z"/>
                                                </svg>
                                                <span class="mt-1 text-[10px] text-[#ee4d2d] font-medium">Add Image</span>
                                                <span class="text-[10px] text-gray-400">({{ count($regularImages) }}/9)</span>
                                                <input
                                                    id="product-image-upload"
                                                    type="file"
                                                    wire:model="regularImages"
                                                    accept="image/*"
                                                    multiple
                                                    class="hidden"
                                                />
                                            </label>
                                        @endif
                                    </div>

                                    {{-- Upload loading indicator --}}
                                    <div wire:loading wire:target="regularImages" class="mt-2 flex items-center gap-2 text-xs text-[#ee4d2d]">
                                        <svg class="h-4 w-4 animate-spin" viewBox="0 0 24 24" fill="none">
                                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
                                        </svg>
                                        Uploading...
                                    </div>

                                    {{-- Validation errors --}}
                                    @error('regularImages')
                                        <p class="mt-2 text-xs text-red-500">{{ $message }}</p>
                                    @enderror
                                    @error('regularImages.*')
                                        <p class="mt-2 text-xs text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>

                                {{-- Terms --}}
                                <p class="text-xs text-gray-400 leading-relaxed mb-4">
                                    In accordance with the Terms of Service, you agree that others including UShop may use or adapt images, videos or any other Content provided by you in connection with the Services, including for commercial purpose. You can manage the settings
                                    <a href="#" class="text-[#2673dd] hover:underline">HERE</a>
                                </p>

                                {{-- 3:4 option --}}
                                <label class="flex items-start gap-2.5 cursor-pointer">
                                    <input
                                        type="checkbox"
                                        wire:model.live="use34Image"
                                        class="mt-0.5 h-4 w-4 rounded border-gray-300 text-[#ee4d2d] accent-[#ee4d2d]"
                                    />
                                    <span class="text-sm text-gray-600 leading-relaxed">
                                        <span class="font-medium text-gray-700">3:4 Image</span>
                                        &nbsp;Impress buyers by adding 3:4 images for fashion products. This image size may not be suitable if campaign frames will be used for the product listing. You may opt to use 1:1 images if campaign frames will be used.
                                        <a href="#" class="text-[#2673dd] hover:underline ml-1">View use cases</a>
                                    </span>
                                </label>

                                {{-- 3:4 Image Upload Area (shown when checkbox is ticked) --}}
                                @if($use34Image)
                                    <div class="mt-5 rounded-lg border border-dashed border-[#ee4d2d]/40 bg-[#fff8f6] p-5 transition-all"
                                        x-data
                                        x-transition:enter="transition ease-out duration-200"
                                        x-transition:enter-start="opacity-0 -translate-y-2"
                                        x-transition:enter-end="opacity-100 translate-y-0"
                                    >
                                        {{-- Reference visual: 1:1 vs 3:4 comparison --}}
                                        <div class="mb-5 rounded-lg bg-white border border-gray-100 p-5">
                                            <h4 class="text-sm font-semibold text-gray-800 mb-1">1:1 Image vs. 3:4 Image</h4>
                                            <p class="text-xs text-gray-500 mb-5 leading-relaxed">
                                                3:4 images can better showcase your fashion products by displaying a full body shot of the model. As shown in the picture below:
                                            </p>

                                            <div class="flex items-end justify-center gap-8">

                                                {{-- ── 1:1 Phone Mockup ── --}}
                                                <div class="flex flex-col items-center gap-2">
                                                    <div class="w-[130px] rounded-[14px] border border-gray-300 bg-white shadow-md overflow-hidden">
                                                        {{-- Phone status bar --}}
                                                        <div class="flex items-center justify-between bg-white px-2 py-1">
                                                            <span class="text-[7px] text-gray-400 font-medium">9:41</span>
                                                            <div class="flex items-center gap-0.5">
                                                                <svg class="h-2 w-2 text-gray-400" viewBox="0 0 24 24" fill="currentColor"><path d="M1 9l2 2c4.97-4.97 13.03-4.97 18 0l2-2C16.93 2.93 7.08 2.93 1 9zm8 8l3 3 3-3c-1.65-1.66-4.34-1.66-6 0zm-4-4l2 2c2.76-2.76 7.24-2.76 10 0l2-2C15.14 9.14 8.87 9.14 5 13z"/></svg>
                                                                <svg class="h-2 w-3 text-gray-400" viewBox="0 0 24 24" fill="currentColor"><path d="M15.67 4H14V2h-4v2H8.33C7.6 4 7 4.6 7 5.33v15.33C7 21.4 7.6 22 8.33 22h7.33c.74 0 1.34-.6 1.34-1.33V5.33C17 4.6 16.4 4 15.67 4z"/></svg>
                                                            </div>
                                                        </div>
                                                        {{-- 1:1 Product image area --}}
                                                        <div class="w-full aspect-square bg-[#f0ede8] relative flex items-end justify-center overflow-hidden">
                                                            {{-- Fashion model SVG illustration --}}
                                                            <svg viewBox="0 0 100 100" class="w-full h-full" xmlns="http://www.w3.org/2000/svg">
                                                                <rect width="100" height="100" fill="#f0ede8"/>
                                                                {{-- Background subtle gradient --}}
                                                                <ellipse cx="50" cy="110" rx="40" ry="20" fill="#e0ddd8" opacity="0.5"/>
                                                                {{-- Body / dress --}}
                                                                <ellipse cx="50" cy="72" rx="18" ry="28" fill="#c8bfb0"/>
                                                                {{-- Skirt flare --}}
                                                                <path d="M32 70 Q30 95 28 100 H72 Q70 95 68 70 Q60 85 50 84 Q40 85 32 70Z" fill="#d4ccc2"/>
                                                                {{-- Torso --}}
                                                                <rect x="39" y="48" width="22" height="28" rx="4" fill="#bdb5a8"/>
                                                                {{-- Neck --}}
                                                                <rect x="46" y="40" width="8" height="12" rx="3" fill="#e8c9a0"/>
                                                                {{-- Head --}}
                                                                <ellipse cx="50" cy="34" rx="11" ry="12" fill="#e8c9a0"/>
                                                                {{-- Hair --}}
                                                                <path d="M39 30 Q40 18 50 18 Q60 18 61 30 Q58 24 50 23 Q42 24 39 30Z" fill="#3d2b1f"/>
                                                                {{-- Face details --}}
                                                                <ellipse cx="46" cy="33" rx="1.5" ry="1.5" fill="#5a3e32" opacity="0.8"/>
                                                                <ellipse cx="54" cy="33" rx="1.5" ry="1.5" fill="#5a3e32" opacity="0.8"/>
                                                                <path d="M47 38 Q50 40 53 38" stroke="#c0826a" stroke-width="1" fill="none" stroke-linecap="round"/>
                                                                {{-- Left arm --}}
                                                                <path d="M39 52 Q28 60 30 70" stroke="#e8c9a0" stroke-width="6" fill="none" stroke-linecap="round"/>
                                                                {{-- Right arm / bag --}}
                                                                <path d="M61 52 Q72 60 70 68" stroke="#e8c9a0" stroke-width="6" fill="none" stroke-linecap="round"/>
                                                                <rect x="65" y="62" width="10" height="9" rx="2" fill="#8b7355"/>
                                                                <path d="M67 62 Q68 58 70 58 Q72 58 73 62" stroke="#8b7355" stroke-width="1.5" fill="none"/>
                                                            </svg>
                                                        </div>
                                                        {{-- Product listing details --}}
                                                        <div class="bg-white px-2 pt-1.5 pb-2.5">
                                                            {{-- Shop bar --}}
                                                            <div class="flex items-center gap-1 mb-1.5">
                                                                <div class="h-3 w-3 rounded-full bg-[#ee4d2d] flex items-center justify-center">
                                                                    <svg class="h-2 w-2 text-white" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/></svg>
                                                                </div>
                                                                <span class="text-[6px] text-gray-600 font-semibold truncate">MMK2 Safa Britts Wrapped</span>
                                                            </div>
                                                            <div class="text-[6px] text-gray-400 truncate mb-1">Dress - Navy Checker</div>
                                                            <div class="text-[7px] font-bold text-[#ee4d2d] mb-1">₱18,000</div>
                                                            <div class="flex items-center gap-0.5 mb-1.5">
                                                                @for($i = 0; $i < 4; $i++)
                                                                    <svg class="h-1.5 w-1.5 text-[#ee4d2d]" viewBox="0 0 24 24" fill="currentColor"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                                                                @endfor
                                                                <span class="text-[5px] text-gray-400 ml-0.5">4.5 (190 sold)</span>
                                                            </div>
                                                            <div class="flex items-center justify-between">
                                                                <div class="flex gap-1">
                                                                    <button class="h-3.5 w-3.5 rounded border border-gray-300 flex items-center justify-center"><svg class="h-2 w-2 text-gray-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg></button>
                                                                    <button class="h-3.5 w-3.5 rounded border border-gray-300 flex items-center justify-center"><svg class="h-2 w-2 text-gray-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="18" cy="5" r="3"/><circle cx="6" cy="12" r="3"/><circle cx="18" cy="19" r="3"/><line x1="8.59" y1="13.51" x2="15.42" y2="17.49"/><line x1="15.41" y1="6.51" x2="8.59" y2="10.49"/></svg></button>
                                                                    <button class="h-3.5 w-3.5 rounded border border-gray-300 flex items-center justify-center"><svg class="h-2 w-2 text-gray-400" viewBox="0 0 24 24" fill="currentColor"><path d="M7 18c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zM1 2v2h2l3.6 7.59L5.25 14c-.16.28-.25.61-.25.96C5 16.1 5.9 17 7 17h12v-2H7.42c-.14 0-.25-.11-.25-.25l.03-.12.9-1.63H17c.75 0 1.41-.41 1.75-1.03L22 6H5.21l-.94-2H1z"/></svg></button>
                                                                </div>
                                                                <button class="rounded bg-[#ee4d2d] px-2 py-0.5 text-[5px] font-bold text-white">Buy Now</button>
                                                            </div>
                                                            <div class="mt-1.5 border-t border-gray-100 pt-1">
                                                                <div class="text-[5px] text-gray-400 font-semibold">Product Details</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <span class="text-xs text-gray-500 font-medium">1:1 Image</span>
                                                </div>

                                                {{-- ── 3:4 Phone Mockup ── --}}
                                                <div class="flex flex-col items-center gap-2">
                                                    <div class="w-[130px] rounded-[14px] border border-[#ee4d2d]/40 bg-white shadow-md overflow-hidden">
                                                        {{-- Phone status bar --}}
                                                        <div class="flex items-center justify-between bg-white px-2 py-1">
                                                            <span class="text-[7px] text-gray-400 font-medium">9:41</span>
                                                            <div class="flex items-center gap-0.5">
                                                                <svg class="h-2 w-2 text-gray-400" viewBox="0 0 24 24" fill="currentColor"><path d="M1 9l2 2c4.97-4.97 13.03-4.97 18 0l2-2C16.93 2.93 7.08 2.93 1 9zm8 8l3 3 3-3c-1.65-1.66-4.34-1.66-6 0zm-4-4l2 2c2.76-2.76 7.24-2.76 10 0l2-2C15.14 9.14 8.87 9.14 5 13z"/></svg>
                                                                <svg class="h-2 w-3 text-gray-400" viewBox="0 0 24 24" fill="currentColor"><path d="M15.67 4H14V2h-4v2H8.33C7.6 4 7 4.6 7 5.33v15.33C7 21.4 7.6 22 8.33 22h7.33c.74 0 1.34-.6 1.34-1.33V5.33C17 4.6 16.4 4 15.67 4z"/></svg>
                                                            </div>
                                                        </div>
                                                        {{-- 3:4 Product image area (taller) --}}
                                                        <div class="w-full bg-[#f0ede8] relative flex items-end justify-center overflow-hidden" style="aspect-ratio: 3/4;">
                                                            <svg viewBox="0 0 100 133" class="w-full h-full" xmlns="http://www.w3.org/2000/svg">
                                                                <rect width="100" height="133" fill="#f0ede8"/>
                                                                <ellipse cx="50" cy="143" rx="45" ry="22" fill="#e0ddd8" opacity="0.5"/>
                                                                {{-- Full-body long skirt --}}
                                                                <path d="M34 78 Q28 110 26 133 H74 Q72 110 66 78 Q58 100 50 99 Q42 100 34 78Z" fill="#d4ccc2"/>
                                                                {{-- Skirt pleats detail --}}
                                                                <path d="M50 99 Q50 116 50 133" stroke="#c5bdb4" stroke-width="0.5" opacity="0.6"/>
                                                                <path d="M40 102 Q38 118 36 133" stroke="#c5bdb4" stroke-width="0.5" opacity="0.6"/>
                                                                <path d="M60 102 Q62 118 64 133" stroke="#c5bdb4" stroke-width="0.5" opacity="0.6"/>
                                                                {{-- Torso --}}
                                                                <rect x="39" y="54" width="22" height="30" rx="4" fill="#bdb5a8"/>
                                                                {{-- Belt --}}
                                                                <rect x="37" y="76" width="26" height="4" rx="1" fill="#8b7355"/>
                                                                {{-- Neck --}}
                                                                <rect x="46" y="46" width="8" height="12" rx="3" fill="#e8c9a0"/>
                                                                {{-- Head --}}
                                                                <ellipse cx="50" cy="38" rx="12" ry="13" fill="#e8c9a0"/>
                                                                {{-- Hair --}}
                                                                <path d="M38 34 Q39 20 50 19 Q61 20 62 34 Q58 26 50 25 Q42 26 38 34Z" fill="#3d2b1f"/>
                                                                <path d="M38 34 Q35 40 37 48" stroke="#3d2b1f" stroke-width="4" fill="none" stroke-linecap="round"/>
                                                                <path d="M62 34 Q65 40 63 48" stroke="#3d2b1f" stroke-width="4" fill="none" stroke-linecap="round"/>
                                                                {{-- Face --}}
                                                                <ellipse cx="45.5" cy="37" rx="1.5" ry="1.5" fill="#5a3e32" opacity="0.8"/>
                                                                <ellipse cx="54.5" cy="37" rx="1.5" ry="1.5" fill="#5a3e32" opacity="0.8"/>
                                                                <path d="M47 42 Q50 44.5 53 42" stroke="#c0826a" stroke-width="1" fill="none" stroke-linecap="round"/>
                                                                {{-- Arms --}}
                                                                <path d="M39 58 Q25 68 27 82" stroke="#e8c9a0" stroke-width="6.5" fill="none" stroke-linecap="round"/>
                                                                <path d="M61 58 Q75 68 73 80" stroke="#e8c9a0" stroke-width="6.5" fill="none" stroke-linecap="round"/>
                                                                {{-- Bag --}}
                                                                <rect x="68" y="72" width="12" height="11" rx="2.5" fill="#8b7355"/>
                                                                <path d="M70 72 Q71 66 74 66 Q77 66 78 72" stroke="#8b7355" stroke-width="1.5" fill="none"/>
                                                                {{-- Shoes --}}
                                                                <ellipse cx="42" cy="131" rx="5" ry="2" fill="#3d2b1f"/>
                                                                <ellipse cx="58" cy="131" rx="5" ry="2" fill="#3d2b1f"/>
                                                            </svg>
                                                        </div>
                                                        {{-- Product listing details --}}
                                                        <div class="bg-white px-2 pt-1.5 pb-2.5">
                                                            <div class="flex items-center gap-1 mb-1.5">
                                                                <div class="h-3 w-3 rounded-full bg-[#ee4d2d] flex items-center justify-center">
                                                                    <svg class="h-2 w-2 text-white" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/></svg>
                                                                </div>
                                                                <span class="text-[6px] text-gray-600 font-semibold truncate">MMK2 Safa Britts Wrapped</span>
                                                            </div>
                                                            <div class="text-[6px] text-gray-400 truncate mb-1">Dress - Navy Checker</div>
                                                            <div class="text-[7px] font-bold text-[#ee4d2d] mb-1">₱18,000</div>
                                                            <div class="flex items-center gap-0.5 mb-1.5">
                                                                @for($i = 0; $i < 4; $i++)
                                                                    <svg class="h-1.5 w-1.5 text-[#ee4d2d]" viewBox="0 0 24 24" fill="currentColor"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                                                                @endfor
                                                                <span class="text-[5px] text-gray-400 ml-0.5">4.5 (190 sold)</span>
                                                            </div>
                                                            <div class="flex items-center justify-between">
                                                                <div class="flex gap-1">
                                                                    <button class="h-3.5 w-3.5 rounded border border-gray-300 flex items-center justify-center"><svg class="h-2 w-2 text-gray-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg></button>
                                                                    <button class="h-3.5 w-3.5 rounded border border-gray-300 flex items-center justify-center"><svg class="h-2 w-2 text-gray-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="18" cy="5" r="3"/><circle cx="6" cy="12" r="3"/><circle cx="18" cy="19" r="3"/><line x1="8.59" y1="13.51" x2="15.42" y2="17.49"/><line x1="15.41" y1="6.51" x2="8.59" y2="10.49"/></svg></button>
                                                                    <button class="h-3.5 w-3.5 rounded border border-gray-300 flex items-center justify-center"><svg class="h-2 w-2 text-gray-400" viewBox="0 0 24 24" fill="currentColor"><path d="M7 18c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zM1 2v2h2l3.6 7.59L5.25 14c-.16.28-.25.61-.25.96C5 16.1 5.9 17 7 17h12v-2H7.42c-.14 0-.25-.11-.25-.25l.03-.12.9-1.63H17c.75 0 1.41-.41 1.75-1.03L22 6H5.21l-.94-2H1z"/></svg></button>
                                                                </div>
                                                                <button class="rounded bg-[#ee4d2d] px-2 py-0.5 text-[5px] font-bold text-white">Buy Now</button>
                                                            </div>
                                                            <div class="mt-1.5 border-t border-gray-100 pt-1">
                                                                <div class="text-[5px] text-gray-400 font-semibold">Product Details</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <span class="text-xs text-[#ee4d2d] font-semibold">3:4 Image</span>
                                                </div>

                                            </div>
                                        </div>

                                        {{-- 3:4 Upload grid --}}
                                        <p class="text-sm text-gray-700 mb-3 font-medium">
                                            <span class="text-[#ee4d2d] mr-0.5">*</span> 3:4 Images
                                        </p>
                                        <div class="flex flex-wrap gap-3">
                                            {{-- Uploaded 3:4 image previews --}}
                                            @foreach($enlargedImages as $index => $image34)
                                                <div class="relative group h-32 w-24 rounded border border-gray-200 bg-gray-50 overflow-hidden shadow-sm">
                                                    <img
                                                        src="{{ $image34->temporaryUrl() }}"
                                                        alt="3:4 Product image {{ $index + 1 }}"
                                                        class="h-full w-full object-cover"
                                                    />
                                                    {{-- Cover badge on first 3:4 image --}}
                                                    @if($index === 0)
                                                        <div class="absolute bottom-0 inset-x-0 bg-[#ee4d2d] py-0.5 text-center">
                                                            <span class="text-[10px] font-semibold text-white tracking-wide">★ Cover</span>
                                                        </div>
                                                    @endif
                                                    <button
                                                        type="button"
                                                        wire:click="removeImage34({{ $index }})"
                                                        class="absolute top-1 right-1 flex h-5 w-5 items-center justify-center rounded-full bg-black/60 text-white opacity-0 group-hover:opacity-100 transition-opacity hover:bg-red-600 cursor-pointer"
                                                        aria-label="Remove 3:4 image"
                                                    >
                                                        <svg class="h-3 w-3" fill="currentColor" viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                                                        </svg>
                                                    </button>
                                                </div>
                                            @endforeach

                                            {{-- 3:4 Upload button --}}
                                            @if(count($enlargedImages) < 9)
                                                <label
                                                    for="product-image-34-upload"
                                                    class="group flex h-32 w-24 cursor-pointer flex-col items-center justify-center rounded border-2 border-dashed border-[#ee4d2d]/40 bg-white transition hover:border-[#ee4d2d] hover:bg-[#fff5f2]"
                                                >
                                                    <svg class="h-7 w-7 text-[#ee4d2d] transition group-hover:scale-110" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909M3.75 21h16.5A2.25 2.25 0 0 0 22.5 18.75V5.25A2.25 2.25 0 0 0 20.25 3H3.75A2.25 2.25 0 0 0 1.5 5.25v13.5A2.25 2.25 0 0 0 3.75 21Z"/>
                                                    </svg>
                                                    <span class="mt-1 text-[10px] text-[#ee4d2d] font-medium">Add 3:4</span>
                                                    <span class="text-[10px] text-gray-400">({{ count($enlargedImages) }}/9)</span>
                                                    <input
                                                        id="product-image-34-upload"
                                                        type="file"
                                                        wire:model="enlargedImages"
                                                        accept="image/*"
                                                        multiple
                                                        class="hidden"
                                                    />
                                                </label>
                                            @endif
                                        </div>

                                        {{-- Upload loading indicator for 3:4 --}}
                                        <div wire:loading wire:target="enlargedImages" class="mt-2 flex items-center gap-2 text-xs text-[#ee4d2d]">
                                            <svg class="h-4 w-4 animate-spin" viewBox="0 0 24 24" fill="none">
                                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
                                            </svg>
                                            Uploading...
                                        </div>

                                        @error('enlargedImages.*')
                                            <p class="mt-2 text-xs text-red-500">{{ $message }}</p>
                                        @enderror
                                    </div>
                                @endif
                            </div>

                            {{-- ──── Category ──── --}}
                            <div>
                                <label for="product-category" class="mb-2 block text-sm text-gray-700">
                                    <span class="text-[#ee4d2d] mr-0.5">*</span> Category
                                </label>
                                <div class="relative">
                                    <select
                                        id="product-category"
                                        wire:model="categoryId"
                                        class="w-full rounded border border-gray-300 bg-white py-2.5 pl-3 pr-10 text-sm text-gray-900 outline-none transition focus:border-[#ee4d2d] appearance-none cursor-pointer"
                                    >
                                        <option value="">Select a Category</option>
                                        @foreach($this->categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="pointer-events-none absolute inset-y-0 right-3 flex items-center text-gray-400">
                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                        </svg>
                                    </div>
                                </div>

                                @error('categoryId')
                                    <p class="mt-2 text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- ──── Product Name ──── --}}
                            <div>
                                <label for="product-name" class="mb-2 block text-sm text-gray-700">
                                    <span class="text-[#ee4d2d] mr-0.5">*</span> Product Name
                                </label>
                                <div class="relative">
                                    <input
                                        id="product-name"
                                        type="text"
                                        wire:model.live="productName"
                                        maxlength="100"
                                        placeholder="Brand Name + Product Type + Key Features (Materials, Colors, Size, Model)"
                                        class="w-full rounded border border-gray-300 bg-white py-2.5 pl-3 pr-16 text-sm text-gray-900 outline-none transition placeholder:text-gray-400 focus:border-[#ee4d2d]"
                                    />
                                    <span class="pointer-events-none absolute inset-y-0 right-3 flex items-center text-xs text-gray-400">
                                        {{ strlen($productName) }}/100
                                    </span>
                                </div>

                                @error('productName')
                                    <p class="mt-2 text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- ──── Price & Quantity ──── --}}
                            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                                {{-- Regular Price --}}
                                <div>
                                    <label for="product-price" class="mb-2 block text-sm text-gray-700">
                                        <span class="text-[#ee4d2d] mr-0.5">*</span> Regular Price
                                    </label>
                                    <div class="relative rounded border border-gray-300 focus-within:border-[#ee4d2d] transition bg-white">
                                        <span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-sm text-gray-500">
                                            ₱
                                        </span>
                                        <input
                                            id="product-price"
                                            type="number"
                                            step="0.01"
                                            min="0"
                                            wire:model.live="regularPrice"
                                            placeholder="0.00"
                                            class="w-full rounded bg-transparent py-2.5 pl-8 pr-3 text-sm text-gray-900 outline-none placeholder:text-gray-400 border-none"
                                        />
                                    </div>
                                    @error('regularPrice')
                                        <p class="mt-2 text-xs text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>

                                {{-- Quantity --}}
                                <div>
                                    <label for="product-quantity" class="mb-2 block text-sm text-gray-700">
                                        <span class="text-[#ee4d2d] mr-0.5">*</span> Quantity / Stock
                                    </label>
                                    <div class="relative">
                                        <input
                                            id="product-quantity"
                                            type="number"
                                            min="0"
                                            wire:model.live="quantity"
                                            placeholder="Enter stock quantity"
                                            class="w-full rounded border border-gray-300 bg-white py-2.5 px-3 text-sm text-gray-900 outline-none transition placeholder:text-gray-400 focus:border-[#ee4d2d]"
                                        />
                                    </div>
                                    @error('quantity')
                                        <p class="mt-2 text-xs text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                                {{-- Selling Price --}}
                                <div>
                                    <label for="product-price" class="mb-2 block text-sm text-gray-700">
                                        Selling Price <span class="text-xs text-gray-500">(if left empty, it will be the same as the regular price)</span>
                                    </label>
                                    <div class="relative rounded border border-gray-300 focus-within:border-[#ee4d2d] transition bg-white">
                                        <span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-sm text-gray-500">
                                            ₱
                                        </span>
                                        <input
                                            id="product-price"
                                            type="number"
                                            step="0.01"
                                            min="0"
                                            wire:model.live="sellingPrice"
                                            placeholder="0.00"
                                            class="w-full rounded bg-transparent py-2.5 pl-8 pr-3 text-sm text-gray-900 outline-none placeholder:text-gray-400 border-none"
                                        />
                                    </div>
                                    @error('sellingPrice')
                                        <p class="mt-2 text-xs text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            {{-- ──── Product Description ──── --}}
                            <div>
                                <label for="product-description" class="mb-2 block text-sm text-gray-700">
                                    <span class="text-[#ee4d2d] mr-0.5">*</span> Product Description
                                </label>

                                {{-- Description toolbar --}}
                                <div class="rounded-t border border-b-0 border-gray-300 bg-[#fafafa] px-3 py-2 flex items-center gap-1">
                                    <button type="button" class="p-1.5 rounded text-gray-500 hover:bg-gray-200 hover:text-gray-700 transition" title="Add Images">
                                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909M3.75 21h16.5A2.25 2.25 0 0 0 22.5 18.75V5.25A2.25 2.25 0 0 0 20.25 3H3.75A2.25 2.25 0 0 0 1.5 5.25v13.5A2.25 2.25 0 0 0 3.75 21Z"/>
                                        </svg>
                                    </button>
                                    <span class="text-xs text-gray-400 ml-1">Add Images (0/12)</span>
                                    <span class="ml-auto text-xs text-gray-400">{{ strlen($description) }}/3000</span>
                                </div>

                                {{-- Description textarea --}}
                                <div class="relative">
                                    <textarea
                                        id="product-description"
                                        wire:model.live="description"
                                        maxlength="3000"
                                        rows="8"
                                        placeholder="Please enter product description characters or add Images"
                                        class="w-full rounded-b border border-gray-300 bg-white py-3 px-3 text-sm text-gray-900 outline-none transition placeholder:text-gray-400 focus:border-[#ee4d2d] resize-y min-h-[120px]"
                                    ></textarea>
                                </div>

                                @error('description')
                                    <p class="mt-2 text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                    </div>

                    {{-- ──── Footer actions ──── --}}
                    <div class="flex flex-col-reverse items-stretch gap-3 border-t border-gray-200 bg-[#fafafa] px-6 py-5 sm:flex-row sm:justify-end">
                        <button
                            type="button"
                            class="rounded border border-gray-300 bg-white px-8 py-2.5 text-sm text-gray-700 transition hover:bg-gray-50 cursor-pointer"
                        >
                            Cancel
                        </button>
                        <button
                            type="submit"
                            class="rounded bg-[#ee4d2d] px-10 py-2.5 text-sm font-medium text-white shadow-sm transition hover:bg-[#d73211] cursor-pointer"
                        >
                            Add Product
                        </button>
                    </div>
                </form>
            </div>
        </div>

        {{-- ═══════════ Right Sidebar ═══════════ --}}
        <aside class="hidden w-72 shrink-0 lg:block space-y-5">
            {{-- Standard Product Card --}}
            <div class="rounded-lg border border-gray-200 bg-white shadow-sm overflow-hidden">
                {{-- Card header --}}
                <div class="flex items-center gap-2.5 px-5 pt-5 pb-4">
                    <div class="flex h-7 w-7 items-center justify-center rounded-full bg-[#ee4d2d]">
                        <svg class="h-4 w-4 text-white" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M16.5 6.5C16.5 4.01 14.49 2 12 2C9.51 2 7.5 4.01 7.5 6.5V7H5V20C5 21.1 5.9 22 7 22H17C18.1 22 19 21.1 19 20V7H16.5V6.5Z"/>
                        </svg>
                    </div>
                    <span class="text-sm font-semibold text-gray-800">UShop Standard Product</span>
                    <button type="button" class="ml-auto text-gray-400 hover:text-gray-600 transition" aria-label="Info">
                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="10"/>
                            <path d="M12 16v-4M12 8h.01"/>
                        </svg>
                    </button>
                </div>

                {{-- Search --}}
                <div class="px-5 pb-4">
                    <div class="relative">
                        <input
                            type="text"
                            placeholder="You can search by keywords or ima..."
                            class="w-full rounded border border-gray-300 bg-white py-2 pl-3 pr-9 text-xs text-gray-700 outline-none placeholder:text-gray-400 focus:border-[#ee4d2d] transition"
                        />
                        <button type="button" class="absolute inset-y-0 right-0 flex items-center px-2.5 text-gray-400 hover:text-[#ee4d2d] transition">
                            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909"/>
                            </svg>
                        </button>
                    </div>
                </div>

                {{-- Description --}}
                <div class="px-5 pb-5">
                    <p class="text-xs text-gray-500 leading-relaxed mb-3">
                        UShop Standard Product provides standardized listings compiled by UShop. Enjoy the following benefits when you link:
                    </p>
                    <ul class="space-y-1.5">
                        <li class="flex items-center gap-2 text-xs text-[#ee4d2d] font-medium">
                            <svg class="h-3.5 w-3.5 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/>
                            </svg>
                            Auto-fill your product information
                        </li>
                        <li class="flex items-center gap-2 text-xs text-[#ee4d2d] font-medium">
                            <svg class="h-3.5 w-3.5 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/>
                            </svg>
                            Cold start faster and sell more
                        </li>
                    </ul>
                </div>
            </div>

            {{-- Preview Card (shown when images are uploaded) --}}
            @if(count($regularImages) > 0)
                <div class="rounded-lg border border-gray-200 bg-white shadow-sm overflow-hidden">
                    <div class="px-5 pt-5 pb-3">
                        <h3 class="text-sm font-semibold text-gray-800">Preview</h3>
                        <p class="text-xs text-gray-400 mt-0.5">Product Detail</p>
                    </div>

                    {{-- Image Preview --}}
                    <div class="px-5 pb-3">
                        <div class="rounded-lg border border-gray-100 overflow-hidden bg-gray-50 aspect-square relative">
                            <img
                                src="{{ $regularImages[0]->temporaryUrl() }}"
                                alt="Product preview"
                                class="w-full h-full object-cover"
                            />
                            <div class="absolute bottom-2 right-2 bg-black/50 text-white text-[10px] px-1.5 py-0.5 rounded">
                                1/{{ count($regularImages) }}
                            </div>
                        </div>
                    </div>

                    {{-- Product info --}}
                    <div class="px-5 pb-4 space-y-2.5">
                        <p class="text-xs text-gray-400">0 Variations Available</p>
                        <div class="flex items-center gap-1">
                            <div class="h-4 w-4 rounded border border-gray-200 bg-gray-50 flex items-center justify-center">
                                <svg class="h-3 w-3 text-gray-300" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"/>
                                </svg>
                            </div>
                        </div>

                        <div class="border-t border-gray-100 pt-2.5">
                            <p class="text-sm font-semibold text-gray-400">--.---</p>
                            <p class="text-xs text-gray-500 mt-1 leading-relaxed line-clamp-2">
                                {{ $productName ?: 'Product Name' }}
                            </p>
                        </div>

                        {{-- Seller info --}}
                        <div class="flex items-center gap-2 pt-1">
                            <div class="h-6 w-6 rounded-full bg-[#feeee7] border border-[#ee4d2d]/30 flex items-center justify-center">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="h-3.5 w-3.5 text-[#ee4d2d]">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0"/>
                                </svg>
                            </div>
                            <span class="text-xs text-gray-600">{{ auth()->user()->name ?? 'Seller' }}</span>
                            <span class="ml-auto text-[10px] text-[#ee4d2d] border border-[#ee4d2d]/30 rounded px-2 py-0.5 hover:bg-[#fff5f2] cursor-pointer transition">Visit</span>
                        </div>

                        {{-- Action buttons --}}
                        <div class="flex gap-1.5 pt-2">
                            <button class="flex-1 rounded bg-[#2ac4a0] py-2 flex items-center justify-center text-white">
                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 0 1-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8Z"/>
                                </svg>
                            </button>
                            <button class="flex-1 rounded bg-[#ee4d2d] py-2 flex items-center justify-center text-white">
                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M7 18c-1.1 0-1.99.9-1.99 2S5.9 22 7 22s2-.9 2-2-.9-2-2-2zM1 2v2h2l3.6 7.59-1.35 2.45c-.16.28-.25.61-.25.96 0 1.1.9 2 2 2h12v-2H7.42c-.14 0-.25-.11-.25-.25l.03-.12.9-1.63h7.45c.75 0 1.41-.41 1.75-1.03l3.58-6.49c.08-.14.12-.31.12-.48 0-.55-.45-1-1-1H5.21l-.94-2H1zm16 16c-1.1 0-1.99.9-1.99 2s.89 2 1.99 2 2-.9 2-2-.9-2-2-2z"/>
                                </svg>
                            </button>
                            <button class="flex-[2] rounded bg-[#ee4d2d] py-2 text-xs font-semibold text-white">
                                Buy Now
                            </button>
                        </div>

                        <p class="text-[10px] text-gray-400 text-center pt-1">
                            This is for reference only, not the final result on the buyer end.
                        </p>
                    </div>
                </div>
            @endif
        </aside>

    </div>
</div>