<div class="min-h-screen bg-[#f5f5f5] text-[#222] antialiased">
    <div class="relative flex justify-center px-4 py-8 pb-28 sm:px-6 lg:px-8">
        <div class="w-full max-w-3xl min-w-0 rounded border border-gray-200 bg-white shadow-sm">
            {{-- Stepper --}}
            <div class="border-b border-gray-100 px-4 py-8 sm:px-10">
                <nav class="mx-auto flex max-w-2xl items-start" aria-label="Onboarding progress">
                    <div class="flex flex-1 flex-col items-center">
                        <span class="size-2.5 shrink-0 rounded-full bg-[#ee4d2d] ring-4 ring-white" aria-current="step"></span>
                        <span class="mt-3 text-center text-xs font-semibold text-gray-900 sm:text-sm">Shop Information</span>
                    </div>
                    <!-- <div class="flex flex-col items-center px-1">
                        <span class="size-2.5 shrink-0 rounded-full bg-gray-300 ring-4 ring-white"></span>
                        <span class="mt-3 max-w-[9rem] text-center text-xs leading-snug text-gray-400 sm:max-w-none sm:text-sm">Business Information</span>
                    </div> -->
                    <div class="flex min-h-[10px] min-w-6 flex-1 items-center pt-[5px] sm:min-w-8" aria-hidden="true">
                        <div class="h-px w-full {{ $this->hasVerifiedProfile() ? 'bg-[#ee4d2d]' : 'bg-gray-200' }}"></div>
                    </div>
                    <div class="flex flex-1 flex-col items-center">
                        <span class="size-2.5 shrink-0 rounded-full {{ $this->hasVerifiedProfile() ? 'bg-[#ee4d2d]' : 'bg-gray-300' }} ring-4 ring-white" aria-current="step"></span>
                        <span class="mt-3 text-center text-xs font-semibold {{ $this->hasVerifiedProfile() ? 'text-gray-900' : 'text-gray-400' }} sm:text-sm">Submit</span>
                    </div>
                </nav>
            </div>

            @if (! $this->hasVerifiedProfile())
                <livewire:seller.onboarding.shop-info />            
            @else
                {{-- Success State --}}
                <livewire:seller.onboarding.submit />
            @endif

        </div>

        {{-- Right utility rail --}}
        <aside
            class="pointer-events-none fixed right-3 top-1/2 z-20 hidden -translate-y-1/2 flex-col items-center gap-4 lg:pointer-events-auto lg:flex"
            aria-label="Quick actions"
        >
            <button
                type="button"
                class="pointer-events-auto grid size-11 place-items-center overflow-hidden rounded-full border border-gray-200 bg-white shadow-md transition hover:shadow-lg"
                aria-label="Account"
            >
                <span class="grid size-full place-items-center bg-gray-200 text-gray-500">
                    <svg class="size-6" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                        <path
                            d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"
                        />
                    </svg>
                </span>
            </button>
            <button
                type="button"
                class="pointer-events-auto grid size-11 place-items-center rounded-full bg-[#ee4d2d] text-white shadow-md transition hover:bg-[#d73211]"
                aria-label="Notifications"
            >
                <svg class="size-5" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                    <path
                        d="M15 17h5l-1.4-1.4A2 2 0 0 1 18 14.2V11a6 6 0 1 0-12 0v3.2c0 .5-.2 1-.6 1.4L4 17h5m6 0a3 3 0 1 1-6 0h6Z"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    />
                </svg>
            </button>
            <button
                type="button"
                class="pointer-events-auto grid size-11 place-items-center rounded-full bg-[#ee4d2d] text-white shadow-md transition hover:bg-[#d73211]"
                aria-label="Chat"
            >
                <svg class="size-5" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                    <path
                        d="M8 10h8M8 14h5M6 18l-2 2V6a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H6Z"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    />
                </svg>
            </button>
        </aside>
    </div>
</div>
