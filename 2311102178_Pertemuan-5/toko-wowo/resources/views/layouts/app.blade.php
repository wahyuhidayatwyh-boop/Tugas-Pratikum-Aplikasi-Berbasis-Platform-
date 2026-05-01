<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Toko Wowo') }} — Panel Admin</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            body { font-family: 'Inter', sans-serif; }
        </style>
    </head>
    <body class="font-sans antialiased bg-slate-100">

        {{-- Sidebar + Top Navbar Layout --}}
        <div class="min-h-screen flex flex-col">

            {{-- Top Navbar --}}
            @include('layouts.navigation')

            {{-- Page Heading --}}
            @isset($header)
                <div class="bg-white border-b border-gray-200 mt-16">
                    <div class="max-w-7xl mx-auto py-5 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </div>
            @endisset

            {{-- Main Content --}}
            <main class="flex-1 mt-16 {{ isset($header) ? 'mt-0' : '' }}">
                {{ $slot }}
            </main>

            {{-- Footer --}}
            <footer class="mt-auto py-4 text-center text-xs text-gray-400 border-t border-gray-200 bg-white">
                © {{ date('Y') }} <span class="font-semibold text-indigo-600">Toko Wowo</span> — Sistem Manajemen Produk
            </footer>
        </div>

    </body>
</html>
