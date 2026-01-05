<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RPP - {{ $rpp->konsentrasiKeahlian->nama_konsentrasi ?? 'RPP' }}</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'DejaVu Sans', Arial, sans-serif;
            font-size: 11pt;
            line-height: 1.6;
            color: #1f2937;
            padding: 20px;
        }
        
        .header {
            text-align: center;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #0066CC;
        }
        
        .header h1 {
            font-size: 20pt;
            font-weight: bold;
            color: #0066CC;
            margin-bottom: 8px;
        }
        
        .header p {
            font-size: 12pt;
            color: #333;
            margin: 3px 0;
        }
        
        .header p.subtitle {
            font-weight: bold;
        }
        
        .header p.date {
            font-size: 10pt;
            color: #666;
        }
        
        .section {
            margin-bottom: 25px;
            page-break-inside: avoid;
        }
        
        .section-title {
            color: #0066CC;
            padding: 0 0 5px 0;
            font-size: 16pt;
            font-weight: bold;
            margin: 15px 0 10px 0;
            border-bottom: 2px solid #0066CC;
        }
        
        .section-content {
            padding: 0;
            margin: 10px 0;
        }
        
        .info-item {
            margin: 4px 0;
            font-size: 11pt;
        }
        
        .info-item strong {
            font-weight: bold;
            color: #333;
        }
        
        ul {
            margin: 4px 0;
            padding-left: 20px;
            font-size: 11pt;
        }
        
        ul li {
            margin: 2px 0;
            line-height: 1.5;
        }
        
        .pertemuan-box {
            border: 1px solid #e5e7eb;
            padding: 10px;
            margin-bottom: 15px;
            page-break-inside: avoid;
            break-inside: avoid;
            background: #fafafa;
            border-radius: 4px;
        }
        
        .pertemuan-title {
            font-size: 13pt;
            font-weight: bold;
            color: #0066CC;
            margin-bottom: 8px;
            background: #f0f7ff;
            padding: 6px 8px;
            border-radius: 4px;
        }
        
        .content-wrapper {
            page-break-inside: avoid;
            break-inside: avoid;
        }
        
        .content-wrapper h1,
        .content-wrapper h2,
        .content-wrapper h3,
        .content-wrapper h4 {
            page-break-after: avoid;
            break-after: avoid;
            margin: 0 0 8px 0;
        }
        
        .content-wrapper h1 {
            font-size: 16pt;
            color: #0066CC;
        }
        
        .content-wrapper h2 {
            font-size: 15pt;
            color: #0066CC;
        }
        
        .content-wrapper h3 {
            font-size: 13pt;
            color: #1a56a6;
            background: #f0f7ff;
            padding: 6px 8px;
            border-radius: 4px;
        }
        
        .content-wrapper h4 {
            font-size: 12pt;
            color: #333;
        }
        
        .content-wrapper p {
            margin: 0 0 8px 0;
            line-height: 1.6;
            text-align: justify;
        }
        
        .content-wrapper ul,
        .content-wrapper ol {
            margin: 0 0 10px 0;
            padding-left: 25px;
            line-height: 1.6;
        }
        
        .content-wrapper li {
            margin: 0 0 4px 0;
        }
        
        .footer {
            margin-top: 40px;
            display: table;
            width: 100%;
        }
        
        .footer-cell {
            display: table-cell;
            width: 50%;
            padding: 10px;
            vertical-align: top;
        }
        
        .signature-line {
            margin-top: 60px;
            border-top: 2px solid #1f2937;
            padding-top: 5px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <div class="header">
        <h1>RENCANA PELAKSANAAN PEMBELAJARAN (RPP)</h1>
        <p class="subtitle">Kurikulum Merdeka - SMK</p>
        <p class="date">{{ \Carbon\Carbon::now()->locale('id')->isoFormat('dddd, D MMMM YYYY') }}</p>
    </div>

    <!-- Filter Capaian Pembelajaran -->
    <div class="section">
        <div class="section-title">FILTER CAPAIAN PEMBELAJARAN</div>
        <div class="section-content">
            <p class="info-item"><strong>Bidang Keahlian:</strong> {{ $rpp->bidangKeahlian->nama_bidang ?? '-' }}</p>
            <p class="info-item"><strong>Program Keahlian:</strong> {{ $rpp->programKeahlian->nama_program ?? '-' }}</p>
            <p class="info-item"><strong>Konsentrasi Keahlian:</strong> {{ $rpp->konsentrasiKeahlian->nama_konsentrasi ?? '-' }}</p>
            <p class="info-item"><strong>Fase:</strong> {{ $rpp->fase->nama_fase ?? '-' }}</p>
        </div>
    </div>

    <!-- I. Identifikasi Pembelajaran -->
    <div class="section">
        <div class="section-title">I. IDENTIFIKASI PEMBELAJARAN</div>
        <div class="section-content">
            <p style="font-size: 11pt; font-weight: bold; margin: 8px 0 4px 0; color: #333;">Dimensi Profil Pelajar Pancasila:</p>
            @if($rpp->dimensi_profil && is_array($rpp->dimensi_profil))
                <ul>
                    @foreach($rpp->dimensi_profil as $dimensi)
                        <li>{{ $dimensi }}</li>
                    @endforeach
                </ul>
            @else
                <p>-</p>
            @endif
        </div>
    </div>

    <!-- II. Alokasi Waktu -->
    <div class="section">
        <div class="section-title">II. ALOKASI WAKTU</div>
        <div class="section-content">
            <p class="info-item"><strong>Jumlah Pertemuan:</strong> {{ $rpp->jumlah_pertemuan ?? '-' }} pertemuan</p>
            <p class="info-item"><strong>Jam Pelajaran per Pertemuan:</strong> {{ $rpp->jam_pelajaran ?? '-' }} JP (1 JP = 45 menit)</p>
            <p class="info-item"><strong>Total Durasi:</strong> {{ ($rpp->jumlah_pertemuan ?? 0) * ($rpp->jam_pelajaran ?? 0) * 45 }} menit</p>
        </div>
    </div>

    <!-- III. Desain Pembelajaran -->
    <div class="section">
        <div class="section-title">III. DESAIN PEMBELAJARAN</div>
        <div class="section-content">
            <p style="font-size: 11pt; font-weight: bold; margin: 8px 0 4px 0; color: #333;">Tujuan Pembelajaran:</p>
            <p style="font-size: 11pt; margin: 4px 0; text-align: justify; line-height: 1.5;">{{ $rpp->tujuan_pembelajaran ?? '-' }}</p>

            <p style="font-size: 11pt; font-weight: bold; margin: 8px 0 4px 0; color: #333;">Model Pembelajaran / Praktik Pedagogis:</p>
            <p style="font-size: 11pt; margin: 4px 0;">{{ $rpp->praktik_pedagogis ?? '-' }}</p>

            @if($rpp->strategi_pembelajaran && is_array($rpp->strategi_pembelajaran))
                <p style="font-size: 11pt; font-weight: bold; margin: 8px 0 4px 0; color: #333;">Strategi Pembelajaran:</p>
                <ul>
                    @foreach($rpp->strategi_pembelajaran as $strategi)
                        <li>{{ $strategi }}</li>
                    @endforeach
                </ul>
            @endif

            @if($rpp->kemitraan_pembelajaran && is_array($rpp->kemitraan_pembelajaran))
                <p style="font-size: 11pt; font-weight: bold; margin: 8px 0 4px 0; color: #333;">Kemitraan Pembelajaran:</p>
                <ul>
                    @foreach($rpp->kemitraan_pembelajaran as $kemitraan)
                        <li>{{ $kemitraan }}</li>
                    @endforeach
                </ul>
            @endif

            @if($rpp->metode_pembelajaran && is_array($rpp->metode_pembelajaran))
                <p style="font-size: 11pt; font-weight: bold; margin: 8px 0 4px 0; color: #333;">Metode Pembelajaran:</p>
                <ul>
                    @foreach($rpp->metode_pembelajaran as $metode)
                        <li>{{ $metode }}</li>
                    @endforeach
                </ul>
            @endif

            <p style="font-size: 11pt; font-weight: bold; margin: 8px 0 4px 0; color: #333;">Lingkungan Pembelajaran:</p>
            <p style="font-size: 11pt; margin: 4px 0; text-align: justify; line-height: 1.5;">{{ $rpp->lingkungan_pembelajaran ?? '-' }}</p>

            @if($rpp->pemanfaatan_digital)
                <p style="font-size: 11pt; font-weight: bold; margin: 8px 0 4px 0; color: #333;">Pemanfaatan Digital:</p>
                <p style="font-size: 11pt; margin: 4px 0; text-align: justify; line-height: 1.5;">{{ $rpp->pemanfaatan_digital }}</p>
            @endif
        </div>
    </div>

    <!-- IV. Langkah Pembelajaran -->
    <div class="section">
        <div class="section-title">IV. LANGKAH-LANGKAH PEMBELAJARAN</div>
        <div class="section-content">
            @if($rpp->langkah_pembelajaran)
                @php
                    // Convert markdown to HTML for PDF
                    $content = '';
                    if(is_array($rpp->langkah_pembelajaran)) {
                        // If array, join all items
                        foreach($rpp->langkah_pembelajaran as $langkah) {
                            $content .= is_string($langkah) ? $langkah . "\n\n" : json_encode($langkah, JSON_PRETTY_PRINT) . "\n\n";
                        }
                    } else {
                        $content = $rpp->langkah_pembelajaran;
                    }
                    
                    // Basic markdown conversion
                    $content = preg_replace('/^### (.+)$/m', '<h3>$1</h3>', $content);
                    $content = preg_replace('/^## (.+)$/m', '<h2>$1</h2>', $content);
                    $content = preg_replace('/^# (.+)$/m', '<h1>$1</h1>', $content);
                    $content = preg_replace('/\*\*(.+?)\*\*/s', '<strong>$1</strong>', $content);
                    $content = preg_replace('/\*(.+?)\*/s', '<em>$1</em>', $content);
                    $content = preg_replace('/^\- (.+)$/m', '<li>$1</li>', $content);
                    $content = preg_replace('/(<li>.*<\/li>)/s', '<ul>$1</ul>', $content);
                    $content = preg_replace('/^\d+\. (.+)$/m', '<li>$1</li>', $content);
                    $content = nl2br($content);
                @endphp
                <div class="content-wrapper">
                    {!! $content !!}
                </div>
            @else
                <p>Belum ada langkah pembelajaran</p>
            @endif
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        <div class="footer-cell">
            <p><strong>Dibuat oleh:</strong></p>
            <p style="margin-top: 5px;">{{ $rpp->user->name ?? '-' }}</p>
            <p style="font-size: 9pt; color: #6b7280;">{{ $rpp->created_at->format('d F Y') }}</p>
        </div>
        <div class="footer-cell" style="text-align: right;">
            <p><strong>Mengetahui,</strong></p>
            <div class="signature-line">Kepala Sekolah</div>
        </div>
    </div>
</body>
</html>
