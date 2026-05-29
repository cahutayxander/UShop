<div class="w-full min-w-0">
    <div class="px-4 py-8 sm:px-10 w-full">
        <div class="space-y-8 w-full">
            {{-- Shop name --}}
            <div class="grid gap-3 sm:grid-cols-[minmax(0,160px)_1fr] sm:items-center sm:gap-6">
                <label for="shop-name" class="text-right text-sm text-gray-700 sm:pt-2.5">
                    <span class="text-[#ff4242]" aria-hidden="true">*</span> Shop Name
                </label>
                <div class="relative min-w-0">
                    <input
                        id="shop-name"
                        wire:model="shopName"
                        type="text"
                        maxlength="30"
                        class="w-full rounded border border-gray-300 bg-white py-2.5 pl-3 pr-16 text-sm text-gray-900 outline-none transition placeholder:text-gray-400 focus:border-[#ee4d2d]"
                        autocomplete="organization"
                    />
                    <span class="pointer-events-none absolute inset-y-0 right-3 flex items-center text-xs text-gray-400">20/30</span>
                    @error('shopName')
                        <div class="text-xs text-red-600 max-w-xs break-words whitespace-normal">{{ $message }}</div>
                    @enderror
                </div>
               
            </div>

            <div class="grid gap-3 sm:grid-cols-[minmax(0,160px)_1fr] sm:items-center sm:gap-6">
                <label for="shop-name" class="text-right text-sm text-gray-700 sm:pt-2.5">
                    <span class="text-[#ff4242]" aria-hidden="true">*</span> Registered Address
                </label>
                <div class="relative min-w-0">
                    <input
                        id="registered-address"
                        wire:model="address"
                        type="text"
                        class="w-full rounded border border-gray-300 bg-white py-2.5 pl-3 pr-16 text-sm text-gray-900 outline-none transition placeholder:text-gray-400 focus:border-[#ee4d2d]"
                    />
                    @error('address')
                        <div class="text-xs text-red-600 max-w-xs break-words whitespace-normal">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="grid gap-3 sm:grid-cols-[minmax(0,160px)_1fr] sm:items-center sm:gap-6">
                <label for="zip-code" class="text-right text-sm text-gray-700 sm:pt-2.5">
                    <span class="text-[#ff4242]" aria-hidden="true">*</span> Zip Code
                </label>
                <div class="relative min-w-0">
                    <input
                        id="zip-code"
                        wire:model="zipCode"
                        type="text"
                        class="w-full rounded border border-gray-300 bg-white py-2.5 pl-3 pr-16 text-sm text-gray-900 outline-none transition placeholder:text-gray-400 focus:border-[#ee4d2d]"
                    />
                    @error('zipCode')
                        <div class="text-xs text-red-600 max-w-xs break-words whitespace-normal">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            {{-- Phone --}}
            <div class="grid gap-3 sm:grid-cols-[minmax(0,160px)_1fr] sm:gap-6">
                <label class="text-right text-sm text-gray-700 sm:pt-1">
                    <span class="text-[#ff4242]" aria-hidden="true">*</span> Phone Number
                </label>
                <div class="space-y-3 min-w-0">
                    <div class="flex overflow-hidden rounded border border-gray-300">
                        <span
                            class="flex shrink-0 items-center border-r border-gray-300 bg-gray-50 px-3 text-sm text-gray-600"
                        >+63</span>
                        <input
                            type="tel"
                            wire:model.live="phoneNumber"
                            placeholder="Input"
                            maxlength="10"
                            minlength="10"
                            pattern="[0-9]{10}"
                            class="min-w-0 flex-1 border-0 py-2.5 pl-3 text-sm outline-none ring-0 placeholder:text-gray-400 focus:ring-0"
                            autocomplete="tel-national"
                        />
                    </div>
                    @error('phoneNumber')
                        <div class="text-xs text-red-600 max-w-xs break-words whitespace-normal">{{ $message }}</div>
                    @enderror

                    <div class="flex flex-col gap-2 sm:flex-row sm:items-center">
                        <input
                            type="text"
                            placeholder="Input"
                            minlength="6"
                            maxlength="6"
                            wire:model.live="otpCode"
                            class="min-w-0 flex-1 rounded border border-gray-300 py-2.5 pl-3 pr-3 text-sm outline-none transition placeholder:text-gray-400 focus:border-[#ee4d2d]"
                            autocomplete="one-time-code"
                        />
                        <button
                            type="button"
                            wire:click="sendOtp"
                            {{ strlen($phoneNumber) === 10 ? '' : 'disabled' }}
                            class="shrink-0 rounded border px-5 py-2.5 text-sm font-medium transition {{ strlen($phoneNumber) === 10 ? 'bg-[#ee4d2d] text-white hover:bg-[#d73211] cursor-pointer' : 'bg-gray-50 border-gray-200 text-gray-400 cursor-not-allowed' }}"
                        >
                            Send
                        </button>
                    </div>
                    @error('otpCode')
                        <div class="text-xs text-red-600 max-w-xs break-words whitespace-normal">{{ $message }}</div>
                    @enderror
                    @if (session()->has('otp_message'))
                        <div class="text-xs text-green-600">{{ session('otp_message') }}</div>
                    @endif

                    @if ($errors->has('invalid_otp'))
                        <p class="text-red-500 text-sm">{{ $errors->first('invalid_otp') }} </p>
                    @endif
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
                wire:click="save"
                class="rounded px-10 py-2.5 text-sm font-medium text-white shadow-sm transition bg-green-600 hover:bg-green-700 cursor-pointer"
            >
                            <!-- class="rounded px-10 py-2.5 text-sm font-medium text-white shadow-sm transition {{ (strlen($phoneNumber) === 10 && strlen($otpCode) === 6) ? 'bg-green-600 hover:bg-green-700 cursor-pointer' : 'bg-gray-300 cursor-not-allowed' }}" -->
                <!-- {{ (strlen($phoneNumber) === 10 && strlen($otpCode) === 6) ? '' : 'disabled' }} -->

                Next
            </button>
        </div>
</div>