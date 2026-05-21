<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? config('app.name') }}</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        @livewireStyles
    </head>
    <body class="bg-slate-100 font-sans text-slate-900 antialiased">
        <div>
            <!-- Header -->
            <header class="bg-white px-4 py-4 md:px-12 flex items-center justify-between shadow-sm relative z-10">
                    <div class="flex items-center space-x-4">
                        <!-- UShop Logo Placeholder -->
                        <a href="/" class="flex items-center text-[#ee4d2d]">
                            <svg viewBox="0 0 24 24" fill="currentColor" class="h-10 w-10">
                                <path d="M16.5 6.5C16.5 4.01 14.49 2 12 2C9.51 2 7.5 4.01 7.5 6.5V7H5V20C5 21.1 5.9 22 7 22H17C18.1 22 19 21.1 19 20V7H16.5V6.5ZM12 4C13.38 4 14.5 5.12 14.5 6.5V7H9.5V6.5C9.5 5.12 10.62 4 12 4ZM17 20H7V9H17V20ZM12 11C10.9 11 10 11.9 10 13C10 14.1 10.9 15 12 15C13.1 15 14 14.1 14 13C14 11.9 13.1 11 12 11Z"/>
                            </svg>
                            <span class="ml-2 text-2xl font-bold">UShop</span>
                        </a>
                        <span class="text-2xl font-medium text-gray-800 hidden md:block"> {{ $action }} </span>
                    </div>
                    <a href="#" class="text-[#ee4d2d] text-sm hover:opacity-80">Need help?</a>
                </header>
            </div>

        {{ $slot }}

        @livewireScripts
    </body>
</html>
