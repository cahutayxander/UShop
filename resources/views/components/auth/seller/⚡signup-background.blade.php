<?php

use Livewire\Component;

new class extends Component
{
    //
};
?>

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
        {{ $slot }}
    </div>
</div>