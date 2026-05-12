<div>
    <div class="flex justify-end">
        <div class="bg-white rounded p-8 shadow-lg w-full max-w-[400px]">
            <h3 class="text-xl text-gray-800 mb-6">Sign Up</h3>
            
            <form wire:submit="submit">
                <div class="mb-4">
                    <input 
                        type="text" 
                        wire:model="phoneNumber" 
                        placeholder="Phone Number" 
                        class="w-full border border-gray-300 rounded px-3 py-2.5 focus:outline-none focus:border-[#ee4d2d] transition-colors"
                    >
                </div>
                
                <button type="submit" class="w-full bg-[#ee4d2d] text-white rounded py-2.5 hover:bg-[#d73211] transition-colors uppercase text-sm tracking-wide shadow-sm">
                    Next
                </button>
            </form>

            <livewire:auth.third-party />
        </div>
    </div>
</div>
