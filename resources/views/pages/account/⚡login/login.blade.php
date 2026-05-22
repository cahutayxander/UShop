
<div>
     <div class="min-h-[calc(100vh-72px)] bg-[#fcf5f3] relative overflow-hidden flex flex-col justify-center pb-20">
            <!-- Background Graphic Placeholder (City Skyline) -->
            <div class="absolute bottom-0 left-0 right-0 h-48 opacity-20 pointer-events-none flex justify-center items-end" style="background-image: url('data:image/svg+xml,%3Csvg xmlns=\'http://www.w3.org/2000/svg\' viewBox=\'0 0 1440 320\'%3E%3Cpath fill=\'%23ee4d2d\' fill-opacity=\'1\' d=\'M0,288L48,272C96,256,192,224,288,197.3C384,171,480,149,576,165.3C672,181,768,235,864,250.7C960,267,1056,245,1152,224C1248,203,1344,181,1392,170.7L1440,160L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z\'%3E%3C/path%3E%3C/svg%3E'); background-size: cover; background-position: bottom; background-repeat: no-repeat; filter: drop-shadow(0 -10px 20px rgba(238, 77, 45, 0.5));">
                <!-- We could put a more complex skyline SVG here, but a stylized wave works as a stand-in for the vibe -->
            </div>

            <div class="max-w-7xl mx-auto w-full px-4 sm:px-6 lg:px-8 grid md:grid-cols-2 gap-10 items-center relative z-10 mt-10">
                
                <!-- Left Side Text -->
                @if ($isSellerRoute)
                    <livewire:account.seller.login-background />
                @else
                    <livewire:account.buyer.signup-background />
                @endif


                <!-- Right Side Form -->
                <div class="flex justify-end">
                    <div class="bg-white rounded p-8 shadow-lg w-full max-w-[400px]">
                        <h3 class="text-xl text-gray-800 mb-6">Sign Up</h3>
                        
                        <form wire:submit="startVerification">
                            <div class="mb-4">
                                <input 
                                    type="text" 
                                    wire:model="email" 
                                    placeholder="Email" 
                                    class="w-full border border-gray-300 rounded px-3 py-2.5 focus:outline-none focus:border-[#ee4d2d] transition-colors"
                                >
                                @error('email') <span class="text-red-500 text-sm block mt-1">{{ $message }}</span> @enderror 
                            </div>
                            
                            <button type="startVerification" class="w-full bg-[#ee4d2d] text-white rounded py-2.5 hover:bg-[#d73211] transition-colors uppercase text-sm tracking-wide shadow-sm">
                                Next
                            </button>
                        </form>

                        <livewire:account.social-media />
                    </div>
                </div>
            </div>
        </div>
</div>