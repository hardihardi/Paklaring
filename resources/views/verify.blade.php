<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Paklaring - Bumame</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen p-4">
    <div class="bg-white rounded-lg shadow-xl p-8 max-w-md w-full">
        <div class="text-center mb-6">
            <h1 class="text-2xl font-bold text-indigo-600">Verifikasi Dokumen</h1>
            <p class="text-gray-500">Sistem Validasi Paklaring Bumame</p>
        </div>

        @if($certificate)
            <div class="bg-green-50 border-l-4 border-green-400 p-4 mb-6">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm text-green-700 font-bold">Dokumen Valid</p>
                    </div>
                </div>
            </div>

            <div class="space-y-4">
                <div>
                    <label class="block text-xs font-semibold text-gray-400 uppercase">Nama Karyawan</label>
                    <p class="text-gray-800 font-medium">{{ $certificate->employee->full_name }}</p>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-gray-400 uppercase">NIK</label>
                    <p class="text-gray-800 font-medium">{{ $certificate->employee->employee_id }}</p>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-gray-400 uppercase">Jabatan Terakhir</label>
                    <p class="text-gray-800 font-medium">{{ $certificate->employee->position->position_name }}</p>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-gray-400 uppercase">Nomor Surat</label>
                    <p class="text-gray-800 font-medium">{{ $certificate->certificate_number }}</p>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-gray-400 uppercase">Tanggal Terbit</label>
                    <p class="text-gray-800 font-medium">{{ date('d F Y', strtotime($certificate->issued_date)) }}</p>
                </div>
            </div>
        @else
            <div class="bg-red-50 border-l-4 border-red-400 p-4 mb-6 text-center">
                <p class="text-red-700 font-bold uppercase tracking-wide">Dokumen Tidak Ditemukan</p>
                <p class="text-red-600 text-sm mt-1">Nomor surat yang Anda masukkan tidak terdaftar dalam sistem kami.</p>
            </div>
        @endif

        <div class="mt-8 pt-6 border-t border-gray-100 text-center text-xs text-gray-400">
            &copy; {{ date('Y') }} Bumame. Hak Cipta Dilindungi.
        </div>
    </div>
</body>
</html>
