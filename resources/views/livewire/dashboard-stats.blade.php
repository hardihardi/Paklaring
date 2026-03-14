<?php

use Livewire\Volt\Component;
use App\Models\Employee;
use App\Models\WorkCertificate;
use App\Models\ActivityLog;

new class extends Component {
    public function with()
    {
        return [
            'totalEmployees' => Employee::count(),
            'totalCertificates' => WorkCertificate::count(),
            'certsThisMonth' => WorkCertificate::whereMonth('issued_date', now()->month)
                                ->whereYear('issued_date', now()->year)
                                ->count(),
            'recentLogs' => ActivityLog::with('user')->latest()->take(6)->get(),
        ];
    }
}; ?>

<div class="space-y-10">
    <!-- Welcome Header -->
    <div class="relative overflow-hidden bg-indigo-600 rounded-3xl p-8 lg:p-12 text-white shadow-2xl shadow-indigo-100">
        <div class="relative z-10">
            <h1 class="text-3xl lg:text-4xl font-black tracking-tight mb-2 uppercase">Selamat Datang, {{ auth()->user()->name }}!</h1>
            <p class="text-indigo-100 font-medium text-lg max-w-xl">Kelola data karyawan dan terbitkan surat keterangan kerja dengan cepat, aman, dan profesional.</p>
            <div class="mt-8 flex gap-4 flex-wrap">
                <a href="{{ route('paklaring') }}" class="bg-white text-indigo-600 px-8 py-3 rounded-xl font-black uppercase tracking-widest text-sm shadow-xl hover:bg-indigo-50 transition transform hover:-translate-y-1">Mulai Generate</a>
                <a href="{{ route('employees') }}" class="bg-indigo-500 text-white px-8 py-3 rounded-xl font-black uppercase tracking-widest text-sm border border-indigo-400 hover:bg-indigo-400 transition">Data Karyawan</a>
            </div>
        </div>
        <!-- Decorative SVG -->
        <svg class="absolute right-[-10%] top-[-20%] w-2/3 h-[140%] text-indigo-500/20" fill="currentColor" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
            <path d="M44.7,-76.4C58.1,-69.2,69.2,-58.1,76.4,-44.7C83.6,-31.3,86.9,-15.7,86.9,0C86.9,15.7,83.6,31.3,76.4,44.7C69.2,58.1,58.1,69.2,44.7,76.4C31.3,83.6,15.7,86.9,0,86.9C-15.7,86.9,-31.3,83.6,-44.7,76.4C-58.1,69.2,-69.2,58.1,-76.4,44.7C-83.6,31.3,-86.9,15.7,-86.9,0C-86.9,-15.7,-83.6,-31.3,-76.4,-44.7C-69.2,-58.1,-58.1,-69.2,-44.7,-76.4C-31.3,-83.6,-15.7,-86.9,0,-86.9C15.7,-86.9,31.3,-83.6,44.7,-76.4Z" transform="translate(100 100)" />
        </svg>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Stat Card 1 -->
        <div class="group bg-white p-6 rounded-3xl shadow-sm border border-slate-100 hover:shadow-xl hover:shadow-indigo-100/50 transition-all duration-300 transform hover:-translate-y-1">
            <div class="flex items-center justify-between mb-4">
                <div class="p-3 rounded-2xl bg-blue-50 text-blue-600 group-hover:bg-blue-600 group-hover:text-white transition-colors duration-300">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                </div>
                <span class="text-[9px] font-black uppercase tracking-[0.2em] text-slate-400">Total Karyawan</span>
            </div>
            <p class="text-3xl font-black text-slate-800">{{ $totalEmployees }}</p>
        </div>

        <!-- Stat Card 2 -->
        <div class="group bg-white p-6 rounded-3xl shadow-sm border border-slate-100 hover:shadow-xl hover:shadow-indigo-100/50 transition-all duration-300 transform hover:-translate-y-1">
            <div class="flex items-center justify-between mb-4">
                <div class="p-3 rounded-2xl bg-green-50 text-green-600 group-hover:bg-green-600 group-hover:text-white transition-colors duration-300">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                </div>
                <span class="text-[9px] font-black uppercase tracking-[0.2em] text-slate-400">Total Paklaring</span>
            </div>
            <p class="text-3xl font-black text-slate-800">{{ $totalCertificates }}</p>
        </div>

        <!-- Stat Card 3 -->
        <div class="group bg-white p-6 rounded-3xl shadow-sm border border-slate-100 hover:shadow-xl hover:shadow-indigo-100/50 transition-all duration-300 transform hover:-translate-y-1">
            <div class="flex items-center justify-between mb-4">
                <div class="p-3 rounded-2xl bg-orange-50 text-orange-600 group-hover:bg-orange-600 group-hover:text-white transition-colors duration-300">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                </div>
                <span class="text-[9px] font-black uppercase tracking-[0.2em] text-slate-400">Bulan Ini</span>
            </div>
            <p class="text-3xl font-black text-slate-800">{{ $certsThisMonth }}</p>
        </div>

        <!-- Stat Card 4 -->
        <div class="group bg-white p-6 rounded-3xl shadow-sm border border-slate-100 hover:shadow-xl hover:shadow-indigo-100/50 transition-all duration-300 transform hover:-translate-y-1">
            <div class="flex items-center justify-between mb-4">
                <div class="p-3 rounded-2xl bg-purple-50 text-purple-600 group-hover:bg-purple-600 group-hover:text-white transition-colors duration-300">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <span class="text-[9px] font-black uppercase tracking-[0.2em] text-slate-400">Audit Trail</span>
            </div>
            <p class="text-3xl font-black text-slate-800">{{ $recentLogs->count() }}</p>
        </div>
    </div>

    <!-- Recent Activity Table -->
    <div class="bg-white rounded-3xl shadow-sm border border-slate-100 overflow-hidden">
        <div class="p-8 border-b border-slate-50 flex justify-between items-center">
            <div>
                <h3 class="text-xl font-black text-slate-800 uppercase tracking-tight">Audit Trail Terkini</h3>
                <p class="text-sm text-slate-500">Aktivitas terakhir yang dilakukan oleh tim HR</p>
            </div>
            <a href="{{ route('activity-logs') }}" class="bg-slate-100 text-slate-600 px-6 py-2.5 rounded-xl font-black uppercase tracking-widest text-[10px] hover:bg-indigo-600 hover:text-white transition duration-200">Selengkapnya</a>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <tbody class="divide-y divide-slate-50">
                    @forelse($recentLogs as $log)
                        <tr class="hover:bg-slate-50 transition group">
                            <td class="px-8 py-5">
                                <div class="flex items-center gap-4">
                                    <div class="w-10 h-10 rounded-full bg-indigo-50 flex items-center justify-center text-indigo-600 group-hover:bg-indigo-600 group-hover:text-white transition-all duration-200 font-bold uppercase text-xs">
                                        {{ substr($log->user->name, 0, 1) }}
                                    </div>
                                    <div>
                                        <p class="text-sm font-black text-slate-800">{{ $log->activity }}</p>
                                        <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Oleh: {{ $log->user->name }} • {{ $log->ip_address }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-8 py-5 text-right whitespace-nowrap">
                                <span class="text-xs font-bold text-slate-500 bg-slate-100 px-4 py-2 rounded-full">{{ $log->created_at->diffForHumans() }}</span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="px-8 py-16 text-center text-slate-400 italic font-medium uppercase tracking-widest text-xs">Belum ada rekaman aktivitas.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
