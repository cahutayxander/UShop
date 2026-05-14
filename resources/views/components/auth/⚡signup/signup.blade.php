<div>
    @if (! $step)
     <div class="min-h-[calc(100vh-72px)] bg-[#fcf5f3] relative overflow-hidden flex flex-col justify-center pb-20">
        <!-- Background Graphic Placeholder (City Skyline) -->
        <div class="absolute bottom-0 left-0 right-0 h-48 opacity-20 pointer-events-none flex justify-center items-end" style="background-image: url('data:image/svg+xml,%3Csvg xmlns=\'http://www.w3.org/2000/svg\' viewBox=\'0 0 1440 320\'%3E%3Cpath fill=\'%23ee4d2d\' fill-opacity=\'1\' d=\'M0,288L48,272C96,256,192,224,288,197.3C384,171,480,149,576,165.3C672,181,768,235,864,250.7C960,267,1056,245,1152,224C1248,203,1344,181,1392,170.7L1440,160L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z\'%3E%3C/path%3E%3C/svg%3E'); background-size: cover; background-position: bottom; background-repeat: no-repeat; filter: drop-shadow(0 -10px 20px rgba(238, 77, 45, 0.5));">
            <!-- We could put a more complex skyline SVG here, but a stylized wave works as a stand-in for the vibe -->
        </div>

        <div class="max-w-7xl mx-auto w-full px-4 sm:px-6 lg:px-8 grid md:grid-cols-2 gap-10 items-center relative z-10 mt-10">
            
            <!-- Left Side Text -->
            <div class="hidden md:block">
                <h2 class="text-[#ee4d2d] text-2xl font-medium mb-1">UShop Marketplace</h2>
                <h1 class="text-[#ee4d2d] text-5xl font-bold leading-tight mb-8">
                    Grow your business and<br>Sell more
                </h1>
                
                <ul class="space-y-6">
                    <li class="flex items-start">
                        <div class="text-[#ee4d2d] mr-4 mt-1">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                        </div>
                        <p class="text-gray-700 text-lg">Leading e-commerce platform in Southeast Asia<br>and Taiwan</p>
                    </li>
                    <li class="flex items-start">
                        <div class="text-[#ee4d2d] mr-4 mt-1">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path></svg>
                        </div>
                        <p class="text-gray-700 text-lg">Growing global presence</p>
                    </li>
                    <li class="flex items-start">
                        <div class="text-[#ee4d2d] mr-4 mt-1">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.514"></path></svg>
                        </div>
                        <p class="text-gray-700 text-lg">#1 shopping app for both iOS and Android in the<br>Philippines</p>
                    </li>
                </ul>
            </div>

            <!-- Right Side Form -->
                <div class="flex justify-end">
                    <div class="bg-white rounded p-8 shadow-lg w-full max-w-[400px]">
                        <h3 class="text-xl text-gray-800 mb-6">Sign Up</h3>
                        
                        <form wire:submit="submit">
                            <div class="mb-4">
                                <input 
                                    type="text" 
                                    wire:model="email" 
                                    placeholder="Email" 
                                    class="w-full border border-gray-300 rounded px-3 py-2.5 focus:outline-none focus:border-[#ee4d2d] transition-colors"
                                >
                                @error('email') <span class="text-red-500 text-sm block mt-1">{{ $message }}</span> @enderror 
                            </div>
                            
                            <button type="submit" class="w-full bg-[#ee4d2d] text-white rounded py-2.5 hover:bg-[#d73211] transition-colors uppercase text-sm tracking-wide shadow-sm">
                                Next
                            </button>
                        </form>

                        <livewire:auth.social-media />
                    </div>
                </div>
        </div>
    </div>
    @else
    {{-- Stepper --}}
    <div class="relative flex justify-center px-4 py-8 pb-28 sm:px-6 lg:px-8">
        <div class="w-full max-w-3xl rounded border border-gray-200 bg-white shadow-sm">
            <div class="border-b border-gray-100 px-4 py-8 sm:px-10">
                <nav class="mx-auto flex max-w-2xl items-start" aria-label="Onboarding progress">
                    <div class="flex flex-1 flex-col items-center">
                        <span class="size-2.5 shrink-0 rounded-full bg-[#ee4d2d] ring-4 ring-white" aria-current="step"></span>
                        <span class="mt-3 text-center text-xs font-semibold text-gray-900 sm:text-sm">Verify Email</span>
                    </div>
                    <div class="flex min-h-[10px] min-w-6 flex-1 items-center pt-[5px] sm:min-w-8" aria-hidden="true">
                        <div class="h-px w-full bg-gray-200"></div>
                    </div>
                    <div class="flex flex-col items-center px-1">
                        <span class="size-2.5 shrink-0 rounded-full bg-gray-300 ring-4 ring-white"></span>
                        <span class="mt-3 max-w-[9rem] text-center text-xs leading-snug text-gray-400 sm:max-w-none sm:text-sm">Create Password</span>
                    </div>
                    <div class="flex min-h-[10px] min-w-6 flex-1 items-center pt-[5px] sm:min-w-8" aria-hidden="true">
                        <div class="h-px w-full bg-gray-200"></div>
                    </div>
                    <div class="flex flex-1 flex-col items-center">
                        <span class="size-2.5 shrink-0 rounded-full bg-gray-300 ring-4 ring-white"></span>
                        <span class="mt-3 text-center text-xs text-gray-400 sm:text-sm">Done</span>
                    </div>
                </nav>
            </div>

            <div class="w-full pb-10">
                @if ($step === 1)
                <!-- Select Verification Method -->
                <div class="max-w-md mx-auto py-10 px-4 sm:px-0">
                    <div class="relative flex items-center justify-center mb-8">
                        <button type="button" class="absolute left-0 text-[#ee4d2d] hover:bg-gray-50 p-1.5 rounded-full transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                            </svg>
                        </button>
                        <h2 class="text-xl text-gray-800">Select Verification Method</h2>
                    </div>

                    <div class="text-center mb-8">
                        <p class="text-gray-600 text-sm mb-2">Select one of the methods below to send verification code to</p>
                        <p class="text-gray-900 font-semibold"> {{ $email }}</p>
                    </div>

                    <div class="space-y-3">
                        <button type="button" wire:click="sendCode('email')" class="w-full flex items-center p-4 border border-gray-200 rounded-sm hover:bg-gray-50 transition-colors">
                            <div class="w-8 h-8 rounded-full bg-[#7360f2] flex items-center justify-center mr-4">
                                <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M19.463 6.945a9.387 9.387 0 0 0-6.732-2.923c-5.21 0-9.45 4.242-9.45 9.452 0 1.942.606 3.824 1.708 5.412l-1.464 4.382 4.49-1.425a9.38 9.38 0 0 0 4.716 1.26c5.21 0 9.45-4.24 9.45-9.45 0-2.525-.983-4.898-2.718-6.708zm-2.072 10.665c-.266.748-1.487 1.41-2.04 1.472-.516.057-1.18.175-3.37-.732-2.695-1.116-4.42-3.86-4.57-4.062-.15-.2-1.092-1.45-1.092-2.766 0-1.314.685-1.96.932-2.228.247-.267.54-.334.72-.334.18 0 .36 0 .515.006.166.007.388-.063.607.464.225.54.766 1.874.835 2.008.068.134.113.29.023.47-.09.18-.135.29-.27.447-.135.158-.286.34-.412.47-.142.146-.29.303-.125.59.165.286.736 1.218 1.583 1.973 1.095.975 2.015 1.275 2.302 1.41.286.134.453.11.62-.08.167-.19.72-.085.885-.105.166-.214.54-.18.756-.1.215.08 1.365.642 1.6.755.235.112.392.167.45.267.058.1.058.577-.208 1.325z" />
                                </svg>
                            </div>
                            <span class="text-gray-700">Gmail</span>
                        </button>

                        <button type="button" wire:click="sendCode('sms')" class="w-full flex items-center p-4 border border-gray-200 rounded-sm hover:bg-gray-50 transition-colors">
                            <div class="w-8 h-8 rounded-full bg-[#1877F2] flex items-center justify-center mr-4">
                                <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10c0 3.866-3.582 7-8 7a8.841 8.841 0 01-4.083-.98L2 17l1.338-3.123C2.493 12.767 2 11.434 2 10c0-3.866 3.582-7 8-7s8 3.134 8 7zM7 9H5v2h2V9zm8 0h-2v2h2V9zM9 9h2v2H9V9z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <span class="text-gray-700">SMS</span>
                        </button>
                    </div>
                </div>

                @elseif($step === 2)
                <!-- Enter Verification Code -->
                <div class="max-w-md mx-auto py-10 px-4 sm:px-0">
                    <div class="relative flex items-center justify-center mb-8">
                        <button type="button" @click="step = 1" class="absolute left-0 text-[#ee4d2d] hover:bg-gray-50 p-1.5 rounded-full transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                            </svg>
                        </button>
                        <h2 class="text-xl text-gray-800">Enter Verification Code</h2>
                    </div>

                    <div class="text-center mb-10">
                        <p class="text-gray-600 text-sm mb-1">Your verification code is sent to</p>
                        <p class="text-gray-900 font-semibold"> {{ $email }}</p>
                    </div>

                    <div class="flex justify-center gap-4 mb-10">
                        <input type="text" wire:model="code.0" maxlength="1" class="w-10 h-10 border-b border-gray-300 text-center text-xl focus:border-[#ee4d2d] focus:outline-none transition-colors" />
                        <input type="text" wire:model="code.1" maxlength="1" class="w-10 h-10 border-b border-gray-300 text-center text-xl focus:border-[#ee4d2d] focus:outline-none transition-colors" />
                        <input type="text" wire:model="code.2" maxlength="1" class="w-10 h-10 border-b border-gray-300 text-center text-xl focus:border-[#ee4d2d] focus:outline-none transition-colors" />
                        <input type="text" wire:model="code.3" maxlength="1" class="w-10 h-10 border-b border-gray-300 text-center text-xl focus:border-[#ee4d2d] focus:outline-none transition-colors" />
                        <input type="text" wire:model="code.4" maxlength="1" class="w-10 h-10 border-b border-gray-300 text-center text-xl focus:border-[#ee4d2d] focus:outline-none transition-colors" />
                        <input type="text" wire:model="code.5" maxlength="1" class="w-10 h-10 border-b border-gray-300 text-center text-xl focus:border-[#ee4d2d] focus:outline-none transition-colors" />
                    </div>

                    <div class="text-center mb-8">
                        <p class="text-gray-400 text-sm">Please wait 56 seconds to resend code.</p>
                    </div>

                    <button type="button" wire:click="verifyCode" class="w-full bg-[#f18a70] text-white rounded-sm py-2.5 font-medium uppercase text-sm tracking-wide hover:bg-[#ee4d2d] transition-colors">
                        Next
                    </button>
                </div>

                <!-- @else -->
                <!-- TODO: implement later this will pop up if user has already an account -->
                <!-- {{-- State 3: Is This Your Account? --}} -->
                <!-- <div x-show="step === 3" style="display: none;" class="max-w-md mx-auto py-10 px-4 sm:px-0">
                    <div class="relative flex items-center justify-center mb-10">
                        <button type="button" @click="step = 2" class="absolute left-0 text-[#ee4d2d] hover:bg-gray-50 p-1.5 rounded-full transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                            </svg>
                        </button>
                        <h2 class="text-xl text-gray-800">Is This Your Account?</h2>
                    </div>

                    <div class="flex flex-col items-center mb-6">
                        <div class="w-16 h-16 rounded-full border border-gray-200 flex items-center justify-center mb-4 bg-gray-50 text-gray-300">
                            <svg class="w-10 h-10" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                            </svg>
                        </div>
                        <h3 class="text-gray-900 font-bold mb-1 text-base">alexanderalancahutay</h3>
                        <p class="text-[#ee4d2d] font-medium text-sm">(+63) 975 968 4189</p>
                    </div>

                    <div class="text-center mb-8 px-2">
                        <p class="text-gray-600 text-sm leading-relaxed">
                            This phone number is already registered with Shopee. Please proceed to login if this account belongs to you.
                        </p>
                    </div>

                    <div class="space-y-3 w-full">
                        <button type="button" class="w-full bg-[#ee4d2d] hover:bg-[#d73211] text-white rounded-sm py-2.5 font-medium transition-colors text-sm">
                            Yes, Login
                        </button>
                        <button type="button" class="w-full bg-white border border-[#ee4d2d] text-[#ee4d2d] hover:bg-orange-50 rounded-sm py-2.5 font-medium transition-colors text-sm">
                            No, Create A New Account
                        </button>
                    </div>
                </div> -->
                @endif
            </div>   
        </div>
    @endif
</div>