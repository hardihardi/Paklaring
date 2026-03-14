<?php

use App\Livewire\Actions\Logout;
use Livewire\Volt\Component;

new class extends Component
{
    public function logout(Logout $logout): void
    {
        $logout();
        $this->redirect('/', navigate: true);
    }
}; ?>

<div>
    <!-- Desktop Sidebar -->
    <nav class="hidden lg:flex flex-col w-72 bg-white border-r border-slate-200 h-screen fixed left-0 top-0 z-30 shadow-xl shadow-slate-100">
        <div class="p-8">
            <div class="flex items-center gap-3">
                <div class="p-2 bg-indigo-600 rounded-lg shadow-lg shadow-indigo-200">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                </div>
                <div>
                    <h1 class="text-lg font-black text-slate-800 tracking-tight leading-none uppercase">Bumame</h1>
                    <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">HR System</span>
                </div>
            </div>
        </div>

        <div class="flex-1 px-4 space-y-1.5 overflow-y-auto">
            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="flex items-center px-4 py-3 rounded-xl transition duration-200 group">
                 <span class="font-semibold">{{ __('Dashboard') }}</span>
            </x-nav-link>

            <div class="pt-4 pb-2 px-4">
                <span class="text-[10px] font-bold text-slate-400 uppercase tracking-[0.2em]">Master Data</span>
            </div>

            <x-nav-link :href="route('departments')" :active="request()->routeIs('departments')" class="flex items-center px-4 py-3 rounded-xl transition duration-200 group">
                <span class="font-semibold">{{ __('Departemen') }}</span>
            </x-nav-link>
            <x-nav-link :href="route('positions')" :active="request()->routeIs('positions')" class="flex items-center px-4 py-3 rounded-xl transition duration-200 group">
                <span class="font-semibold">{{ __('Jabatan') }}</span>
            </x-nav-link>
            <x-nav-link :href="route('employees')" :active="request()->routeIs('employees')" class="flex items-center px-4 py-3 rounded-xl transition duration-200 group">
                <span class="font-semibold">{{ __('Karyawan') }}</span>
            </x-nav-link>

            <div class="pt-4 pb-2 px-4">
                <span class="text-[10px] font-bold text-slate-400 uppercase tracking-[0.2em]">Dokumen</span>
            </div>

            <x-nav-link :href="route('paklaring')" :active="request()->routeIs('paklaring')" class="flex items-center px-4 py-3 rounded-xl transition duration-200 group text-indigo-600">
                <span class="font-bold">{{ __('Generate Paklaring') }}</span>
            </x-nav-link>

            <div class="pt-4 pb-2 px-4">
                <span class="text-[10px] font-bold text-slate-400 uppercase tracking-[0.2em]">Sistem</span>
            </div>

            <x-nav-link :href="route('users')" :active="request()->routeIs('users')" class="flex items-center px-4 py-3 rounded-xl transition duration-200 group">
                <span class="font-semibold">{{ __('Manajemen User') }}</span>
            </x-nav-link>
            <x-nav-link :href="route('settings')" :active="request()->routeIs('settings')" class="flex items-center px-4 py-3 rounded-xl transition duration-200 group">
                <span class="font-semibold">{{ __('Pengaturan') }}</span>
            </x-nav-link>
            <x-nav-link :href="route('activity-logs')" :active="request()->routeIs('activity-logs')" class="flex items-center px-4 py-3 rounded-xl transition duration-200 group">
                <span class="font-semibold">{{ __('Audit Log') }}</span>
            </x-nav-link>
        </div>

        <div class="p-6 bg-slate-50 border-t border-slate-100">
            <div class="flex items-center gap-3 mb-4">
                <div class="w-10 h-10 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-700 font-bold">
                    {{ substr(auth()->user()->name, 0, 1) }}
                </div>
                <div class="flex-1 overflow-hidden">
                    <p class="text-sm font-bold text-slate-800 truncate">{{ auth()->user()->name }}</p>
                    <p class="text-[10px] text-slate-500 truncate">{{ auth()->user()->email }}</p>
                </div>
            </div>
            <button wire:click="logout" class="w-full flex items-center justify-center gap-2 px-4 py-2.5 text-xs font-bold text-red-600 bg-red-50 hover:bg-red-100 rounded-lg transition-colors duration-200 uppercase tracking-widest">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                <span>{{ __('Keluar') }}</span>
            </button>
        </div>
    </nav>

    <!-- Mobile Bottom Navigation -->
    <nav class="lg:hidden fixed bottom-0 left-0 right-0 bg-white border-t border-slate-200 z-50 flex justify-around items-center h-20 px-2 pb-safe shadow-[0_-10px_20px_rgba(0,0,0,0.02)]">
        <a href="{{ route('dashboard') }}" class="flex flex-col items-center justify-center flex-1 transition-all duration-200 {{ request()->routeIs('dashboard') ? 'text-indigo-600 scale-110' : 'text-slate-400' }}">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
            <span class="text-[9px] font-bold mt-1 uppercase tracking-wider">Home</span>
        </a>
        <a href="{{ route('employees') }}" class="flex flex-col items-center justify-center flex-1 transition-all duration-200 {{ request()->routeIs('employees') ? 'text-indigo-600 scale-110' : 'text-slate-400' }}">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
            <span class="text-[9px] font-bold mt-1 uppercase tracking-wider">Staff</span>
        </a>
        <a href="{{ route('paklaring') }}" class="relative -top-4 flex flex-col items-center justify-center flex-1">
            <div class="p-4 bg-indigo-600 rounded-full shadow-lg shadow-indigo-200 text-white transform active:scale-90 transition-transform">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/></svg>
            </div>
            <span class="text-[9px] font-bold mt-2 text-indigo-600 uppercase tracking-wider">Paklaring</span>
        </a>
        <a href="{{ route('users') }}" class="flex flex-col items-center justify-center flex-1 transition-all duration-200 {{ request()->routeIs('users') ? 'text-indigo-600 scale-110' : 'text-slate-400' }}">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
            <span class="text-[9px] font-bold mt-1 uppercase tracking-wider">Users</span>
        </a>
        <a href="{{ route('settings') }}" class="flex flex-col items-center justify-center flex-1 transition-all duration-200 {{ request()->routeIs('settings') ? 'text-indigo-600 scale-110' : 'text-slate-400' }}">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
            <span class="text-[9px] font-bold mt-1 uppercase tracking-wider">Config</span>
        </a>
    </nav>

    <!-- Global Layout Adjustments -->
    <style>
        @media (min-width: 1024px) {
            body { padding-left: 18rem; }
        }
        @media (max-width: 1023px) {
            body { padding-bottom: 5rem; }
        }
        .pb-safe {
            padding-bottom: env(safe-area-inset-bottom);
        }
    </style>
</div>
