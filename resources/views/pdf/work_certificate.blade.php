<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Surat Keterangan Kerja - {{ $certificate->certificate_number }}</title>
    <style>
        body { font-family: 'figtree', sans-serif; line-height: 1.6; color: #333; margin: 40px; }
        .header { text-align: center; margin-bottom: 30px; border-bottom: 2px solid #333; padding-bottom: 10px; }
        .logo { height: 60px; margin-bottom: 10px; }
        .title { font-size: 20px; font-weight: bold; text-decoration: underline; margin-bottom: 5px; }
        .cert-number { font-size: 14px; margin-bottom: 20px; }
        .content { margin-bottom: 30px; text-align: justify; }
        .details table { width: 100%; margin-bottom: 20px; }
        .details td { padding: 5px 0; }
        .footer { margin-top: 50px; width: 100%; }
        .footer-table { width: 100%; }
        .signature-box { text-align: right; width: 50%; }
        .qr-box { text-align: left; width: 50%; }
        .signature-img { height: 80px; }
        .stamp-img { height: 100px; position: absolute; margin-top: -60px; margin-right: 40px; opacity: 0.8; }
    </style>
</head>
<body>
    <div class="header">
        @if($settings && $settings->company_logo)
            <img src="{{ public_path('storage/' . $settings->company_logo) }}" class="logo">
        @endif
        <div style="font-size: 18px; font-weight: bold;">{{ $settings->company_name ?? 'BUMAME' }}</div>
        <div style="font-size: 12px;">{{ $settings->company_address ?? '' }}</div>
    </div>

    <div style="text-align: center;">
        <div class="title">SURAT KETERANGAN KERJA</div>
        <div class="cert-number">Nomor: {{ $certificate->certificate_number }}</div>
    </div>

    <div class="content">
        <p>Yang bertanda tangan di bawah ini menerangkan bahwa:</p>
        <div class="details">
            <table>
                <tr><td width="150">Nama</td><td>: {{ $certificate->employee->full_name }}</td></tr>
                <tr><td>NIK</td><td>: {{ $certificate->employee->employee_id }}</td></tr>
                <tr><td>Jabatan Terakhir</td><td>: {{ $certificate->employee->position->position_name }}</td></tr>
                <tr><td>Departemen</td><td>: {{ $certificate->employee->department->department_name }}</td></tr>
            </table>
        </div>
        <p>Telah bekerja dengan baik di {{ $settings->company_name ?? 'perusahaan kami' }}. Selama masa kerjanya, yang bersangkutan telah menunjukkan dedikasi dan kontribusi yang baik bagi perusahaan.</p>
        <p>Demikian surat keterangan ini dibuat untuk dapat dipergunakan sebagaimana mestinya.</p>
    </div>

    <div class="footer">
        <table class="footer-table">
            <tr>
                <td class="qr-box">
                    <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(100)->generate(url('/verify/' . $certificate->certificate_number))) !!} ">
                    <div style="font-size: 8px; margin-top: 5px;">Scan untuk verifikasi</div>
                </td>
                <td class="signature-box">
                    <p>{{ date('d F Y', strtotime($certificate->issued_date)) }}</p>
                    <p style="margin-bottom: 60px;">HR Manager</p>

                    @if($settings && $settings->company_stamp)
                        <img src="{{ public_path('storage/' . $settings->company_stamp) }}" class="stamp-img">
                    @endif
                    @if($settings && $settings->signature_image)
                        <img src="{{ public_path('storage/' . $settings->signature_image) }}" class="signature-img">
                    @endif

                    <p style="font-weight: bold; margin-top: 10px;">{{ $settings->company_name ?? 'BUMAME' }}</p>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>
