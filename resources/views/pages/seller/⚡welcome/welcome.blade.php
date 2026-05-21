<div class="w-full max-w-4xl rounded-sm border border-gray-200 bg-white shadow-[0_1px_4px_rgba(0,0,0,0.05)] px-8 py-20 md:py-24 flex flex-col items-center justify-center">
    <!-- Onboarding SVG Illustration -->
    <div class="w-56 h-56 md:w-64 md:h-64 mb-8 flex items-center justify-center relative select-none">
        <svg viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-full h-full">
            <!-- Background pink gradient circle -->
            <defs>
                <radialGradient id="pinkCircleGrad" cx="50%" cy="50%" r="50%" fx="30%" fy="30%">
                    <stop offset="0%" stop-color="#fff5f2" />
                    <stop offset="100%" stop-color="#fde4db" />
                </radialGradient>
                <filter id="shadow" x="-10%" y="-10%" width="120%" height="120%">
                    <feDropShadow dx="1" dy="3" stdDeviation="3" flood-color="#ee4d2d" flood-opacity="0.1" />
                </filter>
            </defs>
            
            <circle cx="100" cy="100" r="70" fill="url(#pinkCircleGrad)" />
            
            <!-- Secondary soft circles/bubbles -->
            <circle cx="50" cy="50" r="10" fill="#fff0ea" opacity="0.7" />
            <circle cx="155" cy="145" r="15" fill="#ffece6" opacity="0.6" />
            <circle cx="140" cy="55" r="12" fill="#ffece6" opacity="0.6" />
            
            <!-- Floating small elements -->
            <!-- Document floating left -->
            <g transform="translate(32, 90) rotate(-15) scale(0.75)" filter="url(#shadow)">
                <rect x="0" y="0" width="30" height="40" rx="3" fill="#ffffff" stroke="#ffa38a" stroke-width="2" />
                <line x1="6" y1="10" x2="24" y2="10" stroke="#ffd8cd" stroke-width="2" stroke-linecap="round" />
                <line x1="6" y1="18" x2="20" y2="18" stroke="#ffd8cd" stroke-width="2" stroke-linecap="round" />
                <line x1="6" y1="26" x2="24" y2="26" stroke="#ffd8cd" stroke-width="2" stroke-linecap="round" />
            </g>
            
            <!-- Clock floating right -->
            <g transform="translate(145, 110) scale(0.9)">
                <circle cx="10" cy="10" r="9" fill="#ffffff" stroke="#ffa38a" stroke-width="2" />
                <line x1="10" y1="10" x2="10" y2="6" stroke="#ffa38a" stroke-width="2" stroke-linecap="round" />
                <line x1="10" y1="10" x2="14" y2="10" stroke="#ffa38a" stroke-width="2" stroke-linecap="round" />
            </g>

            <!-- Main browser mockup showing document setup -->
            <g filter="url(#shadow)">
                <rect x="58" y="68" width="94" height="68" rx="6" fill="#ffffff" stroke="#ff7f5c" stroke-width="2" />
                <!-- Browser Header -->
                <path d="M59 74C59 70.6863 61.6863 68 65 68H145C148.314 68 151 70.6863 151 74V78H59V74Z" fill="#ffece6" />
                <!-- Browser Dots -->
                <circle cx="69" cy="73" r="2.5" fill="#ff7f5c" />
                <circle cx="77" cy="73" r="2.5" fill="#ff7f5c" />
                <circle cx="85" cy="73" r="2.5" fill="#ff7f5c" />

                <!-- Mockup form elements -->
                <rect x="68" y="88" width="50" height="15" rx="3" fill="#ff7f5c" />
                <circle cx="76" cy="95.5" r="3" fill="#ffffff" />
                <line x1="84" y1="95.5" x2="110" y2="95.5" stroke="#ffffff" stroke-width="2.5" stroke-linecap="round" />

                <rect x="68" y="110" width="30" height="16" rx="2" fill="#fffbf9" stroke="#ffd8cd" stroke-width="1" />
                <circle cx="83" cy="118" r="4" fill="#ffd8cd" />
                
                <rect x="104" y="110" width="38" height="16" rx="2" fill="#fffbf9" stroke="#ffd8cd" stroke-width="1" />
                <line x1="109" y1="115" x2="124" y2="115" stroke="#ffd8cd" stroke-width="1.5" stroke-linecap="round" />
                <line x1="109" y1="121" x2="133" y2="121" stroke="#ffd8cd" stroke-width="1.5" stroke-linecap="round" />
            </g>

            <!-- Pencil drawing -->
            <g transform="translate(138, 114) rotate(-35) scale(0.9)" filter="url(#shadow)">
                <rect x="0" y="0" width="10" height="32" fill="#ff7f5c" rx="1" />
                <!-- Pencil tip -->
                <path d="M0 0 L5 -7 L10 0 Z" fill="#ffece6" />
                <path d="M3.5 -5 L5 -7 L6.5 -5 Z" fill="#7a4c43" />
                <!-- Pencil eraser -->
                <rect x="0" y="32" width="10" height="5" fill="#ffa38a" rx="1" />
                <rect x="0" y="30" width="10" height="2" fill="#d0d0d0" />
            </g>
        </svg>
    </div>

    <!-- Text Information -->
    <h2 class="text-2xl md:text-3xl font-semibold text-gray-800 text-center mb-4 tracking-tight">
        Welcome to UShop!
    </h2>
    <p class="text-gray-500 text-sm md:text-base text-center mb-8 max-w-md leading-relaxed">
        To get started, register as a seller by providing the necessary information.
    </p>

    <!-- Start Registration Button -->
    <a href="/seller/onboarding" wire:navigate class="w-full max-w-xs flex justify-center">
        <button type="submit" class="w-full bg-[#ee4d2d] text-white rounded-sm py-3 px-6 hover:bg-[#d73211] active:bg-[#c22d0e] transition-colors font-medium text-sm md:text-base tracking-wide shadow-[0_2px_4px_rgba(238,77,45,0.2)]">
            Start Registration
        </button>
    </a>
</div>
