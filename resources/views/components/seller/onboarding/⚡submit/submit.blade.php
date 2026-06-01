<div class="px-4 py-14 sm:px-10">
    <div
        class="mx-auto flex min-h-[320px] max-w-2xl flex-col items-center justify-center text-center"
    >
        {{-- Success Icon --}}
        <div class="flex size-20 items-center justify-center rounded-full bg-[#5dd17a] shadow-sm">
            <svg
                class="size-10 text-white"
                viewBox="0 0 24 24"
                fill="none"
                aria-hidden="true"
            >
                <path
                    d="M6 12.5L10 16.5L18 8.5"
                    stroke="currentColor"
                    stroke-width="2.8"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                />
            </svg>
        </div>

        {{-- Title --}}
        <h2 class="mt-8 text-[28px] font-semibold text-[#333]">
            Submitted Successfully
        </h2>

        {{-- Description --}}
        <p class="mt-3 text-sm text-gray-400">
            Now you can proceed to add your first product!
        </p>

        {{-- CTA --}}
        <div class="mt-8">
            <a href="/seller/dashboard" wire:navigate>
                <button
                    type="button"
                    class="rounded bg-[#ee4d2d] px-7 py-2.5 text-sm font-medium text-white transition hover:bg-[#d73211]"
                >
                    Go to Add Product
                </button>
            </a>
        </div>
    </div>
</div>