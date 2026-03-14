<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Surat Keterangan Kerja - {{ $certificate->certificate_number }}</title>
    <style>
        @page { margin: 0; }
        body {
            font-family: 'Helvetica', 'Arial', sans-serif;
            line-height: 1.8;
            color: #1a202c;
            margin: 0;
            padding: 0;
            background-color: #ffffff;
        }
        .container {
            padding: 40px 60px;
            position: relative;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #2d3748;
            padding-bottom: 15px;
        }
        .logo {
            height: 60px;
            margin-bottom: 10px;
        }
        .company-name {
            font-size: 22px;
            font-weight: bold;
            color: #1a202c;
            text-transform: uppercase;
        }
        .company-address {
            font-size: 10px;
            color: #4a5568;
        }
        .doc-header {
            text-align: center;
            margin: 30px 0;
        }
        .doc-title {
            font-size: 18px;
            font-weight: bold;
            text-decoration: underline;
            margin-bottom: 5px;
        }
        .doc-number {
            font-size: 12px;
            font-family: 'Courier', monospace;
        }
        .section-intro {
            margin-top: 40px;
            font-size: 13px;
        }
        .details-table {
            width: 100%;
            margin: 25px 0 25px 30px;
            font-size: 13px;
        }
        .details-table td {
            padding: 4px 0;
        }
        .label {
            font-weight: bold;
            width: 160px;
        }
        .main-content {
            font-size: 13px;
            text-align: justify;
            margin-bottom: 30px;
        }
        .closing {
            font-size: 13px;
            margin-bottom: 50px;
        }
        .footer-table {
            width: 100%;
            margin-top: 40px;
        }
        .qr-section {
            width: 40%;
            vertical-align: bottom;
        }
        .sign-section {
            width: 60%;
            text-align: center;
        }
        .sign-location {
            font-size: 12px;
            margin-bottom: 10px;
        }
        .sign-container {
            height: 100px;
            position: relative;
            display: block;
            margin: 10px auto;
        }
        .sign-img {
            height: 80px;
            position: relative;
            z-index: 2;
        }
        .stamp-img {
            height: 110px;
            position: absolute;
            left: 50%;
            top: 50%;
            margin-left: -55px;
            margin-top: -55px;
            opacity: 0.7;
            z-index: 1;
        }
        .signer-name {
            font-weight: bold;
            text-decoration: underline;
            font-size: 14px;
        }
        .signer-pos {
            font-size: 11px;
            color: #4a5568;
        }
        .qr-box {
            padding: 5px;
            border: 1px solid #e2e8f0;
            display: inline-block;
            background: #fff;
        }
        .qr-hint {
            font-size: 8px;
            color: #718096;
            margin-top: 5px;
            font-style: italic;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            @if($settings && $settings->company_logo)
                <img src="{{ public_path('storage/' . $settings->company_logo) }}" class="logo">
            @endif
            <div class="company-name">{{ $settings->company_name ?? 'PT BUMAME FARMASI' }}</div>
            <div class="company-address">{{ $settings->company_address ?? 'Jakarta, Indonesia' }}</div>
        </div>

        <div class="doc-header">
            <div class="doc-title">SURAT KETERANGAN KERJA</div>
            <div class="doc-number">Nomor: {{ $certificate->certificate_number }}</div>
        </div>

        <div class="section-intro">
            <p>Yang bertanda tangan di bawah ini menerangkan bahwa:</p>
        </div>

        <table class="details-table">
            <tr>
                <td class="label">Nama Lengkap</td>
                <td>: {{ $certificate->employee->full_name }}</td>
            </tr>
            <tr>
                <td class="label">NIK / Employee ID</td>
                <td>: {{ $certificate->employee->employee_id }}</td>
            </tr>
            <tr>
                <td class="label">Jabatan Terakhir</td>
                <td>: {{ $certificate->employee->position->position_name }}</td>
            </tr>
        </table>

        <div class="main-content">
            {!! nl2br(e($certificate->content)) !!}
        </div>

        <div class="closing">
            <p>Demikian surat keterangan ini diterbitkan untuk dapat dipergunakan sebagaimana mestinya.</p>
        </div>

        <table class="footer-table">
            <tr>
                <td class="qr-section">
                    <div class="qr-box">
                        <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(90)->margin(0)->generate(url('/verify/' . $certificate->certificate_number))) !!} ">
                    </div>
                    <div class="qr-hint">Scan untuk verifikasi dokumen resmi</div>
                </td>
                <td class="sign-section">
                    <div class="sign-location">{{ $settings->letter_location ?? 'Jakarta' }}, {{ date('d F Y', strtotime($certificate->issued_date)) }}</div>
                    <div class="sign-label">Hormat kami,</div>
                    <div class="sign-container">
                        @if($settings && $settings->company_stamp)
                            <img src="{{ public_path('storage/' . $settings->company_stamp) }}" class="stamp-img">
                        @endif
                        @if($settings && $settings->signature_image)
                            <img src="{{ public_path('storage/' . $settings->signature_image) }}" class="sign-img">
                        @else
                            <div style="height: 80px;"></div>
                        @endif
                    </div>
                    <div class="signer-name">{{ $settings->signer_name ?? 'HR Manager' }}</div>
                    <div class="signer-pos">{{ $settings->signer_position ?? 'Human Resource Department' }}</div>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>
