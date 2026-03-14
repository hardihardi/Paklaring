<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased text-gray-900 bg-slate-50 min-h-screen">
        <livewire:layout.navigation />

        <div class="min-h-screen flex flex-col transition-all duration-300">
            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white border-b border-slate-200 sticky top-0 z-20">
                    <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8 flex justify-between items-center">
                        <div>{{ $header }}</div>
                        <div class="text-xs text-slate-400 hidden sm:block">Bumame Paklaring System v1.0</div>
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main class="flex-1 overflow-x-hidden">
                <div class="max-w-7xl mx-auto p-4 sm:p-6 lg:p-8 mb-20 lg:mb-0">
                    {{ $slot }}
                </div>
            </main>
        </div>
    </body>
</html>
