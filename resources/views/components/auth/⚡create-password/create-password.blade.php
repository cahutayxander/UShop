<div>
    <div class="max-w-md mx-auto py-10 px-4 sm:px-0">
        <div class="relative flex items-center justify-center mb-8">
            <!-- <button type="button" class="absolute left-0 text-[#ee4d2d] hover:bg-gray-50 p-1.5 rounded-full transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
            </button> -->
            <h2 class="text-xl text-gray-800">Set your password</h2>
        </div>

        <div class="text-center mb-8">
            <p class="text-gray-600 text-sm">Last step! Set your password to complete the<br>sign up.</p>
        </div>

        <!-- We combine pwd (for validation) and show (for the eye icon) into one x-data -->
        <form wire:submit="signUp" x-data="{ pwd: '', show: false }">
            <div class="mb-4 relative">
                <!-- We use x-model="pwd" for real-time UI, and wire:model="password" for the backend -->
                <input 
                    :type="show ? 'text' : 'password'" 
                    wire:model="password"
                    x-model="pwd"
                    placeholder="Password" 
                    class="w-full border border-gray-300 rounded-sm px-3 py-2.5 focus:outline-none focus:border-[#ee4d2d] transition-colors pr-10"
                >
                <button type="button" @click="show = !show" class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600">
                    <svg x-show="!show" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                    </svg>
                    <svg x-cloak x-show="show" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                </button>
            </div>

            <!-- 3. Use Alpine's :class to conditionally apply the green text color using regex! -->
            <ul class="text-sm space-y-2 mb-8 ml-1">
                <li class="flex items-center gap-2">
                    <span :class="{'text-green-500': /[a-z]/.test(pwd), 'text-gray-400': !/[a-z]/.test(pwd)}">
                        At least one lowercase character
                    </span>
                </li>
                <li class="flex items-center gap-2">
                    <span :class="{'text-green-500': /[A-Z]/.test(pwd), 'text-gray-400': !/[A-Z]/.test(pwd)}">
                        At least one uppercase character
                    </span>
                </li>
                <li class="flex items-center gap-2">
                    <span :class="{'text-green-500': pwd.length >= 8 && pwd.length <= 16, 'text-gray-400': pwd.length < 8 || pwd.length > 16}">
                        8-16 characters
                    </span>
                </li>
                <li class="flex items-center gap-2 leading-tight">
                    <span :class="{'text-green-500': pwd.length > 0 && /^[\p{L}\p{N}\p{P}\p{S}]+$/u.test(pwd), 'text-gray-400': pwd.length === 0 || !/^[\p{L}\p{N}\p{P}\p{S}]+$/u.test(pwd)}">
                        Only letters, numbers and common punctuation can be used
                    </span>
                </li>
            </ul>

            <button 
                type="submit" 
                class="w-full bg-[#f18a70] text-white rounded-sm py-2.5 font-medium uppercase text-sm tracking-wide hover:bg-[#ee4d2d] transition-colors"
            >
                Sign Up
            </button>
        </form>
    </div>
</div>