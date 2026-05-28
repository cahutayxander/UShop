<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? config('app.name') }}</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        @livewireStyles
    </head>
    <body class="bg-[#f5f5f5] font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col">
            <!-- Header -->
            <header class="bg-white border-b border-gray-200 px-6 py-3.5 md:px-12 flex items-center justify-between shadow-sm relative z-10">
                <div class="flex items-center space-x-4">
                    <!-- UShop Logo -->
                    <a href="/" class="flex items-center text-[#ee4d2d]">
                        <svg viewBox="0 0 24 24" fill="currentColor" class="h-9 w-9">
                            <path d="M16.5 6.5C16.5 4.01 14.49 2 12 2C9.51 2 7.5 4.01 7.5 6.5V7H5V20C5 21.1 5.9 22 7 22H17C18.1 22 19 21.1 19 20V7H16.5V6.5ZM12 4C13.38 4 14.5 5.12 14.5 6.5V7H9.5V6.5C9.5 5.12 10.62 4 12 4ZM17 20H7V9H17V20ZM12 11C10.9 11 10 11.9 10 13C10 14.1 10.9 15 12 15C13.1 15 14 14.1 14 13C14 11.9 13.1 11 12 11Z"/>
                        </svg>
                        <span class="ml-2 text-2xl font-bold tracking-tight">UShop</span>
                    </a>
                </div>
                
                <livewire:account.auth-header />
            </header>

            <!-- Main Content -->
            <main class="flex justify-center px-4 py-12 sm:px-6 lg:px-8 relative">
                {{ $slot }}
            </main>
            

            <!-- Right Utility Rail (Quick Actions) -->
            <aside class="pointer-events-none fixed right-4 top-1/2 z-20 hidden -translate-y-1/2 flex-col items-center gap-4 lg:pointer-events-auto lg:flex" aria-label="Quick actions">
                <!-- Profile Link -->
                <button type="button" class="pointer-events-auto h-11 w-11 rounded-full bg-white border border-gray-200 shadow-md transition hover:shadow-lg flex items-center justify-center overflow-hidden p-0.5" aria-label="Account">
                    <div class="h-full w-full rounded-full overflow-hidden border border-[#ee4d2d]">
                        <!-- Profile Avatar placeholder SVG matching the girl image stylistically -->
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="h-full w-full text-[#ee4d2d] bg-[#feeee7]">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                        </svg>
                    </div>
                </button>
                
                <!-- Notification Icon -->
                <button type="button" class="pointer-events-auto h-11 w-11 rounded-full bg-white border border-gray-200 shadow-md transition hover:shadow-lg flex items-center justify-center text-[#ee4d2d] hover:text-[#d73211]" aria-label="Notifications">
                    <svg viewBox="0 0 24 24" fill="none" class="h-5 w-5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9M13.73 21a2 2 0 0 1-3.46 0" />
                    </svg>
                </button>
                
                <!-- Chat Icon -->
                <button type="button" class="pointer-events-auto h-11 w-11 rounded-full bg-white border border-gray-200 shadow-md transition hover:shadow-lg flex items-center justify-center text-[#ee4d2d] hover:text-[#d73211]" aria-label="Chat">
                    <svg viewBox="0 0 24 24" fill="none" class="h-5 w-5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 0 1-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8Z" />
                    </svg>
                </button>
            </aside>
        </div>

        @livewireScripts
    </body>
</html>
