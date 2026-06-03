<div class="min-h-screen bg-[#f5f5f5]">
    {{-- Warning Banner --}}
    <div class="mx-auto max-w-[1200px] px-4 pt-4">
        <div class="flex items-start gap-3 rounded bg-[#fff8e6] border border-[#ffe58f] px-4 py-3 text-sm text-gray-700 shadow-sm">
            <span class="mt-0.5 flex-shrink-0 text-[#faad14]">
                <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                </svg>
            </span>
            <p class="leading-relaxed">
                Your shop and products are currently hidden from public view due to incomplete business information.
                Kindly update your business information <a href="#" class="text-blue-600 underline hover:text-blue-800">here</a>.
                To learn more, click <a href="#" class="text-blue-600 underline hover:text-blue-800">here</a>.
            </p>
            <button class="ml-auto flex-shrink-0 text-gray-400 hover:text-gray-600 transition-colors" aria-label="Dismiss">
                <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                </svg>
            </button>
        </div>
    </div>

    {{-- Main Content --}}
    <div class="mx-auto max-w-[1200px] px-4 py-4">
        <div class="flex gap-4">
            {{-- Left Column (Main Content) --}}
            <div class="flex-1 min-w-0 space-y-4">

                {{-- Order Status Cards --}}
                <div class="rounded bg-white p-5 shadow-sm border border-gray-100">
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        {{-- To-Process Shipment --}}
                        <div class="text-center group cursor-pointer">
                            <a href="#" class="block">
                                <div class="text-2xl font-semibold text-[#ee4d2d] group-hover:text-[#d73211] transition-colors">0</div>
                                <div class="text-xs text-gray-500 mt-1">To-Process Shipment</div>
                            </a>
                        </div>
                        {{-- Processed Shipment --}}
                        <div class="text-center group cursor-pointer">
                            <a href="#" class="block">
                                <div class="text-2xl font-semibold text-[#ee4d2d] group-hover:text-[#d73211] transition-colors">0</div>
                                <div class="text-xs text-gray-500 mt-1">Processed Shipment</div>
                            </a>
                        </div>
                        {{-- Return/Refund/Cancel --}}
                        <div class="text-center group cursor-pointer">
                            <a href="#" class="block">
                                <div class="text-2xl font-semibold text-[#ee4d2d] group-hover:text-[#d73211] transition-colors">0</div>
                                <div class="text-xs text-gray-500 mt-1">Return/Refund/Cancel</div>
                            </a>
                        </div>
                        {{-- Banned / Deboosted Products --}}
                        <div class="text-center group cursor-pointer">
                            <a href="#" class="block">
                                <div class="text-2xl font-semibold text-[#ee4d2d] group-hover:text-[#d73211] transition-colors">0</div>
                                <div class="text-xs text-gray-500 mt-1">Banned / Deboosted Products</div>
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Business Insights --}}
                <div class="rounded bg-white p-5 shadow-sm border border-gray-100">
                    <div class="flex items-center justify-between mb-5">
                        <div class="flex items-center gap-3">
                            <h3 class="text-base font-semibold text-gray-800">Business Insights</h3>
                            <span class="text-[11px] text-gray-400">Real-time data until GMT+8 14:00(Data changes is compared to yesterday)</span>
                        </div>
                        <a href="#" class="text-sm text-[#ee4d2d] hover:text-[#d73211] font-medium flex items-center gap-1 transition-colors">
                            More
                            <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </div>
                    <div class="grid grid-cols-2 md:grid-cols-5 gap-6">
                        {{-- Sales --}}
                        <div>
                            <div class="flex items-center gap-1 mb-2">
                                <span class="text-xs text-gray-500">Sales</span>
                                <svg class="h-3.5 w-3.5 text-gray-400 cursor-help" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <circle cx="12" cy="12" r="10"/>
                                    <path d="M9.09 9a3 3 0 015.83 1c0 2-3 3-3 3M12 17h.01"/>
                                </svg>
                            </div>
                            <div class="text-lg font-semibold text-gray-800">₱0</div>
                            <div class="text-xs text-gray-400 mt-1 flex items-center gap-1">
                                <span class="text-gray-400">—</span> 0.00%
                            </div>
                        </div>
                        {{-- Visitors --}}
                        <div>
                            <div class="flex items-center gap-1 mb-2">
                                <span class="text-xs text-gray-500">Visitors</span>
                                <svg class="h-3.5 w-3.5 text-gray-400 cursor-help" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <circle cx="12" cy="12" r="10"/>
                                    <path d="M9.09 9a3 3 0 015.83 1c0 2-3 3-3 3M12 17h.01"/>
                                </svg>
                            </div>
                            <div class="text-lg font-semibold text-gray-800">0</div>
                            <div class="text-xs text-gray-400 mt-1 flex items-center gap-1">
                                <span class="text-gray-400">—</span> 0.00%
                            </div>
                        </div>
                        {{-- Product Clicks --}}
                        <div>
                            <div class="flex items-center gap-1 mb-2">
                                <span class="text-xs text-gray-500">Product Clicks</span>
                                <svg class="h-3.5 w-3.5 text-gray-400 cursor-help" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <circle cx="12" cy="12" r="10"/>
                                    <path d="M9.09 9a3 3 0 015.83 1c0 2-3 3-3 3M12 17h.01"/>
                                </svg>
                            </div>
                            <div class="text-lg font-semibold text-gray-800">0</div>
                            <div class="text-xs text-gray-400 mt-1 flex items-center gap-1">
                                <span class="text-gray-400">—</span> 0.00%
                            </div>
                        </div>
                        {{-- Orders --}}
                        <div>
                            <div class="flex items-center gap-1 mb-2">
                                <span class="text-xs text-gray-500">Orders</span>
                                <svg class="h-3.5 w-3.5 text-gray-400 cursor-help" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <circle cx="12" cy="12" r="10"/>
                                    <path d="M9.09 9a3 3 0 015.83 1c0 2-3 3-3 3M12 17h.01"/>
                                </svg>
                            </div>
                            <div class="text-lg font-semibold text-gray-800">0</div>
                            <div class="text-xs text-gray-400 mt-1 flex items-center gap-1">
                                <span class="text-gray-400">—</span> 0.00%
                            </div>
                        </div>
                        {{-- Order Conversion Rate --}}
                        <div>
                            <div class="flex items-center gap-1 mb-2">
                                <span class="text-xs text-gray-500">Order Conversion Rate</span>
                                <svg class="h-3.5 w-3.5 text-gray-400 cursor-help" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <circle cx="12" cy="12" r="10"/>
                                    <path d="M9.09 9a3 3 0 015.83 1c0 2-3 3-3 3M12 17h.01"/>
                                </svg>
                            </div>
                            <div class="text-lg font-semibold text-gray-800">0.00%</div>
                            <div class="text-xs text-gray-400 mt-1 flex items-center gap-1">
                                <span class="text-gray-400">—</span> 0.00%
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Shopee Ads --}}
                <div class="rounded bg-white p-5 shadow-sm border border-gray-100">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-base font-semibold text-gray-800">Shopee Ads</h3>
                        <a href="#" class="text-sm text-[#ee4d2d] hover:text-[#d73211] font-medium flex items-center gap-1 transition-colors">
                            More
                            <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </div>
                    <div class="flex items-center gap-5 bg-[#fafafa] rounded-lg p-5 border border-gray-50">
                        <div class="flex-shrink-0 h-12 w-12 rounded-full bg-[#ee4d2d] flex items-center justify-center shadow-md">
                            <svg class="h-6 w-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h4 class="text-sm font-semibold text-gray-800 mb-1">Maximise your sales with Shopee Ads!</h4>
                            <p class="text-xs text-gray-500 leading-relaxed">Learn more about Shopee Ads. Find the right way to advertise and make your Ads affordable.</p>
                        </div>
                        <div class="flex-shrink-0">
                            {{-- Decorative illustration placeholder --}}
                            <div class="w-20 h-16 rounded-lg bg-gradient-to-br from-[#fff0ea] to-[#fde4db] flex items-center justify-center">
                                <svg class="h-10 w-10 text-[#ee4d2d] opacity-40" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M16 6l2.29 2.29-4.88 4.88-4-4L2 16.59 3.41 18l6-6 4 4 6.3-6.29L22 12V6z"/>
                                </svg>
                            </div>
                        </div>
                        <a href="#" class="flex-shrink-0 px-5 py-2 border border-[#ee4d2d] text-[#ee4d2d] text-sm font-medium rounded hover:bg-[#ee4d2d] hover:text-white transition-colors">
                            Learn More
                        </a>
                    </div>
                </div>

                {{-- Bottom Row: Affiliate Marketing & Livestream --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    {{-- Affiliate Marketing Solution --}}
                    <div class="rounded bg-white p-5 shadow-sm border border-gray-100">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-base font-semibold text-gray-800">Affiliate Marketing Solution</h3>
                            <a href="#" class="text-sm text-[#ee4d2d] hover:text-[#d73211] font-medium flex items-center gap-1 transition-colors">
                                More
                                <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                                </svg>
                            </a>
                        </div>
                        <div class="flex items-center gap-4 bg-gradient-to-r from-[#fff5f2] to-[#fff0ea] rounded-lg p-4">
                            <div class="flex-1">
                                <p class="text-sm font-medium text-gray-700 leading-relaxed">
                                    Only pay for successful orders brought by affiliates!
                                </p>
                            </div>
                            <div class="flex-shrink-0 h-14 w-14 rounded-full bg-gradient-to-br from-[#ee4d2d] to-[#ff7043] flex items-center justify-center shadow-md">
                                <svg class="h-7 w-7 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                        </div>
                    </div>

                    {{-- Livestream --}}
                    <div class="rounded bg-white p-5 shadow-sm border border-gray-100">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-base font-semibold text-gray-800">Livestream</h3>
                            <a href="#" class="text-sm text-[#ee4d2d] hover:text-[#d73211] font-medium flex items-center gap-1 transition-colors">
                                More
                                <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                                </svg>
                            </a>
                        </div>
                        <div class="flex items-center gap-4 bg-gradient-to-r from-[#f0f9ff] to-[#e0f2fe] rounded-lg p-4">
                            <div class="flex-1">
                                <h4 class="text-sm font-bold text-gray-800 mb-1">Start streaming now!</h4>
                                <p class="text-xs text-gray-500">
                                    Increase your conversion up to <span class="text-[#ee4d2d] font-bold text-sm">2x</span>!
                                </p>
                            </div>
                            <div class="flex-shrink-0 h-14 w-14 rounded-full bg-gradient-to-br from-[#3b82f6] to-[#6366f1] flex items-center justify-center shadow-md">
                                <svg class="h-7 w-7 text-white" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M17 10.5V7c0-.55-.45-1-1-1H4c-.55 0-1 .45-1 1v10c0 .55.45 1 1 1h12c.55 0 1-.45 1-1v-3.5l4 4v-11l-4 4z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Right Sidebar --}}
            <div class="hidden lg:block w-[280px] flex-shrink-0 space-y-4">

                {{-- Shop Performance --}}
                <div class="rounded bg-white p-5 shadow-sm border border-gray-100">
                    <h3 class="text-base font-semibold text-gray-800 mb-3">Shop Performance</h3>
                    <a href="#" class="group block">
                        <div class="flex items-center justify-between">
                            <div>
                                <span class="text-[#ee4d2d] font-semibold text-sm">Excellent</span>
                                <p class="text-xs text-gray-400 mt-0.5">All metrics are meeting the targets</p>
                            </div>
                            <svg class="h-4 w-4 text-gray-400 group-hover:text-[#ee4d2d] transition-colors" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                            </svg>
                        </div>
                    </a>
                </div>

                {{-- Business Advice --}}
                <div class="rounded bg-white p-5 shadow-sm border border-gray-100">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-base font-semibold text-gray-800">Business Advice</h3>
                        <span class="text-xs text-gray-400">2 advices</span>
                    </div>
                    <div class="space-y-4">
                        {{-- Advice Card 1 --}}
                        <div class="border border-gray-100 rounded-lg p-4">
                            <div class="flex items-start gap-2.5 mb-2">
                                <span class="flex-shrink-0 mt-0.5">
                                    <svg class="h-4 w-4 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                    </svg>
                                </span>
                                <h4 class="text-xs font-semibold text-gray-800 leading-snug">No Balance! Enable Auto Top-Up to Keep Ads Running</h4>
                            </div>
                            <p class="text-[11px] text-gray-500 leading-relaxed mb-3 pl-6">
                                Ads has been interrupted! Enable Auto Top-Up to ensure uninterrupted spending for better results.
                            </p>
                            <div class="flex items-center gap-2 pl-6">
                                <a href="#" class="text-xs font-medium text-gray-600 hover:text-gray-800 px-3 py-1.5 border border-gray-200 rounded hover:border-gray-300 transition-colors">
                                    Top Up
                                </a>
                                <a href="#" class="text-xs font-medium text-[#ee4d2d] hover:text-[#d73211] px-3 py-1.5 border border-[#ee4d2d] rounded hover:bg-[#ee4d2d] hover:text-white transition-colors">
                                    Enable Auto Top-up
                                </a>
                            </div>
                        </div>

                        {{-- Advice Card 2 --}}
                        <div class="border border-gray-100 rounded-lg p-4">
                            <div class="flex items-start gap-2.5 mb-2">
                                <span class="flex-shrink-0 mt-0.5">
                                    <svg class="h-4 w-4 text-[#faad14]" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                                    </svg>
                                </span>
                                <h4 class="text-xs font-semibold text-gray-800 leading-snug">Campaign Surge Optimization</h4>
                            </div>
                            <p class="text-[11px] text-gray-500 leading-relaxed mb-3 pl-6">
                                Automatically optimize ROAS, budget, and bid prices to maximize sales during Campaign Days.
                            </p>
                            <div class="flex items-center gap-3 text-[11px] mb-3 pl-6">
                                <span class="text-gray-600">
                                    GMV <span class="text-[#ee4d2d] font-semibold">15%</span>
                                    <span class="text-[#ee4d2d]">📈</span>
                                </span>
                                <span class="text-gray-600">
                                    , Orders <span class="text-[#ee4d2d] font-semibold">15%</span>
                                    <span class="text-[#ee4d2d]">📈</span>
                                </span>
                            </div>
                            <div class="flex items-center gap-2 pl-6">
                                <a href="#" class="text-xs font-medium text-gray-600 hover:text-gray-800 px-3 py-1.5 border border-gray-200 rounded hover:border-gray-300 transition-colors">
                                    View Details
                                </a>
                                <a href="#" class="text-xs font-medium text-[#ee4d2d] hover:text-[#d73211] px-3 py-1.5 border border-[#ee4d2d] rounded hover:bg-[#ee4d2d] hover:text-white transition-colors">
                                    Turn On
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Announcements --}}
                <div class="rounded bg-white p-5 shadow-sm border border-gray-100">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-base font-semibold text-gray-800">Announcements</h3>
                        <a href="#" class="text-sm text-[#ee4d2d] hover:text-[#d73211] font-medium flex items-center gap-1 transition-colors">
                            More
                            <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </div>
                    <div class="space-y-3">
                        <a href="#" class="block group">
                            <div class="rounded-lg overflow-hidden border border-gray-100 hover:border-[#ee4d2d]/30 transition-colors">
                                <div class="bg-gradient-to-br from-[#ee4d2d] to-[#ff7043] p-4 text-white">
                                    <div class="flex items-center gap-2 mb-2">
                                        <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M16.5 6.5C16.5 4.01 14.49 2 12 2C9.51 2 7.5 4.01 7.5 6.5V7H5V20C5 21.1 5.9 22 7 22H17C18.1 22 19 21.1 19 20V7H16.5V6.5ZM12 4C13.38 4 14.5 5.12 14.5 6.5V7H9.5V6.5C9.5 5.12 10.62 4 12 4ZM17 20H7V9H17V20Z"/>
                                        </svg>
                                        <span class="text-xs font-semibold tracking-wide uppercase">UShop</span>
                                    </div>
                                    <p class="text-xs font-bold leading-snug">LABEL YOUR AI-GENERATED CONTENT RIGHT</p>
                                    <p class="text-[10px] opacity-80 mt-1">Heads up, sellers! If your content uses AI...</p>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="block group">
                            <div class="rounded-lg overflow-hidden border border-gray-100 hover:border-[#ee4d2d]/30 transition-colors">
                                <div class="bg-gradient-to-br from-[#f97316] to-[#facc15] p-4 text-white">
                                    <div class="flex items-center gap-2 mb-2">
                                        <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M18 8h-1V6c0-2.76-2.24-5-5-5S7 3.24 7 6v2H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2zm-6 9c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2zm3.1-9H8.9V6c0-1.71 1.39-3.1 3.1-3.1 1.71 0 3.1 1.39 3.1 3.1v2z"/>
                                        </svg>
                                        <span class="text-xs font-semibold tracking-wide uppercase">Security</span>
                                    </div>
                                    <p class="text-xs font-bold leading-snug">KEEP YOUR ACCOUNT SAFE</p>
                                    <p class="text-[10px] opacity-80 mt-1">New security updates for sellers...</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
