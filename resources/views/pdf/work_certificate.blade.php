<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Surat Keterangan Kerja - {{ $certificate->certificate_number }}</title>
    <style>
        @page { margin: 0; }
        body {
            font-family: 'Helvetica', 'Arial', sans-serif;
            line-height: 1.6;
            color: #1a202c;
            margin: 0;
            padding: 0;
            background-color: #ffffff;
        }
        .container {
            padding: 50px 70px;
            position: relative;
        }
        .border-outer {
            position: absolute;
            top: 20px;
            left: 20px;
            right: 20px;
            bottom: 20px;
            border: 1px solid #e2e8f0;
        }
        .header {
            text-align: center;
            margin-bottom: 40px;
            border-bottom: 3px double #2d3748;
            padding-bottom: 20px;
        }
        .logo {
            height: 70px;
            margin-bottom: 15px;
        }
        .company-name {
            font-size: 24px;
            font-weight: bold;
            color: #2d3748;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .company-address {
            font-size: 11px;
            color: #718096;
            margin-top: 5px;
        }
        .document-title {
            text-align: center;
            margin-bottom: 30px;
        }
        .title {
            font-size: 22px;
            font-weight: bold;
            text-decoration: underline;
            margin-bottom: 8px;
            color: #1a202c;
        }
        .cert-number {
            font-size: 13px;
            color: #4a5568;
            font-family: 'Courier', monospace;
        }
        .content {
            margin-bottom: 40px;
            text-align: justify;
            font-size: 14px;
        }
        .details-container {
            margin: 30px 0;
            padding-left: 20px;
        }
        .details-table {
            width: 100%;
        }
        .details-table td {
            padding: 8px 0;
            vertical-align: top;
        }
        .label {
            font-weight: bold;
            width: 180px;
        }
        .closing {
            margin-top: 30px;
        }
        .footer {
            margin-top: 60px;
            width: 100%;
        }
        .footer-table {
            width: 100%;
        }
        .signature-box {
            text-align: center;
            width: 50%;
            position: relative;
        }
        .qr-box {
            text-align: left;
            width: 50%;
        }
        .signature-img {
            height: 90px;
            margin: 10px 0;
        }
        .stamp-img {
            height: 120px;
            position: absolute;
            left: 50%;
            top: 50%;
            margin-left: -60px;
            margin-top: -60px;
            opacity: 0.75;
            z-index: -1;
        }
        .qr-code {
            border: 1px solid #edf2f7;
            padding: 5px;
            background: #fff;
        }
        .qr-text {
            font-size: 9px;
            color: #a0aec0;
            margin-top: 8px;
            font-style: italic;
        }
        .hr-name {
            font-weight: bold;
            text-decoration: underline;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="border-outer"></div>
    <div class="container">
        <div class="header">
            @if($settings && $settings->company_logo)
                <img src="{{ public_path('storage/' . $settings->company_logo) }}" class="logo">
            @endif
            <div class="company-name">{{ $settings->company_name ?? 'PT BUMAME FARMASI' }}</div>
            <div class="company-address">{{ $settings->company_address ?? 'Jl. TB Simatupang No. 34, Jakarta Selatan' }}</div>
        </div>

        <div class="document-title">
            <div class="title">SURAT KETERANGAN KERJA</div>
            <div class="cert-number">Nomor: {{ $certificate->certificate_number }}</div>
        </div>

        <div class="content">
            <p>Yang bertanda tangan di bawah ini, atas nama manajemen <strong>{{ $settings->company_name ?? 'BUMAME' }}</strong>, dengan ini menerangkan bahwa:</p>

            <div class="details-container">
                <table class="details-table">
                    <tr>
                        <td class="label">Nama Lengkap</td>
                        <td>: {{ $certificate->employee->full_name }}</td>
                    </tr>
                    <tr>
                        <td class="label">Nomor Induk Karyawan</td>
                        <td>: {{ $certificate->employee->employee_id }}</td>
                    </tr>
                    <tr>
                        <td class="label">Jabatan Terakhir</td>
                        <td>: {{ $certificate->employee->position->position_name }}</td>
                    </tr>
                    <tr>
                        <td class="label">Departemen</td>
                        <td>: {{ $certificate->employee->department->department_name }}</td>
                    </tr>
                </table>
            </div>

            <p>Benar telah bekerja di {{ $settings->company_name ?? 'perusahaan kami' }} terhitung sejak bergabung hingga tanggal penerbitan surat ini. Selama masa kerjanya, yang bersangkutan telah menunjukkan dedikasi, loyalitas, dan integritas yang baik dalam menjalankan tugas dan tanggung jawabnya.</p>

            <p class="closing">Kami mengucapkan terima kasih atas kontribusi yang telah diberikan selama ini dan mendoakan kesuksesan di masa yang akan datang.</p>
            <p>Demikian surat keterangan ini kami buat dengan sebenarnya untuk dapat dipergunakan sebagaimana mestinya.</p>
        </div>

        <div class="footer">
            <table class="footer-table">
                <tr>
                    <td class="qr-box">
                        <div class="qr-code">
                            <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(110)->margin(0)->generate(url('/verify/' . $certificate->certificate_number))) !!} ">
                        </div>
                        <div class="qr-text">Dokumen ini diterbitkan secara digital.<br>Scan QR Code untuk verifikasi keaslian.</div>
                    </td>
                    <td class="signature-box">
                        <p>Jakarta, {{ date('d F Y', strtotime($certificate->issued_date)) }}</p>
                        <p style="margin-bottom: 5px;">Hormat kami,</p>

                        <div style="height: 100px; display: flex; align-items: center; justify-content: center; position: relative;">
                            @if($settings && $settings->company_stamp)
                                <img src="{{ public_path('storage/' . $settings->company_stamp) }}" class="stamp-img">
                            @endif
                            @if($settings && $settings->signature_image)
                                <img src="{{ public_path('storage/' . $settings->signature_image) }}" class="signature-img">
                            @else
                                <div style="height: 80px;"></div>
                            @endif
                        </div>

                        <div class="hr-name">Human Resources Manager</div>
                        <div style="font-size: 13px; font-weight: bold;">{{ $settings->company_name ?? 'BUMAME' }}</div>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>
