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
    <nav class="hidden lg:flex flex-col w-64 bg-white border-r border-gray-200 h-screen fixed left-0 top-0 z-10">
        <div class="p-6">
            <x-application-logo class="block h-9 w-auto fill-current text-indigo-600" />
            <h1 class="mt-2 text-xl font-bold text-gray-800">Paklaring System</h1>
        </div>

        <div class="flex-1 px-4 space-y-2 mt-4">
            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="block px-4 py-2 rounded-md transition hover:bg-gray-100">
                {{ __('Dashboard') }}
            </x-nav-link>
            <x-nav-link :href="route('departments')" :active="request()->routeIs('departments')" class="block px-4 py-2 rounded-md transition hover:bg-gray-100">
                {{ __('Departemen') }}
            </x-nav-link>
            <x-nav-link :href="route('positions')" :active="request()->routeIs('positions')" class="block px-4 py-2 rounded-md transition hover:bg-gray-100">
                {{ __('Jabatan') }}
            </x-nav-link>
            <x-nav-link :href="route('employees')" :active="request()->routeIs('employees')" class="block px-4 py-2 rounded-md transition hover:bg-gray-100">
                {{ __('Karyawan') }}
            </x-nav-link>
            <x-nav-link :href="route('paklaring')" :active="request()->routeIs('paklaring')" class="block px-4 py-2 rounded-md transition hover:bg-gray-100">
                {{ __('Paklaring') }}
            </x-nav-link>
            <x-nav-link :href="route('settings')" :active="request()->routeIs('settings')" class="block px-4 py-2 rounded-md transition hover:bg-gray-100">
                {{ __('Pengaturan') }}
            </x-nav-link>
        </div>

        <div class="p-4 border-t border-gray-100">
            <button wire:click="logout" class="w-full flex items-center px-4 py-2 text-sm text-red-600 hover:bg-red-50 rounded-md transition">
                <span>{{ __('Log Out') }}</span>
            </button>
        </div>
    </nav>

    <!-- Mobile Bottom Navigation -->
    <nav class="lg:hidden fixed bottom-0 left-0 right-0 bg-white border-t border-gray-200 z-50 flex justify-around items-center h-16 px-2 pb-safe">
        <a href="{{ route('dashboard') }}" class="flex flex-col items-center justify-center flex-1 {{ request()->routeIs('dashboard') ? 'text-indigo-600' : 'text-gray-500' }}">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
            <span class="text-[10px] mt-1">Home</span>
        </a>
        <a href="{{ route('employees') }}" class="flex flex-col items-center justify-center flex-1 {{ request()->routeIs('employees') ? 'text-indigo-600' : 'text-gray-500' }}">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
            <span class="text-[10px] mt-1">Staff</span>
        </a>
        <a href="{{ route('paklaring') }}" class="flex flex-col items-center justify-center flex-1 {{ request()->routeIs('paklaring') ? 'text-indigo-600' : 'text-gray-500' }}">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
            <span class="text-[10px] mt-1">Certs</span>
        </a>
        <a href="{{ route('settings') }}" class="flex flex-col items-center justify-center flex-1 {{ request()->routeIs('settings') ? 'text-indigo-600' : 'text-gray-500' }}">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
            <span class="text-[10px] mt-1">Config</span>
        </a>
    </nav>

    <!-- Adjust Main Content Layout for Sidebar on Desktop -->
    <style>
        @media (min-width: 1024px) {
            body { padding-left: 16rem; }
        }
        @media (max-width: 1023px) {
            body { padding-bottom: 4rem; }
        }
    </style>
</div>
