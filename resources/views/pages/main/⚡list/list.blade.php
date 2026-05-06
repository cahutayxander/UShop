
<div class="min-h-screen">

    <main class="mx-auto grid max-w-7xl gap-6 px-4 py-6 sm:px-6 lg:px-8">
        <section class="overflow-hidden rounded-3xl bg-gradient-to-br from-orange-500 via-orange-400 to-amber-300 p-6 text-white shadow-sm sm:p-8">
            <div class="grid gap-6 lg:grid-cols-[1.1fr_0.9fr] lg:items-center">
                <div>
                    <p class="mb-2 text-sm font-semibold uppercase tracking-[0.2em] text-orange-100">Daily marketplace</p>
                    <h1 class="max-w-2xl text-3xl font-black tracking-tight sm:text-5xl">
                        Find top products and local sellers in one place.
                    </h1>
                    <p class="mt-4 max-w-xl text-sm leading-6 text-orange-50 sm:text-base">
                        Static storefront preview based on your sketch. Categories, search, cart, and product sections are ready for future Livewire behavior.
                    </p>
                </div>

                <div class="rounded-2xl bg-white/15 p-4 backdrop-blur">
                    <div class="grid grid-cols-2 gap-3 text-sm">
                        <div class="rounded-2xl bg-white p-4 text-slate-900 shadow-sm">
                            <p class="text-slate-500">Today Deals</p>
                            <p class="mt-2 text-2xl font-black">120+</p>
                        </div>
                        <div class="rounded-2xl bg-white p-4 text-slate-900 shadow-sm">
                            <p class="text-slate-500">Active Sellers</p>
                            <p class="mt-2 text-2xl font-black">48</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <livewire:main.categories />

        <livewire:main.top-products />
    </main>
</div>