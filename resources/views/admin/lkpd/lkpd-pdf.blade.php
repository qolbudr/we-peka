<!DOCTYPE html>
<html lang="id">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>LKPD - {{ $lkpdAnswer->user->name }}</title>
        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            body {
                font-family: Arial, sans-serif;
                font-size: 11px;
                line-height: 1.5;
                color: #000;
                padding: 30px;
            }

            .header {
                text-align: center;
                margin-bottom: 25px;
                padding-bottom: 12px;
                border-bottom: 2px solid #000;
            }

            .header h1 {
                font-size: 16px;
                font-weight: bold;
                margin-bottom: 3px;
                text-transform: uppercase;
                letter-spacing: 0.5px;
            }

            .header h2 {
                font-size: 14px;
                font-weight: normal;
                margin-bottom: 8px;
            }

            .header p {
                font-size: 10px;
                color: #555;
            }

            .info-siswa {
                margin-bottom: 20px;
                padding: 10px;
                background-color: #f8f8f8;
                border: 1px solid #ddd;
            }

            .info-siswa table {
                width: 100%;
                border-collapse: collapse;
            }

            .info-siswa td {
                padding: 3px 0;
                font-size: 11px;
            }

            .info-siswa td:first-child {
                width: 140px;
                font-weight: bold;
            }

            .section {
                margin-bottom: 18px;
                page-break-inside: avoid;
            }

            .section-header {
                background-color: #333;
                color: white;
                padding: 8px 12px;
                font-size: 12px;
                font-weight: bold;
                margin-bottom: 8px;
            }

            .question-block {
                margin-bottom: 12px;
            }

            .question {
                font-weight: bold;
                font-size: 10px;
                margin-bottom: 4px;
                color: #333;
            }

            .answer {
                padding: 8px;
                background-color: #fafafa;
                border: 1px solid #ddd;
                font-size: 10px;
                text-align: justify;
                min-height: 35px;
                line-height: 1.6;
            }

            .footer {
                margin-top: 30px;
                padding-top: 10px;
                border-top: 1px solid #ccc;
                text-align: center;
                font-size: 9px;
                color: #777;
            }
        </style>
    </head>

    <body>
        <!-- Header -->
        <div class="header">
            <h1>Lembar Kerja Peserta Didik (LKPD)</h1>
            <h2>Perencanaan Karier dengan Metode SMART</h2>
            <p>Sekolah Menengah Atas</p>
        </div>

        <!-- Info Siswa -->
        <div class="info-siswa">
            <table>
                <tr>
                    <td>Nama Siswa</td>
                    <td style="text-transform: capitalize;">: {{ $lkpdAnswer->user->name }}</td>
                </tr>
                <tr>
                    <td>Kelas</td>
                    <td>: {{ $lkpdAnswer->user->kelas ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Tanggal Pengisian</td>
                    <td>: {{ $lkpdAnswer->created_at->format('d F Y, H:i') }} WIB</td>
                </tr>
            </table>
        </div>

        <!-- 1. SPESIFIK -->
        <div class="section">
            <div class="section-header">1. SPESIFIK</div>

            <div class="question-block">
                <div class="question">1.1. Apa tujuan karier spesifik kamu setelah lulus dari Sekolah Menengah Atas?
                </div>
                <div class="answer">{{ $lkpdAnswer->answers['spesifik_1'] ?? '-' }}</div>
            </div>

            <div class="question-block">
                <div class="question">1.2. Dimana tempat jenjang karier lanjutan yang ingin kamu tuju?</div>
                <div class="answer">{{ $lkpdAnswer->answers['spesifik_2'] ?? '-' }}</div>
            </div>

            <div class="question-block">
                <div class="question">1.3. Siapa saja orang yang mengispirasi atau mendukungmu dalam memilih tujuan
                    karier tersebut?</div>
                <div class="answer">{{ $lkpdAnswer->answers['spesifik_3'] ?? '-' }}</div>
            </div>
        </div>

        <!-- 2. MEASURABLE -->
        <div class="section">
            <div class="section-header">2. MEASURABLE</div>

            <div class="question-block">
                <div class="question">2.1. Bagaimana langkah-langkah atau kegiatan yang akan kamu lakukan untuk mencapai
                    tujuan kariermu?</div>
                <div class="answer">{{ $lkpdAnswer->answers['measurable_1'] ?? '-' }}</div>
            </div>
        </div>

        <!-- 3. ACHIEVABLE -->
        <div class="section">
            <div class="section-header">3. ACHIEVABLE</div>

            <div class="question-block">
                <div class="question">3.1. Apakah tujuan karier tersebut sudah realistis dan kamu merasa dapat
                    mencapainya dengan potensi dirimu?</div>
                <div class="answer">{{ $lkpdAnswer->answers['achievable_1'] ?? '-' }}</div>
            </div>

            <div class="question-block">
                <div class="question">3.2. Apakah ada hambatan dalam mencapai tujuan karier kamu?</div>
                <div class="answer">{{ $lkpdAnswer->answers['achievable_2'] ?? '-' }}</div>
            </div>

            <div class="question-block">
                <div class="question">3.3. Jika iya apa yang harus kamu lakukan?</div>
                <div class="answer">{{ $lkpdAnswer->answers['achievable_3'] ?? '-' }}</div>
            </div>
        </div>

        <!-- 4. RELEVANT -->
        <div class="section">
            <div class="section-header">4. RELEVANT</div>

            <div class="question-block">
                <div class="question">4.1. Apakah tujuan karier yang kamu pilih sudah sesuai dengan potensi yang kamu
                    miliki?</div>
                <div class="answer">{{ $lkpdAnswer->answers['relevant_1'] ?? '-' }}</div>
            </div>

            <div class="question-block">
                <div class="question">4.2. Apakah tujuan karier yang kamu pilih akan menyokong kehidupanmu dalam jangka
                    panjang?</div>
                <div class="answer">{{ $lkpdAnswer->answers['relevant_2'] ?? '-' }}</div>
            </div>
        </div>

        <!-- 5. TIME-BOUND -->
        <div class="section">
            <div class="section-header">5. TIME-BOUND</div>

            <div class="question-block">
                <div class="question">5.1. Kapan kamu akan memulai melatih diri untuk menggapai langkah-langkah menuju
                    tujuan karier kamu?</div>
                <div class="answer">{{ $lkpdAnswer->answers['timebound_1'] ?? '-' }}</div>
            </div>

            <div class="question-block">
                <div class="question">5.2. Dan dalam kurun waktu berapa lama kamu ingin menggapai tujuan kariermu
                    tersebut?</div>
                <div class="answer">{{ $lkpdAnswer->answers['timebound_2'] ?? '-' }}</div>
            </div>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p>Dicetak pada: {{ now()->format('d F Y, H:i') }} WIB</p>
            <p>Lembar Kerja Peserta Didik - Perencanaan Karier</p>
        </div>
    </body>

</html>
