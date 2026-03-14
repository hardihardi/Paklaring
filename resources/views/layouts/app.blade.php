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
            <!-- Topbar Desktop -->
            <header class="hidden lg:flex bg-white border-b border-slate-200 sticky top-0 z-20 h-16 items-center px-8 justify-between">
                <div class="flex items-center gap-4 flex-1">
                    <div class="relative w-96 group">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-slate-400 group-focus-within:text-indigo-500 transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                        </span>
                        <input type="text" placeholder="Global Search..." class="w-full pl-10 pr-4 py-2 text-xs font-bold uppercase tracking-widest border-transparent focus:border-transparent focus:ring-0 bg-slate-50 rounded-lg">
                    </div>
                </div>
                <div class="flex items-center gap-6 text-slate-400">
                    <button class="hover:text-indigo-600 transition-colors relative">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/></svg>
                        <span class="absolute top-0 right-0 w-2 h-2 bg-red-500 rounded-full border-2 border-white"></span>
                    </button>
                    <div class="w-px h-6 bg-slate-200"></div>
                    <div class="flex items-center gap-2">
                         <span class="text-xs font-black uppercase tracking-tighter text-slate-800">{{ auth()->user()->name }}</span>
                         <div class="w-8 h-8 rounded-lg bg-indigo-600 text-white flex items-center justify-center text-xs font-bold">{{ substr(auth()->user()->name, 0, 1) }}</div>
                    </div>
                </div>
            </header>

            <!-- Page Heading Mobile -->
            @if (isset($header))
                <div class="lg:hidden bg-white border-b border-slate-200 py-4 px-6 flex justify-between items-center">
                    <h2 class="font-black text-lg text-slate-800 uppercase tracking-tighter">{{ $header }}</h2>
                    <x-application-logo class="h-6 w-auto fill-current text-indigo-600" />
                </div>
            @endif

            <!-- Page Content -->
            <main class="flex-1 overflow-x-hidden">
                <div class="max-w-7xl mx-auto p-4 sm:p-6 lg:p-8 mb-24 lg:mb-0">
                    {{ $slot }}
                </div>
            </main>
        </div>
    </body>
</html>
