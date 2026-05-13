<div>
    <div class="px-4 py-8 sm:px-10">
        <div class="space-y-8">
            {{-- Shop name --}}
            <div class="grid gap-3 sm:grid-cols-[minmax(0,160px)_1fr] sm:items-center sm:gap-6">
                <label for="shop-name" class="text-right text-sm text-gray-700 sm:pt-2.5">
                    <span class="text-[#ff4242]" aria-hidden="true">*</span> Shop Name
                </label>
                <div class="relative min-w-0">
                    <input
                        id="shop-name"
                        type="text"
                        maxlength="30"
                        value="alexanderalancahutay"
                        class="w-full rounded border border-gray-300 bg-white py-2.5 pl-3 pr-16 text-sm text-gray-900 outline-none transition placeholder:text-gray-400 focus:border-[#ee4d2d]"
                        autocomplete="organization"
                    />
                    <span class="pointer-events-none absolute inset-y-0 right-3 flex items-center text-xs text-gray-400">20/30</span>
                </div>
            </div>

            {{-- Pickup address --}}
            <div class="grid gap-3 sm:grid-cols-[minmax(0,160px)_1fr] sm:items-center sm:gap-6">
                <label class="text-right text-sm text-gray-700 sm:pt-2.5">
                    <span class="text-[#ff4242]" aria-hidden="true">*</span> Pickup Address
                </label>
                <div>
                    <button
                        type="button"
                        class="inline-flex items-center gap-2 rounded border border-gray-300 bg-white px-4 py-2.5 text-sm text-gray-700 transition hover:border-gray-400 hover:bg-gray-50"
                    >
                        <svg class="size-4 text-gray-500" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                            <path d="M12 5v14M5 12h14" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                        </svg>
                        Add
                    </button>
                </div>
            </div>

            {{-- Email --}}
            <div class="grid gap-3 sm:grid-cols-[minmax(0,160px)_1fr] sm:gap-6">
                <label class="text-right text-sm text-gray-700 sm:pt-1">
                    <span class="text-[#ff4242]" aria-hidden="true">*</span> Email
                </label>
                <div class="space-y-3">
                    <p class="text-sm text-gray-900">cahutayxander@gmail.com</p>
                    <div class="flex flex-col gap-2 sm:flex-row sm:items-center">
                        <input
                            type="text"
                            placeholder="Email Verification Code"
                            class="min-w-0 flex-1 rounded border border-gray-300 py-2.5 pl-3 pr-3 text-sm outline-none transition placeholder:text-gray-400 focus:border-[#ee4d2d]"
                            autocomplete="one-time-code"
                        />
                        <button
                            type="button"
                            class="shrink-0 rounded border border-[#ee4d2d] bg-white px-5 py-2.5 text-sm font-medium text-[#ee4d2d] transition hover:bg-[#fff5f3]"
                        >
                            Send
                        </button>
                    </div>
                </div>
            </div>

            {{-- Phone --}}
            <div class="grid gap-3 sm:grid-cols-[minmax(0,160px)_1fr] sm:gap-6">
                <label class="text-right text-sm text-gray-700 sm:pt-1">
                    <span class="text-[#ff4242]" aria-hidden="true">*</span> Phone Number
                </label>
                <div class="space-y-3">
                    <div class="flex overflow-hidden rounded border border-gray-300">
                        <span
                            class="flex shrink-0 items-center border-r border-gray-300 bg-gray-50 px-3 text-sm text-gray-600"
                        >+63</span>
                        <input
                            type="tel"
                            placeholder="Input"
                            class="min-w-0 flex-1 border-0 py-2.5 pl-3 text-sm outline-none ring-0 placeholder:text-gray-400 focus:ring-0"
                            autocomplete="tel-national"
                        />
                    </div>
                    <div class="flex flex-col gap-2 sm:flex-row sm:items-center">
                        <input
                            type="text"
                            placeholder="Input"
                            class="min-w-0 flex-1 rounded border border-gray-300 py-2.5 pl-3 pr-3 text-sm outline-none transition placeholder:text-gray-400 focus:border-[#ee4d2d]"
                            autocomplete="one-time-code"
                        />
                        <button
                            type="button"
                            disabled
                            class="shrink-0 cursor-not-allowed rounded border border-gray-200 bg-gray-50 px-5 py-2.5 text-sm font-medium text-gray-400"
                        >
                            Send
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- Card footer actions --}}
        <div class="flex flex-col-reverse items-stretch gap-3 border-t border-gray-200 px-4 py-5 sm:flex-row sm:justify-end sm:px-10">
            <button
                type="button"
                class="rounded border border-gray-300 bg-white px-8 py-2.5 text-sm text-gray-700 transition hover:bg-gray-50"
            >
                Cancel
            </button>
            <button
                type="button"
                class="rounded bg-[#ee4d2d] px-10 py-2.5 text-sm font-medium text-white shadow-sm transition hover:bg-[#d73211]"
            >
                Next
            </button>
        </div>
</div>