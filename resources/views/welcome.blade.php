<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bumame - Paklaring System</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <link href="https://fonts.bunny.net/css?family=figtree:400,600,900&display=swap" rel="stylesheet" />
        <style>body { font-family: 'Figtree', sans-serif; }</style>
    </head>
    <body class="antialiased bg-slate-50 min-h-screen flex flex-col items-center justify-center p-6">
        <div class="max-w-4xl w-full text-center space-y-12">
            <div class="inline-flex p-4 bg-white rounded-3xl shadow-xl shadow-indigo-100 border border-slate-100">
                <x-application-logo class="w-20 h-20 text-indigo-600" />
            </div>

            <div class="space-y-4">
                <h1 class="text-5xl lg:text-7xl font-black text-slate-900 tracking-tighter uppercase">BUMAME<br><span class="text-indigo-600">PAKLARING</span></h1>
                <p class="text-xl text-slate-500 font-medium max-w-2xl mx-auto">Sistem otomasi pembuatan Surat Keterangan Kerja (Paklaring) dengan verifikasi QR Code terintegrasi.</p>
            </div>

            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                @auth
                    <a href="{{ url('/dashboard') }}" class="w-full sm:w-auto bg-indigo-600 text-white px-12 py-4 rounded-2xl font-black uppercase tracking-widest hover:bg-indigo-700 transition shadow-2xl shadow-indigo-200 transform hover:-translate-y-1">Buka Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="w-full sm:w-auto bg-indigo-600 text-white px-12 py-4 rounded-2xl font-black uppercase tracking-widest hover:bg-indigo-700 transition shadow-2xl shadow-indigo-200 transform hover:-translate-y-1">Login Admin</a>
                @endauth
                <div class="text-xs font-bold text-slate-400 uppercase tracking-widest px-4">Verifikasi v1.0</div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 pt-12">
                <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm">
                    <div class="w-10 h-10 bg-blue-50 text-blue-600 rounded-lg flex items-center justify-center mx-auto mb-4 font-bold italic">PDF</div>
                    <h3 class="font-black text-slate-800 uppercase text-xs tracking-widest mb-2">Auto PDF</h3>
                    <p class="text-slate-500 text-xs font-medium">Generate dokumen PDF siap cetak dalam hitungan detik.</p>
                </div>
                <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm">
                    <div class="w-10 h-10 bg-green-50 text-green-600 rounded-lg flex items-center justify-center mx-auto mb-4 font-bold italic">QR</div>
                    <h3 class="font-black text-slate-800 uppercase text-xs tracking-widest mb-2">QR Verified</h3>
                    <p class="text-slate-500 text-xs font-medium">Keamanan dokumen terjamin dengan verifikasi QR Code publik.</p>
                </div>
                <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm">
                    <div class="w-10 h-10 bg-purple-50 text-purple-600 rounded-lg flex items-center justify-center mx-auto mb-4 font-bold italic">RLS</div>
                    <h3 class="font-black text-slate-800 uppercase text-xs tracking-widest mb-2">Audit Trail</h3>
                    <p class="text-slate-500 text-xs font-medium">Rekam jejak setiap aktivitas admin untuk akuntabilitas tinggi.</p>
                </div>
            </div>
        </div>

        <footer class="mt-20 text-[10px] font-bold text-slate-400 uppercase tracking-[0.3em]">
            &copy; {{ date('Y') }} PT BUMAME FARMASI. All Rights Reserved.
        </footer>
    </body>
</html>
