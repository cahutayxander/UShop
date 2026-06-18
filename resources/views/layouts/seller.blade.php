<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'Seller Centre - ' . config('app.name') }}</title>
        <meta name="description" content="UShop Seller Centre — Manage your shop, orders, and products.">

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        @livewireStyles
    </head>
    <body class="bg-[#f5f5f5] font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col">
            {{-- Seller Centre Header --}}
            <header class="bg-white border-b border-gray-200 px-4 md:px-6 py-2.5 flex items-center justify-between shadow-sm relative z-20 sticky top-0">
                <div class="flex items-center space-x-3">
                    {{-- UShop Logo --}}
                    <a href="/" class="flex items-center text-[#ee4d2d]">
                        <svg viewBox="0 0 24 24" fill="currentColor" class="h-8 w-8">
                            <path d="M16.5 6.5C16.5 4.01 14.49 2 12 2C9.51 2 7.5 4.01 7.5 6.5V7H5V20C5 21.1 5.9 22 7 22H17C18.1 22 19 21.1 19 20V7H16.5V6.5ZM12 4C13.38 4 14.5 5.12 14.5 6.5V7H9.5V6.5C9.5 5.12 10.62 4 12 4ZM17 20H7V9H17V20ZM12 11C10.9 11 10 11.9 10 13C10 14.1 10.9 15 12 15C13.1 15 14 14.1 14 13C14 11.9 13.1 11 12 11Z"/>
                        </svg>
                        <span class="ml-1.5 text-xl font-bold tracking-tight">UShop</span>
                    </a>
                    <span class="text-base font-medium text-gray-600 hidden md:block">Seller Centre</span>
                </div>

                <div class="flex items-center gap-4">
                    {{-- Grid icon --}}
                    <button class="text-gray-400 hover:text-gray-600 transition-colors" aria-label="Apps">
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M4 8h4V4H4v4zm6 12h4v-4h-4v4zm-6 0h4v-4H4v4zm0-6h4v-4H4v4zm6 0h4v-4h-4v4zm6-10v4h4V4h-4zm-6 4h4V4h-4v4zm6 6h4v-4h-4v4zm0 6h4v-4h-4v4z"/>
                        </svg>
                    </button>
                    {{-- Split view icon --}}
                    <button class="text-gray-400 hover:text-gray-600 transition-colors" aria-label="Split View">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <rect x="3" y="3" width="18" height="18" rx="2"/>
                            <line x1="12" y1="3" x2="12" y2="21"/>
                        </svg>
                    </button>
                    {{-- User Profile --}}
                    <div class="flex items-center gap-2 cursor-pointer group">
                        <div class="h-8 w-8 rounded-full bg-[#feeee7] border border-[#ee4d2d]/30 flex items-center justify-center overflow-hidden">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="h-5 w-5 text-[#ee4d2d]">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                            </svg>
                        </div>
                        <span class="text-sm text-gray-700 group-hover:text-[#ee4d2d] transition-colors hidden md:block">{{ auth()->user()->email ?? 'Seller' }}</span>
                        <svg class="h-3.5 w-3.5 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </div>

                     <livewire:account.auth-header />
                </div>
            </header>

            {{-- Main Body --}}
            <div class="flex flex-1">
                {{-- Left Sidebar --}}
                <aside class="hidden md:flex flex-col w-[180px] flex-shrink-0 bg-white border-r border-gray-100 py-4 overflow-y-auto sticky top-[53px] h-[calc(100vh-53px)]">
                    {{-- Order Section --}}
                    <div class="px-4 mb-1">
                        <button class="flex items-center justify-between w-full text-xs font-semibold text-gray-500 uppercase tracking-wider py-2 hover:text-gray-700 transition-colors" aria-label="Toggle Order section">
                            <span>Order</span>
                            <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                    </div>
                    <nav class="px-2 mb-3">
                        <a href="#" class="block px-3 py-1.5 text-[13px] text-gray-600 hover:text-[#ee4d2d] hover:bg-[#fff5f2] rounded transition-colors">My Orders</a>
                        <a href="#" class="block px-3 py-1.5 text-[13px] text-gray-600 hover:text-[#ee4d2d] hover:bg-[#fff5f2] rounded transition-colors">Mass Ship</a>
                        <a href="#" class="block px-3 py-1.5 text-[13px] text-gray-600 hover:text-[#ee4d2d] hover:bg-[#fff5f2] rounded transition-colors">Handover Centre</a>
                        <a href="#" class="block px-3 py-1.5 text-[13px] text-gray-600 hover:text-[#ee4d2d] hover:bg-[#fff5f2] rounded transition-colors">Return/Refund/Cancel</a>
                        <a href="#" class="block px-3 py-1.5 text-[13px] text-gray-600 hover:text-[#ee4d2d] hover:bg-[#fff5f2] rounded transition-colors">Shipping Setting</a>
                    </nav>

                    {{-- Product Section --}}
                    <div class="px-4 mb-1">
                        <button class="flex items-center justify-between w-full text-xs font-semibold text-gray-500 uppercase tracking-wider py-2 hover:text-gray-700 transition-colors" aria-label="Toggle Product section">
                            <span>Product</span>
                            <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                    </div>
                    <nav class="px-2 mb-3">
                        <a href="/seller/products" wire:navigate class="block px-3 py-1.5 text-[13px] text-gray-600 hover:text-[#ee4d2d] hover:bg-[#fff5f2] rounded transition-colors">My Products</a>
                        <a href="/seller/products/add" wire:navigate class="block px-3 py-1.5 text-[13px] text-gray-600 hover:text-[#ee4d2d] hover:bg-[#fff5f2] rounded transition-colors">Add New Product</a>
                        <a href="#" class="block px-3 py-1.5 text-[13px] text-gray-600 hover:text-[#ee4d2d] hover:bg-[#fff5f2] rounded transition-colors">Shopee Standard Product</a>
                        <a href="#" class="block px-3 py-1.5 text-[13px] text-gray-600 hover:text-[#ee4d2d] hover:bg-[#fff5f2] rounded transition-colors">AI Optimiser</a>
                    </nav>

                    <!-- {{-- FBS Section --}}
                    <div class="px-4 mb-1">
                        <button class="flex items-center justify-between w-full text-xs font-semibold text-gray-500 uppercase tracking-wider py-2 hover:text-gray-700 transition-colors" aria-label="Toggle FBS section">
                            <span>FBS</span>
                            <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                    </div>
                    <nav class="px-2 mb-3">
                        <a href="#" class="block px-3 py-1.5 text-[13px] text-gray-600 hover:text-[#ee4d2d] hover:bg-[#fff5f2] rounded transition-colors">Fulfilled by Shopee</a>
                    </nav>

                    {{-- Marketing Centre Section --}}
                    <div class="px-4 mb-1">
                        <button class="flex items-center justify-between w-full text-xs font-semibold text-gray-500 uppercase tracking-wider py-2 hover:text-gray-700 transition-colors" aria-label="Toggle Marketing Centre section">
                            <span>Marketing Centre</span>
                            <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                    </div>
                    <nav class="px-2 mb-3">
                        <a href="#" class="block px-3 py-1.5 text-[13px] text-gray-600 hover:text-[#ee4d2d] hover:bg-[#fff5f2] rounded transition-colors">Marketing Centre</a>
                        <a href="#" class="block px-3 py-1.5 text-[13px] text-gray-600 hover:text-[#ee4d2d] hover:bg-[#fff5f2] rounded transition-colors">Shopee Ads</a>
                        <a href="#" class="block px-3 py-1.5 text-[13px] text-gray-600 hover:text-[#ee4d2d] hover:bg-[#fff5f2] rounded transition-colors">Affiliate Marketing</a>
                        <a href="#" class="block px-3 py-1.5 text-[13px] text-gray-600 hover:text-[#ee4d2d] hover:bg-[#fff5f2] rounded transition-colors">Live & Video</a>
                        <a href="#" class="block px-3 py-1.5 text-[13px] text-gray-600 hover:text-[#ee4d2d] hover:bg-[#fff5f2] rounded transition-colors">Discount</a>
                        <a href="#" class="block px-3 py-1.5 text-[13px] text-gray-600 hover:text-[#ee4d2d] hover:bg-[#fff5f2] rounded transition-colors">My Shop's Flash Deals</a>
                        <a href="#" class="block px-3 py-1.5 text-[13px] text-gray-600 hover:text-[#ee4d2d] hover:bg-[#fff5f2] rounded transition-colors">Vouchers</a>
                    </nav> -->
                </aside>

                {{-- Main Content Area --}}
                <main class="flex-1 min-w-0">
                    {{ $slot }}
                </main>
            </div>

            {{-- Right Utility Rail (Quick Actions) --}}
            <aside class="pointer-events-none fixed right-3 top-1/2 z-20 hidden -translate-y-1/2 flex-col items-center gap-3 lg:pointer-events-auto lg:flex" aria-label="Quick actions">
                {{-- Profile Link --}}
                <button type="button" class="pointer-events-auto h-10 w-10 rounded-full bg-white border border-gray-200 shadow-md transition hover:shadow-lg flex items-center justify-center overflow-hidden p-0.5" aria-label="Account">
                    <div class="h-full w-full rounded-full overflow-hidden border border-[#ee4d2d]">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="h-full w-full text-[#ee4d2d] bg-[#feeee7]">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                        </svg>
                    </div>
                </button>

                {{-- Notification Icon --}}
                <button type="button" class="pointer-events-auto h-10 w-10 rounded-full bg-[#ee4d2d] shadow-md transition hover:shadow-lg hover:bg-[#d73211] flex items-center justify-center text-white" aria-label="Notifications">
                    <svg viewBox="0 0 24 24" fill="none" class="h-5 w-5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9M13.73 21a2 2 0 0 1-3.46 0" />
                    </svg>
                </button>

                {{-- Chat Icon --}}
                <button type="button" class="pointer-events-auto h-10 w-10 rounded-full bg-white border border-gray-200 shadow-md transition hover:shadow-lg flex items-center justify-center text-[#ee4d2d] hover:text-[#d73211]" aria-label="Chat">
                    <svg viewBox="0 0 24 24" fill="none" class="h-5 w-5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 0 1-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8Z" />
                    </svg>
                </button>
            </aside>
        </div>

        @livewireScripts
    </body>
</html>
