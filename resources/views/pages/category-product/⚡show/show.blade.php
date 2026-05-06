
<div class="min-h-screen bg-[#f5f5f5] pb-10">

    <main class="mx-auto max-w-[1200px] px-4 py-4 lg:px-0">
        <section class="rounded-sm bg-white p-4 shadow-sm ring-1 ring-black/5 md:p-5 lg:p-6">
            <div class="grid gap-6 lg:gap-8 lg:grid-cols-[450px_1fr]">
                <div>
                    <div class="overflow-hidden rounded-sm border border-slate-200 bg-slate-100">
                        <img src="https://picsum.photos/id/1062/720/720" alt="Product image" class="aspect-square w-full object-cover">
                    </div>
                    <div class="mt-2 grid grid-cols-6 gap-2">
                        @foreach (range(1, 6) as $thumb)
                            <button type="button" class="overflow-hidden rounded-sm border border-slate-200 bg-slate-100 transition hover:border-[#ee4d2d]">
                                <img src="https://picsum.photos/id/{{ 1020 + $thumb }}/120/120" alt="" class="aspect-square w-full object-cover">
                            </button>
                        @endforeach
                    </div>
                    <div class="mt-4 flex flex-wrap items-center justify-between gap-3 border-t border-slate-100 pt-3 text-sm">
                        <div class="flex items-center gap-2 text-slate-600">
                            <span>Share:</span>
                            <span class="inline-flex size-7 items-center justify-center rounded-full bg-[#1877f2] text-xs font-bold text-white">f</span>
                            <span class="inline-flex size-7 items-center justify-center rounded-full bg-[#1da1f2] text-xs font-bold text-white">t</span>
                            <span class="inline-flex size-7 items-center justify-center rounded-full bg-[#e60023] text-xs font-bold text-white">p</span>
                        </div>
                        <button type="button" class="text-slate-600 hover:text-[#ee4d2d]">Favorite (22)</button>
                    </div>
                </div>

                <div>
                    <h1 class="text-2xl font-semibold leading-tight text-slate-900">
                        <span class="mr-1 inline-flex rounded bg-[#ee4d2d] px-1.5 py-0.5 text-xs font-bold text-white">Mall</span>
                        {{ $this->product->name }}
                    </h1>

                    <div class="mt-3 flex flex-wrap items-center gap-4 text-sm text-slate-600">
                        <div><span class="font-semibold text-slate-900">4.9</span></div>
                        <div class="text-[#ee4d2d]">★★★★★</div>
                        <div><span class="font-semibold text-slate-900">99</span> Ratings</div>
                        <div><span class="font-semibold text-slate-900"> {{ $this->product->total_sold }} </span> Sold</div>
                    </div>

                    <div class="mt-4 rounded-sm bg-[#fafafa] px-4 py-4">
                        <div class="flex flex-wrap items-center gap-2">
                            <span class="text-4xl font-bold text-[#ee4d2d]">₱149 - ₱159</span>
                            <span class="text-lg text-slate-400 line-through">₱259</span>
                            <span class="rounded-sm bg-[#ee4d2d]/10 px-1.5 py-0.5 text-xs font-semibold text-[#ee4d2d]">-42%</span>
                        </div>
                    </div>

                    <div class="mt-5 space-y-4 text-sm">
                        <div class="grid grid-cols-[120px_1fr] items-center gap-2">
                            <p class="text-slate-500">Quantity</p>
                            <div class="flex items-center gap-3">
                                <div class="inline-flex items-center rounded-sm border border-slate-300">
                                    <button type="button" class="grid size-9 place-items-center text-slate-500">-</button>
                                    <span class="grid h-9 min-w-10 place-items-center border-x border-slate-300 text-sm">1</span>
                                    <button type="button" class="grid size-9 place-items-center text-slate-500">+</button>
                                </div>
                                <span class="text-sm text-slate-600">IN STOCK</span>
                            </div>
                        </div>
                    </div>

                    <div class="mt-7 flex flex-wrap gap-3">
                        <button type="button" class="inline-flex min-w-40 items-center justify-center rounded-sm border border-[#ee4d2d] bg-[#fff2ee] px-6 py-3 font-medium text-[#ee4d2d] hover:bg-[#ffe6df]">
                            Add To Cart
                        </button>
                        <button type="button" class="inline-flex min-w-40 items-center justify-center rounded-sm bg-[#ee4d2d] px-6 py-3 font-medium text-white hover:bg-[#d94124]">
                            Buy Now
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <section class="mt-4 rounded-sm bg-white p-4 shadow-sm ring-1 ring-black/5">
            <h2 class="border-b border-slate-100 pb-3 text-2xl font-semibold text-slate-900">Product Specifications</h2>
            <dl class="mt-4 grid gap-y-3 text-sm sm:grid-cols-[180px_1fr]">
                <dt class="text-slate-500">Category</dt><dd class="text-slate-800">Shopee &gt; Men&apos;s Apparel &gt; Socks &gt; Others</dd>
                <dt class="text-slate-500">Stock</dt><dd class="text-slate-800">IN STOCK</dd>
                <dt class="text-slate-500">Country of Origin</dt><dd class="text-slate-800">China</dd>
                <dt class="text-slate-500">Pack Type</dt><dd class="text-slate-800">Single</dd>
                <dt class="text-slate-500">Socks Length</dt><dd class="text-slate-800">Calf High</dd>
                <dt class="text-slate-500">Socks Type</dt><dd class="text-slate-800">Sports Socks</dd>
                <dt class="text-slate-500">Custom Product</dt><dd class="text-slate-800">No</dd>
                <dt class="text-slate-500">Season</dt><dd class="text-slate-800">All Seasons</dd>
                <dt class="text-slate-500">Ships From</dt><dd class="text-slate-800">Imus, Cavite</dd>
            </dl>
        </section>

        <section class="mt-4 rounded-sm bg-white p-4 shadow-sm ring-1 ring-black/5">
            <h2 class="border-b border-slate-100 pb-3 text-2xl font-semibold text-slate-900">Product Description</h2>
            <div class="mt-4 space-y-2 text-sm leading-6 text-slate-700">
                <p>Pro Basketball Socks - Elite Comfort and Performance</p>
                <ul class="space-y-1">
                    <li>✅ Pro-Level Performance - Designed for serious players</li>
                    <li>✅ Arch Support - Reduces foot fatigue during play</li>
                    <li>✅ Non-Slip Grip - Stays in place, no slipping inside shoes</li>
                    <li>✅ Cushioned Terry Sole - Shock-absorbing comfort for jumps and landings</li>
                    <li>✅ Breathable Mesh - Keeps feet cool and dry all game long</li>
                    <li>✅ Reinforced Heel and Toe - Extra durability where it matters most</li>
                    <li>✅ Seamless Toe - Zero irritation, feels smooth against skin</li>
                    <li>✅ Odor Resistant - Stays fresh even after intense play</li>
                </ul>
            </div>
        </section>

        <section class="mt-4 rounded-sm bg-white p-4 shadow-sm ring-1 ring-black/5">
            <h2 class="border-b border-slate-100 pb-3 text-2xl font-semibold text-slate-900">Product Ratings</h2>
            <div class="mt-4 flex flex-col gap-3 rounded-sm bg-[#fffaf8] p-4 sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <p class="text-4xl font-semibold text-[#ee4d2d]">4.9 <span class="text-lg text-slate-700">out of 5</span></p>
                    <p class="mt-1 text-[#ee4d2d]">★★★★★</p>
                </div>
                <div class="flex flex-wrap gap-2 text-sm">
                    <button type="button" class="rounded-sm border border-[#ee4d2d] px-5 py-2 text-[#ee4d2d]">All</button>
                    <button type="button" class="rounded-sm border border-slate-200 px-5 py-2 text-slate-700">5 Star (94)</button>
                    <button type="button" class="rounded-sm border border-slate-200 px-5 py-2 text-slate-700">4 Star (3)</button>
                    <button type="button" class="rounded-sm border border-slate-200 px-5 py-2 text-slate-700">3 Star (1)</button>
                    <button type="button" class="rounded-sm border border-slate-200 px-5 py-2 text-slate-700">2 Star (0)</button>
                    <button type="button" class="rounded-sm border border-slate-200 px-5 py-2 text-slate-700">1 Star (0)</button>
                    <button type="button" class="rounded-sm border border-slate-200 px-5 py-2 text-slate-700">With Comments (13)</button>
                    <button type="button" class="rounded-sm border border-slate-200 px-5 py-2 text-slate-700">With Media (5)</button>
                </div>
            </div>
        </section>
    </main>
</div>