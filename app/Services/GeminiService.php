<?php

namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class GeminiService
{
    private $client;
    private $apiKey;
    private $apiUrl;

    public function __construct()
    {
        $this->client = new Client();
        $this->apiKey = config('services.gemini.api_key');
        // Using gemini-2.5-flash - stable model (verified available)
        $this->apiUrl = 'https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-flash:generateContent';
    }

    /**
     * Generate Langkah-Langkah Pembelajaran from RPP data using Gemini AI
     * With retry mechanism for 503 errors
     */
    public function generateLangkahPembelajaran($rppData)
    {
        $maxRetries = 3;
        $retryDelay = 2; // seconds

        for ($attempt = 1; $attempt <= $maxRetries; $attempt++) {
            try {
                // Check if API key is set
                if (empty($this->apiKey)) {
                    Log::error('Gemini API Key is not set');
                    throw new \Exception('Gemini API Key is not configured. Please add GEMINI_API_KEY to .env file');
                }

                // Get CP Detail context if id_mapel is provided
                $cpContext = null;
                if (isset($rppData['id_mapel']) && !empty($rppData['id_mapel'])) {
                    $cpContext = $this->getCpContext($rppData['id_mapel']);
                }

                $prompt = $this->buildPrompt($rppData, $cpContext);

                Log::info("Calling Gemini API (Attempt {$attempt}/{$maxRetries})...", ['prompt_length' => strlen($prompt)]);

                $response = $this->client->post($this->apiUrl, [
                    'query' => [
                        'key' => $this->apiKey
                    ],
                    'json' => [
                        'contents' => [
                            [
                                'parts' => [
                                    ['text' => $prompt]
                                ]
                            ]
                        ],
                        'generationConfig' => [
                            'temperature' => 1.0,
                            'topK' => 64,
                            'topP' => 0.95,
                            'maxOutputTokens' => 16000, // Reduced from 32000 for faster generation
                            'candidateCount' => 1
                        ]
                    ],
                    'headers' => [
                        'Content-Type' => 'application/json'
                    ],
                    'timeout' => 180, // Increased to 3 minutes
                    'connect_timeout' => 30
                ]);

                $result = json_decode($response->getBody()->getContents(), true);

                Log::info('Gemini API Response received');

                if (isset($result['candidates'][0]['content']['parts'][0]['text'])) {
                    $generatedText = $result['candidates'][0]['content']['parts'][0]['text'];

                    // Check if response is complete or truncated
                    $wordCount = str_word_count($generatedText);
                    $hasClosing = (stripos($generatedText, 'penutup') !== false || stripos($generatedText, 'refleksi') !== false);

                    Log::info('Generated text stats:', [
                        'length' => strlen($generatedText),
                        'word_count' => $wordCount,
                        'has_closing' => $hasClosing,
                        'finish_reason' => $result['candidates'][0]['finishReason'] ?? 'unknown'
                    ]);

                    $parsed = $this->parseGeneratedText($generatedText);
                    return $parsed;
                }

                Log::warning('No valid response from Gemini API', ['result' => $result]);
                return null;

            } catch (\GuzzleHttp\Exception\ConnectException $e) {
                // Handle connection timeout
                Log::warning("Connection timeout to Gemini API", [
                    'attempt' => $attempt,
                    'error' => $e->getMessage()
                ]);

                if ($attempt < $maxRetries) {
                    $waitTime = $retryDelay;
                    Log::info("Retrying after connection timeout... (Attempt {$attempt}/{$maxRetries})");
                    sleep($waitTime);
                    $retryDelay *= 2;
                    continue;
                }

                throw new \Exception('Koneksi ke server Gemini timeout. Kemungkinan: 1) Koneksi internet lambat, 2) Prompt terlalu panjang, 3) Server Gemini sibuk. Silakan coba lagi atau kurangi jumlah pertemuan/teks.');

            } catch (\GuzzleHttp\Exception\ClientException $e) {
                $statusCode = $e->getResponse()->getStatusCode();
                $responseBody = $e->getResponse()->getBody()->getContents();

                // Handle 429 Too Many Requests
                if ($statusCode == 429) {
                    Log::warning("Gemini API rate limit exceeded (429)", [
                        'attempt' => $attempt,
                        'response' => $responseBody
                    ]);

                    if ($attempt < $maxRetries) {
                        $waitTime = $retryDelay * 2; // Wait longer for rate limits
                        Log::info("Waiting {$waitTime} seconds before retry... (Attempt {$attempt}/{$maxRetries})");
                        sleep($waitTime);
                        $retryDelay *= 2;
                        continue;
                    }

                    throw new \Exception('API Gemini mencapai batas kuota. Silakan tunggu beberapa menit atau periksa kuota API Anda di Google AI Studio (https://aistudio.google.com/app/apikey). Error: Terlalu banyak permintaan dalam waktu singkat.');
                }

                Log::error('Gemini API Client Error: ' . $e->getMessage(), [
                    'status_code' => $statusCode,
                    'response' => $responseBody
                ]);
                throw new \Exception('Error dari Gemini API (Code: ' . $statusCode . '). Silakan coba lagi.');

            } catch (\GuzzleHttp\Exception\ServerException $e) {
                $statusCode = $e->getResponse()->getStatusCode();

                if ($statusCode == 503 && $attempt < $maxRetries) {
                    Log::warning("Gemini API overloaded (503), retrying in {$retryDelay} seconds... (Attempt {$attempt}/{$maxRetries})");
                    sleep($retryDelay);
                    $retryDelay *= 2; // Exponential backoff
                    continue;
                }

                Log::error('Gemini API Server Error: ' . $e->getMessage());
                throw new \Exception('Server Gemini sedang overload. Silakan coba lagi dalam beberapa saat.');

            } catch (\Exception $e) {
                Log::error('Gemini AI Error: ' . $e->getMessage(), [
                    'trace' => $e->getTraceAsString()
                ]);

                // Don't retry for other errors
                throw $e;
            }
        }

        throw new \Exception('Gemini API masih overload setelah ' . $maxRetries . ' percobaan. Silakan coba lagi nanti.');
    }

    /**
     * Get CP Context from database
     */
    private function getCpContext($idMapel)
    {
        $cpDetail = \App\Models\CpDetail::with('mataPelajaran')->where('id_mapel', $idMapel)->first();

        if (!$cpDetail) {
            return null;
        }

        return [
            'mata_pelajaran' => $cpDetail->mataPelajaran->nama_mapel ?? '',
            'jenis_mapel' => $cpDetail->mataPelajaran->jenis_mapel ?? '',
            'rasional' => $cpDetail->rasional ?? '',
            'tujuan' => $cpDetail->tujuan ?? '',
            'karakteristik' => $cpDetail->karakteristik ?? '',
            'capaian_pembelajaran' => $cpDetail->capaian_pembelajaran ?? '',
            'uraian_cp' => $cpDetail->uraian_cp ?? ''
        ];
    }

    /**
     * Build prompt for Gemini AI
     */
    private function buildPrompt($rppData, $cpContext = null)
    {
        $dimensiProfil = is_array($rppData['dimensi_profil'])
            ? implode(', ', $rppData['dimensi_profil'])
            : $rppData['dimensi_profil'];

        // Parse dimensi profil as array for detailed explanation
        $dimensiArray = is_array($rppData['dimensi_profil'])
            ? $rppData['dimensi_profil']
            : explode(', ', $rppData['dimensi_profil']);

        // Create detailed dimensi profil explanation
        $dimensiDetail = '';
        foreach ($dimensiArray as $dimensi) {
            $dimensiDetail .= "- " . trim($dimensi) . "\n";
        }

        // Format kemitraan pembelajaran (array or string)
        $kemitraanText = 'Tidak ada kemitraan khusus';
        if (!empty($rppData['kemitraan_pembelajaran'])) {
            if (is_array($rppData['kemitraan_pembelajaran']) && count($rppData['kemitraan_pembelajaran']) > 0) {
                $kemitraanText = implode(', ', $rppData['kemitraan_pembelajaran']);
            } elseif (is_string($rppData['kemitraan_pembelajaran']) && trim($rppData['kemitraan_pembelajaran']) !== '') {
                $kemitraanText = $rppData['kemitraan_pembelajaran'];
            }
        }

        // Format strategi pembelajaran (array or string)
        $strategiText = 'Tidak ada strategi khusus';
        if (!empty($rppData['strategi_pembelajaran'])) {
            if (is_array($rppData['strategi_pembelajaran']) && count($rppData['strategi_pembelajaran']) > 0) {
                $strategiText = implode(', ', $rppData['strategi_pembelajaran']);
            } elseif (is_string($rppData['strategi_pembelajaran']) && trim($rppData['strategi_pembelajaran']) !== '') {
                $strategiText = $rppData['strategi_pembelajaran'];
            }
        }

        // Format metode pembelajaran (array or string)
        $metodeText = 'Tidak ada metode khusus';
        if (!empty($rppData['metode_pembelajaran'])) {
            if (is_array($rppData['metode_pembelajaran']) && count($rppData['metode_pembelajaran']) > 0) {
                $metodeText = implode(', ', $rppData['metode_pembelajaran']);
            } elseif (is_string($rppData['metode_pembelajaran']) && trim($rppData['metode_pembelajaran']) !== '') {
                $metodeText = $rppData['metode_pembelajaran'];
            }
        }

        // Build context section
        $contextSection = '';
        if ($cpContext) {
            $contextSection = <<<CONTEXT

═══════════════════════════════════════════════════════════════════════════
📚 KONTEKS MATA PELAJARAN
═══════════════════════════════════════════════════════════════════════════
📖 Mata Pelajaran: {$cpContext['mata_pelajaran']}
🎯 Jenis: {$cpContext['jenis_mapel']}

💡 Capaian Pembelajaran:
{$cpContext['capaian_pembelajaran']}

⚡ Karakteristik:
{$cpContext['karakteristik']}

📋 Uraian Capaian Pembelajaran:
{$cpContext['uraian_cp']}

CONTEXT;
        }

        // Alokasi waktu
        $jumlahPertemuan = $rppData['jumlah_pertemuan'] ?? 1;
        $jamPelajaran = $rppData['jam_pelajaran'] ?? 2;
        $totalJP = $jumlahPertemuan * $jamPelajaran;
        $totalMenit = $totalJP * 45;
        $waktuInti = $totalMenit - 50;

        // Get mata pelajaran name
        $namaMapel = 'Tidak diketahui';
        if ($cpContext && isset($cpContext['mata_pelajaran'])) {
            $namaMapel = $cpContext['mata_pelajaran'];
        }

        // Generate unique seed for creativity
        $uniqueSeed = md5(json_encode($rppData) . microtime());

        $prompt = <<<PROMPT
Anda adalah GURU PROFESIONAL SMK AHLI dalam bidang {$namaMapel}.

🎲 SEED KREATIVITAS: {$uniqueSeed}
⚠️ PENTING: Setiap RPP HARUS BERBEDA! Jangan gunakan template yang sama. Buat aktivitas yang SPESIFIK dan UNIK berdasarkan data di bawah.

{$contextSection}

═══════════════════════════════════════════════════════════════════════════
📋 DATA RPP - WAJIB DIGUNAKAN SEMUA
═══════════════════════════════════════════════════════════════════════════

📚 Mata Pelajaran: {$namaMapel}

⏰ ALOKASI WAKTU:
   • Jumlah Pertemuan: {$jumlahPertemuan} pertemuan
   • Jam Pelajaran per pertemuan: {$jamPelajaran} JP (@ 45 menit)
   • Total Alokasi Waktu: {$totalJP} JP ({$totalMenit} menit)

🎯 DIMENSI PROFIL PELAJAR PANCASILA (WAJIB DIINTEGRASIKAN):
{$dimensiDetail}

🎓 TUJUAN PEMBELAJARAN:
   {$rppData['tujuan_pembelajaran']}

🎨 MODEL PEMBELAJARAN / PRAKTIK PEDAGOGIS:
   {$rppData['praktik_pedagogis']}

📊 STRATEGI PEMBELAJARAN:
   {$strategiText}

🎓 METODE PEMBELAJARAN:
   {$metodeText}

🤝 KEMITRAAN PEMBELAJARAN:
   {$kemitraanText}

🏫 LINGKUNGAN PEMBELAJARAN:
   {$rppData['lingkungan_pembelajaran']}

💻 PEMANFAATAN DIGITAL:
   {$rppData['pemanfaatan_digital']}

═══════════════════════════════════════════════════════════════════════════
⚠️ INSTRUKSI PENTING - BACA DENGAN TELITI
═══════════════════════════════════════════════════════════════════════════

📏 TARGET PANJANG OUTPUT:
- MINIMAL 3000-5000 kata (sekitar 8-12 halaman A4)
- Setiap fase (Pendahuluan/Inti/Penutup) harus dijelaskan dengan SANGAT DETAIL dan LENGKAP
- Jangan berhenti di penjelasan singkat - elaborasi setiap poin!
- WAJIB menulis sampai bagian PENUTUP selesai dengan lengkap
- Jangan potong output di tengah jalan - SELESAIKAN SEMUA BAGIAN!

🌟 PRINSIP PEMBELAJARAN WAJIB DITERAPKAN:

**A. BERKESADARAN (Pendahuluan & Penutup):**
   - Di PENDAHULUAN: Bangun kesadaran siswa tentang MENGAPA materi ini penting untuk masa depan mereka
   - Hubungkan dengan dunia nyata, karir di industri {$namaMapel}, dan kehidupan sehari-hari
   - Tunjukkan relevansi dengan profesi dan kehidupan bermasyarakat
   - Di PENUTUP: Siswa merefleksikan APA yang dipelajari, BAGAIMANA prosesnya, dan MENGAPA penting

**B. BERMAKNA (Kegiatan Inti):**
   - Semua aktivitas harus JELAS hubungannya dengan tujuan pembelajaran
   - Gunakan konteks NYATA dari industri/kehidupan sehari-hari, bukan skenario buatan
   - Libatkan {$kemitraanText} untuk memberikan perspektif praktis dari dunia kerja
   - Siswa harus memahami MAKNA dari setiap aktivitas, bukan hanya mengikuti instruksi
   - Kaitkan dengan masalah riil yang dihadapi di {$rppData['lingkungan_pembelajaran']}

**C. MENGEMBIRAKAN (Sepanjang Pembelajaran):**
   - Gunakan ice breaking, game edukatif, atau aktivitas interaktif yang mengembirakan
   - Variasi metode: jangan monoton! Kombinasikan ceramah singkat, diskusi, game, praktik, presentasi
   - Beri apresiasi dan celebrate small wins
   - Ciptakan suasana kolaboratif yang supportive, bukan kompetitif
   - Gunakan humor, analogi menarik, atau storytelling saat menjelaskan konsep
   - Beri kebebasan kreativitas dalam menyelesaikan tugas

📚 STRUKTUR PEMBELAJARAN PER TUJUAN:

Untuk SETIAP tujuan pembelajaran yang ada di "{$rppData['tujuan_pembelajaran']}", WAJIB melalui 3 fase:

**1. MEMAHAMI (Understanding Phase):**
   - Siswa menerima informasi baru tentang konsep/teori/prosedur
   - Bisa melalui penjelasan guru, eksplorasi mandiri, atau diskusi kelompok
   - Siswa membangun pemahaman dasar tentang "APA" dan "BAGAIMANA"
   - Gunakan metode: ceramah interaktif, demonstrasi, video tutorial, reading, discovery
   - Pastikan siswa paham konsep sebelum lanjut ke aplikasi

**2. MENGAPLIKASI (Application Phase):**
   - Siswa PRAKTIK langsung menerapkan konsep yang dipahami
   - Hands-on activity: coding, konfigurasi, desain, eksperimen, problem solving
   - Siswa membuat produk/karya/solusi konkret menggunakan tools {$rppData['pemanfaatan_digital']}
   - Kolaborasi dalam kelompok untuk menyelesaikan task/project riil
   - Guru sebagai fasilitator, bukan instructor - biarkan siswa explore dan troubleshoot

**3. MEREFLEKSI (Reflection Phase):**
   - Siswa mengevaluasi proses belajar dan hasil yang dicapai
   - Refleksi tentang: Apa yang berhasil? Apa yang sulit? Apa yang dipelajari? Bagaimana penerapannya?
   - Bisa melalui: jurnal refleksi, diskusi kelas, peer feedback, self-assessment
   - Siswa menghubungkan pembelajaran dengan kehidupan nyata dan profesi masa depan
   - Identifikasi area yang perlu diperbaiki dan rencana tindak lanjut

⚠️ JIKA ADA LEBIH DARI SATU TUJUAN PEMBELAJARAN:
- Buat MEMAHAMI → MENGAPLIKASI → MEREFLEKSI untuk SETIAP tujuan
- Bisa dilakukan di pertemuan yang berbeda jika waktu tidak cukup
- Contoh: Pertemuan 1 fokus Tujuan A (3 fase lengkap), Pertemuan 2 fokus Tujuan B (3 fase lengkap)

🎯 WAJIB - BACA BAIK-BAIK:
1. ANALISIS tujuan "{$rppData['tujuan_pembelajaran']}" dan buat aktivitas yang SANGAT SPESIFIK untuk mencapainya
2. **PENTING SEKALI - DIMENSI PROFIL HARUS SESUAI KONTEKS:**

   HANYA gunakan dimensi yang dipilih: {$dimensiProfil}

   Untuk SETIAP dimensi, berikan implementasi KONKRET:

   • **Keimanan dan Ketakwaan terhadap Tuhan YME:**
     - Pembelajaran HARUS DIMULAI dengan berdoa/tadarus/dzikir/meditasi spiritual sesuai agama
     - Ada momen refleksi spiritual terkait materi (misal: mensyukuri kemajuan teknologi sebagai nikmat Tuhan)
     - Nilai kejujuran, amanah, tanggung jawab dalam mengerjakan tugas

   • **Penalaran Kritis:**
     - Menganalisis masalah dengan logis
     - Membandingkan berbagai solusi
     - Evaluasi dan justifikasi keputusan
     - Mempertanyakan dan mencari bukti

   • **Kolaborasi:**
     - Kerja kelompok dengan pembagian tugas jelas
     - Saling membantu antar siswa (peer tutoring)
     - Kolaborasi untuk mencapai tujuan bersama
     - Mendengarkan dan menghargai pendapat orang lain

   • **Kesehatan:**
     - Menjaga postur tubuh saat praktik (ergonomi)
     - Istirahat sejenak di tengah pembelajaran (stretching)
     - Kesehatan mental (manajemen stress dalam belajar)
     - Pola hidup sehat terkait profesi

   • **Kewargaan:**
     - Menaati aturan kelas/lab
     - Tanggung jawab sebagai warga negara (misal: tidak pembajakan software)
     - Etika digital dan cyber ethics
     - Berkontribusi untuk kemajuan bangsa

   • **Kreativitas:**
     - Membuat solusi/produk yang inovatif
     - Mengeksplorasi pendekatan baru
     - Menghasilkan karya original
     - Berpikir out of the box

   • **Kemandirian:**
     - Siswa mencari informasi sendiri
     - Mengambil inisiatif dalam belajar
     - Bertanggung jawab atas tugas individu
     - Tidak bergantung pada orang lain

   • **Komunikasi:**
     - Presentasi hasil kerja dengan jelas
     - Menjelaskan ide/konsep kepada teman
     - Dokumentasi yang baik (laporan, video, dll)
     - Diskusi dan tanya jawab aktif

   ⚠️ JANGAN TAMBAHKAN dimensi yang TIDAK DIPILIH!

3. **TERAPKAN MODEL PEMBELAJARAN "{$rppData['praktik_pedagogis']}" DENGAN BENAR:**
   - **Problem-Based Learning (PBL):** Sajikan masalah autentik di awal, siswa investigasi dan cari solusi
   - **Project-Based Learning (PjBL):** Buat proyek nyata yang menghasilkan produk/karya
   - **Discovery Learning:** Siswa menemukan konsep sendiri melalui eksplorasi
   - **Cooperative Learning:** Struktur kelompok dengan peran jelas (Think-Pair-Share, Jigsaw, dll)
   - **Inquiry-Based Learning:** Pembelajaran berbasis pertanyaan dan investigasi
   - **CTL (Contextual Teaching and Learning):** Kaitkan dengan kehidupan nyata dan konteks siswa
   - **Direct Instruction:** Guru menjelaskan konsep langsung, demonstrasi, latihan terbimbing

   WAJIB sesuai sintaks/langkah model yang dipilih!

4. **IMPLEMENTASIKAN STRATEGI PEMBELAJARAN "{$strategiText}" DENGAN KONSISTEN:**
   - **Ekspositori:** Guru menyampaikan informasi secara langsung, siswa mendengarkan dan mencatat
   - **Inkuiri:** Pembelajaran berbasis pertanyaan, siswa mencari jawaban melalui investigasi
   - **Berbasis Masalah:** Dimulai dari masalah nyata, siswa mencari solusi melalui analisis
   - **Kooperatif:** Siswa bekerja dalam kelompok kecil untuk mencapai tujuan bersama
   - **Afektif:** Fokus pada pengembangan sikap, nilai, dan emosi siswa
   - **Kontekstual:** Menghubungkan materi dengan situasi dunia nyata dan pengalaman siswa
   - **Peningkatan Kemampuan Berpikir:** Fokus pada higher order thinking skills (HOTS)

   Strategi ini harus TERLIHAT dalam aktivitas pembelajaran yang kamu rancang!

5. **GUNAKAN METODE PEMBELAJARAN "{$metodeText}" SECARA EFEKTIF:**
   - **Demonstrasi:** Guru menunjukkan/memperagakan keterampilan atau proses, siswa mengamati
   - **Ceramah:** Penyampaian informasi verbal dari guru kepada siswa
   - **Diskusi:** Dialog interaktif antara siswa atau siswa-guru untuk membahas topik
   - **Bermain Peran:** Siswa memerankan situasi/peran tertentu untuk memahami konsep
   - **Latihan Berulang:** Praktik berulang untuk menguasai keterampilan (drill and practice)
   - **Kerja Lapangan:** Pembelajaran di luar kelas, observasi langsung di lapangan/industri
   - **Kerja Kelompok:** Siswa bekerja bersama dalam tim untuk menyelesaikan tugas

   Metode ini harus JELAS terlihat dalam langkah-langkah pembelajaran!

6. MANFAATKAN "{$kemitraanText}" - jelaskan SIAPA melakukan APA dan KAPAN dilibatkan
7. MAKSIMALKAN "{$rppData['lingkungan_pembelajaran']}" - sebutkan lokasi SPESIFIK dan bagaimana digunakan
8. INTEGRASIKAN "{$rppData['pemanfaatan_digital']}" - sebutkan tools KONKRET (nama aplikasi/software)
9. ALOKASI waktu: {$totalJP} JP = {$totalMenit} menit total (Pendahuluan 20 menit, Inti {$waktuInti} menit, Penutup 30 menit)
10. Untuk {$namaMapel}, HARUS menyebutkan: teknik/metode/tools/software yang BENAR-BENAR digunakan di industri

⛔ DILARANG KERAS:
❌ Copy-paste template generik atau jawaban sebelumnya
❌ Aktivitas yang tidak jelas hubungannya dengan "{$rppData['tujuan_pembelajaran']}"
❌ Menyebutkan "diskusi kelompok" tanpa menjelaskan diskusi tentang APA
❌ Tidak spesifik tentang tools/teknologi (contoh: "menggunakan software" ❌ → "menggunakan Figma untuk wireframe" ✅)
❌ Mengabaikan dimensi profil yang sudah dipilih
❌ Aktivitas yang tidak sesuai dengan "{$rppData['praktik_pedagogis']}"

🎨 FORMAT OUTPUT (WAJIB - GUNAKAN FORMAT INI!):

# Langkah-Langkah Pembelajaran Mendalam: [Judul Materi dari Tujuan Pembelajaran]

### Pertemuan 1 ({$jamPelajaran} JP)

**Tujuan Spesifik:** [Tulis tujuan pembelajaran spesifik pertemuan ini secara ringkas dan jelas dalam 1 kalimat panjang]

---

**Aktivitas:**

**A. Pendahuluan (Berkesadaran) - [X] menit:**

1. Guru membuka pembelajaran dengan salam dan berdoa bersama sesuai kepercayaan masing-masing
2. Guru mengajak siswa untuk [aktivitas kesadaran diri: misal breathing exercise, motivasi diri, afirmasi positif]
3. Guru menjelaskan tujuan pembelajaran hari ini: "{$rppData['tujuan_pembelajaran']}" dengan bahasa yang mudah dipahami
4. Guru mengaitkan materi dengan dimensi profil ({$dimensiProfil}): [jelaskan relevansi konkret - misal jika Kolaborasi: pentingnya kerja tim di industri]
5. Guru menjelaskan model pembelajaran {$rppData['praktik_pedagogis']} yang akan diterapkan hari ini
6. **Asesmen Diagnostik:** Guru melakukan tanya jawab singkat / polling / pre-test untuk mengecek pemahaman awal siswa tentang [topik hari ini]
7. Contoh pertanyaan diagnostik: [berikan 2-3 contoh pertanyaan konkret]

**B. Kegiatan Inti (Bermakna & Mengembirakan) - [X] menit:**

**📚 FASE 1: MEMAHAMI (Understanding) - [X] menit**

1. **Pengantar Materi ({$strategiText}):**
   - Guru mempresentasikan konsep utama: [sebutkan konsep spesifik]
   - Guru menggunakan [media: slide/video/demo] untuk menjelaskan [topik]
   - Durasi: [X] menit

2. **Aktivitas Eksplorasi:**
   - Siswa dibagi menjadi kelompok kecil (4-5 orang per kelompok)
   - Setiap kelompok diberikan [skenario/kasus/problem statement spesifik]
   - Kelompok berdiskusi menggunakan metode {$metodeText} untuk [tujuan diskusi konkret]

3. **Visualisasi/Eksplorasi Digital:**
   - Kelompok menggunakan {$rppData['pemanfaatan_digital']} untuk [aktivitas spesifik]
   - Contoh: membuat mind map di Miro, sketsa di Figma, eksplorasi kode di VS Code
   - Output yang diharapkan: [sebutkan deliverable konkret]

4. **Tanya Jawab & Klarifikasi:**
   - Guru berkeliling memantau diskusi kelompok
   - Guru memberikan klarifikasi jika ada konsep yang belum dipahami
   - Siswa boleh bertanya langsung ke guru atau teman kelompok

**🛠️ FASE 2: MENGAPLIKASI (Application) - [X] menit**

1. **Transisi ke Praktik:**
   - Guru menjelaskan langkah-langkah implementasi dari konsep ke praktik
   - Guru mendemonstrasikan [teknik/metode/tools] yang akan digunakan
   - Durasi demo: [X] menit

2. **Hands-On Practice di {$rppData['lingkungan_pembelajaran']}:**
   - Setiap kelompok mulai mengerjakan tugas praktik
   - Menggunakan {$rppData['pemanfaatan_digital']} untuk [aktivitas teknis spesifik]

   **Detail Teknis (WAJIB SPESIFIK):**
   - [Untuk RPL: Bahasa pemrograman, framework, library yang digunakan, struktur file, command yang dijalankan]
   - [Untuk TKJ: Device yang dikonfigurasi, setting IP, protokol, testing command]
   - [Untuk Multimedia: Software editing, teknik, asset yang digunakan, format export]
   - [Sesuaikan dengan mata pelajaran masing-masing]

3. **Implementasi Best Practice Industri:**
   - Guru mengintegrasikan standar industri dari {$kemitraanText}
   - Contoh konkret: [jelaskan bagaimana standar industri diterapkan dalam praktik ini]
   - Siswa menerapkan [prinsip/aturan/konvensi] yang berlaku di dunia kerja

4. **Monitoring & Mentoring:**
   - Guru berkeliling memberikan bimbingan individual/kelompok
   - Guru mengamati proses kerja dan kolaborasi ({$dimensiProfil})
   - Siswa saling membantu dalam kelompok (peer tutoring)

5. **Dokumentasi & Kolaborasi Digital:**
   - Setiap kelompok mendokumentasikan proses dan hasil kerja
   - Upload hasil ke [GitHub / Google Classroom / Google Drive / dll]
   - Format dokumentasi: [screenshot, video, laporan, kode, dll]

6. **Presentasi Kelompok:**
   - Setiap kelompok mempresentasikan hasil kerja mereka ([X] menit per kelompok)
   - Menjelaskan: produk/solusi yang dibuat, proses pembuatan, tantangan yang dihadapi, cara mengatasinya
   - Demo langsung: menunjukkan cara kerja/hasil karya
   - Sesi Q&A: kelompok lain bertanya dan memberi feedback

7. **Peer Assessment:**
   - Kelompok lain memberikan penilaian menggunakan kriteria: [sebutkan kriteria spesifik]
   - Format: rubrik sederhana dengan skala 1-4

**💭 FASE 3: MEREFLEKSI (Reflection) - [X] menit**

1. **Refleksi Individual (tertulis):**
   - Siswa menulis refleksi pribadi menjawab pertanyaan:
     * Apa konsep/skill baru yang dipelajari hari ini?
     * Apa bagian yang paling menantang? Bagaimana mengatasinya?
     * Apa yang berhasil dilakukan dengan baik?
     * Bagaimana kontribusi saya dalam kelompok?
     * Bagaimana materi ini relevan dengan dunia kerja?
   - Media: [Jurnal digital / Google Classroom / Notion / Padlet]

2. **Refleksi Kelompok (sharing):**
   - Beberapa siswa (sukarela) berbagi refleksi mereka ke kelas
   - Diskusi: pembelajaran kunci apa yang bisa diambil?
   - Guru menambahkan perspektif dari sudut pandang profesional/industri

3. **Feedback dari Mitra (jika ada {$kemitraanText}):**
   - [Jika ada mitra industri/profesional, mereka memberikan feedback tentang hasil kerja siswa dari sudut pandang industri]

**C. Penutup (Merefleksi Mendalam) - [X] menit:**

1. **Kesimpulan & Rangkuman:**
   - Guru memfasilitasi siswa untuk menyimpulkan pembelajaran hari ini
   - Menghubungkan dengan tujuan pembelajaran yang ditetapkan di awal
   - Menekankan pencapaian dimensi profil ({$dimensiProfil}) yang terlihat selama pembelajaran

2. **Koneksi dengan Kehidupan Nyata:**
   - Guru menjelaskan bagaimana skill hari ini diterapkan di industri {$namaMapel}
   - Contoh profesi/pekerjaan yang membutuhkan skill ini
   - Dampak sosial dari penguasaan skill ini

3. **Apresiasi & Celebration:**
   - Guru memberikan apresiasi spesifik kepada kelompok/siswa yang menunjukkan [sebutkan achievement konkret]
   - Siswa saling mengapresiasi teman sekelompoknya
   - Momen menggembirakan: [tepuk tangan, high-five, yel-yel kelas, dll]

4. **Penugasan & Tindak Lanjut:**
   - **Tugas mandiri:** [jelaskan tugas yang harus diselesaikan di rumah]
   - **Deadline:** [tentukan waktu pengumpulan]
   - **Persiapan pertemuan berikutnya:** [materi yang perlu dibaca/dipelajari]
   - **Challenge lanjutan (opsional):** [untuk siswa yang ingin eksplorasi lebih dalam]

5. **Refleksi Guru:**
   - Guru merefleksikan: Apakah tujuan pembelajaran tercapai? Siswa mana yang perlu pendampingan tambahan?

6. **Doa Penutup & Salam:**
   - Dipimpin oleh salah satu siswa sesuai kepercayaan masing-masing
   - Guru memberikan motivasi penutup
   - Salam penutup

---

**📊 Catatan Penting:**

**Dimensi Profil yang Terlihat Selama Pembelajaran:**
[Sebutkan KONKRET bagaimana setiap dimensi dari {$dimensiProfil} muncul dalam pembelajaran:
- **Keimanan dan Ketakwaan:** Doa, syukur, nilai integritas dalam tugas
- **Penalaran Kritis:** Analisis masalah, evaluasi solusi, argumentasi logis
- **Kolaborasi:** Kerja tim, pembagian peran, saling membantu
- **Kesehatan:** Postur ergonomis, stretching, manajemen stress
- **Kewargaan:** Menaati aturan, tanggung jawab, etika digital
- **Kreativitas:** Solusi inovatif, produk original, berpikir out of the box
- **Kemandirian:** Inisiatif mandiri, troubleshooting sendiri, bertanggung jawab
- **Komunikasi:** Presentasi, dokumentasi, diskusi aktif]

**Outcome Pembelajaran:**
✅ Siswa mencapai tujuan pembelajaran: "{$rppData['tujuan_pembelajaran']}"
✅ Siswa menghasilkan [produk/karya/solusi konkret yang terukur]
✅ Siswa terampil menggunakan [tools/teknik/metode spesifik]
✅ Siswa dapat menjelaskan proses dan reasoning di balik keputusan mereka
✅ Siswa menunjukkan dimensi profil: {$dimensiProfil}

---

---

## 📝 Catatan untuk Pertemuan Selanjutnya

[Jika ada {$jumlahPertemuan} pertemuan dan lebih dari 1 tujuan pembelajaran, jelaskan:

1. **Tujuan Pembelajaran yang Akan Dibahas:**
   Pertemuan berikutnya akan fokus pada [tujuan pembelajaran spesifik berikutnya] dengan tetap menerapkan struktur MEMAHAMI → MENGAPLIKASI → MEREFLEKSI

2. **Kontinuitas:**
   Bagaimana pertemuan berikutnya membangun dari fondasi yang sudah dibuat hari ini?

3. **Persiapan:**
   Apa yang perlu disiapkan siswa untuk pertemuan selanjutnya?]

---

---

## 📝 Asesmen Pembelajaran

**⚠️ SANGAT PENTING - WAJIB DIISI DENGAN DETAIL LENGKAP!**
**Setiap RPP HARUS memiliki 3 jenis asesmen berikut dengan penjelasan yang spesifik dan terukur:**

---

### A. Asesmen Diagnostik (Assessment AS Learning)
**Tujuan:** Mengidentifikasi pengetahuan awal, kesiapan belajar, miskonsepsi, dan kebutuhan khusus siswa SEBELUM pembelajaran dimulai

**Waktu Pelaksanaan:** Di awal pembelajaran (Pendahuluan, sebelum materi disampaikan)

**Fungsi:**
- Mengetahui tingkat pemahaman awal siswa tentang materi yang akan dipelajari
- Mengidentifikasi kesenjangan pengetahuan (gap analysis)
- Mendeteksi miskonsepsi atau kesalahan pemahaman yang perlu diluruskan
- Menyesuaikan strategi pembelajaran berdasarkan kebutuhan siswa

**Teknik yang Digunakan:**
- **Pre-test singkat:** [Jelaskan format tes - pilihan ganda, isian singkat, true/false - dan berapa soal]
- **Tanya jawab interaktif:** [Sebutkan 3-5 pertanyaan diagnostik KONKRET yang akan diajukan ke siswa]
- **Polling digital:** [Jika menggunakan tools seperti Mentimeter, Kahoot, Poll Everywhere - jelaskan pertanyaan yang diajukan]
- **Mind mapping:** [Siswa membuat mind map tentang pemahaman mereka sebelum belajar]
- **KWL Chart (Know-Want-Learned):** [Siswa menuliskan apa yang sudah mereka tahu dan apa yang ingin dipelajari]

**Contoh Pertanyaan Diagnostik SPESIFIK untuk Materi Ini:**
1. [Pertanyaan 1 - tentang konsep dasar yang harus dipahami]
2. [Pertanyaan 2 - tentang pengalaman/pengetahuan prasyarat]
3. [Pertanyaan 3 - tentang aplikasi konsep dalam kehidupan sehari-hari]
4. [Pertanyaan 4 - tentang tools/teknologi yang pernah digunakan]
5. [Pertanyaan 5 - tentang minat dan ekspektasi terhadap pembelajaran]

**Instrumen:**
- **Format:** [Pilih salah satu: Google Form / Kahoot / Quizizz / Lembar kerja / Pertanyaan lisan / Padlet]
- **Durasi:** [X] menit
- **Aspek yang Dinilai:**
  * Pemahaman konsep dasar tentang [topik spesifik]
  * Keterampilan prasyarat: [sebutkan skill apa yang perlu dimiliki]
  * Minat dan motivasi terhadap materi
  * Pengalaman sebelumnya dengan [tools/teknologi/metode]

**Tindak Lanjut Berdasarkan Hasil Diagnostik:**
- **Jika mayoritas siswa sudah paham:** [Strategi: percepat penjelasan dasar, langsung ke aplikasi lanjut]
- **Jika mayoritas siswa belum paham:** [Strategi: tambah waktu penjelasan, gunakan analogi sederhana, praktik bertahap]
- **Jika ada miskonsepsi:** [Strategi: luruskan dengan demonstrasi, diskusi, atau aktivitas pembuktian]
- **Jika ada siswa advanced:** [Strategi: berikan challenge tambahan atau peran sebagai peer tutor]

---

### B. Asesmen Formatif (Assessment FOR Learning)
**Tujuan:** Memantau kemajuan belajar siswa SELAMA proses pembelajaran berlangsung dan memberikan feedback segera untuk perbaikan

**Waktu Pelaksanaan:** Selama proses pembelajaran (Kegiatan Inti - fase Memahami, Mengaplikasi, dan Merefleksi)

**Fungsi:**
- Mengidentifikasi kesulitan belajar siswa secara real-time
- Memberikan feedback korektif segera untuk memperbaiki pemahaman
- Menyesuaikan kecepatan dan metode mengajar berdasarkan respons siswa
- Membantu siswa menyadari kemajuan mereka sendiri (metakognisi)

**Teknik yang Digunakan:**

1. **Observasi Aktivitas Siswa (Proses & Kolaborasi):**
   - **Waktu:** Selama fase Memahami dan Mengaplikasi
   - **Aktivitas yang Diobservasi:** [Sebutkan aktivitas spesifik - misal: saat diskusi kelompok, coding praktik, desain wireframe, konfigurasi jaringan, dll]
   - **Aspek yang Diobservasi:**
     * **Kolaborasi ({$dimensiProfil}):** Pembagian tugas jelas, komunikasi efektif, saling membantu, mendengarkan pendapat
     * **Penalaran Kritis ({$dimensiProfil}):** Analisis masalah logis, evaluasi alternatif solusi, argumentasi dengan bukti
     * **Kemandirian ({$dimensiProfil}):** Inisiatif mencari informasi sendiri, troubleshooting mandiri, tidak bergantung pada guru
     * **Kreativitas ({$dimensiProfil}):** Pendekatan inovatif, solusi original, eksplorasi di luar instruksi

   **Instrumen:** Lembar observasi dengan checklist atau rubrik sederhana (Skala 1-4)
   
   **Contoh Format Observasi:**
   | Nama Siswa | Kolaborasi | Penalaran | Kemandirian | Kreativitas | Catatan |
   |------------|------------|-----------|-------------|-------------|---------|
   | [Nama]     | [1-4]      | [1-4]     | [1-4]       | [1-4]       | [Note]  |

2. **Pertanyaan Formatif Saat Pembelajaran (Probing Questions):**
   - **Waktu:** Saat guru berkeliling mengawasi praktik kelompok
   - **Contoh Pertanyaan KONKRET yang Diajukan:**
     * "Mengapa kalian memilih pendekatan [X] untuk menyelesaikan [Y]?" (Penalaran)
     * "Apa tantangan terbesar yang kalian hadapi sekarang? Sudah coba solusi apa?" (Problem-solving)
     * "Bagaimana kalian membagi peran dalam kelompok? Siapa mengerjakan apa?" (Kolaborasi)
     * "Apakah ada cara lain yang bisa lebih efektif/efisien?" (Critical thinking)
     * "Bagaimana kalian tahu bahwa solusi ini sudah benar?" (Verification & validation)

   **Instrumen:** Catatan anekdotal / Field notes yang dicatat guru

   **Feedback Langsung:**
   - Guru memberikan feedback verbal segera setelah mengobservasi:
     * **Positif:** "Bagus! Cara kalian [X] menunjukkan pemahaman mendalam tentang [Y]"
     * **Korektif:** "Coba perhatikan [X], jika [Y] maka hasilnya akan [Z]. Coba perbaiki bagian ini"
     * **Probing:** "Sudah tepat, tapi coba eksplorasi juga pendekatan [X] untuk membandingkan"

3. **Check-in Points / Exit Tickets (Mini Assessment):**
   - **Waktu:** Di tengah pembelajaran (setelah fase Memahami, sebelum lanjut ke Mengaplikasi)
   - **Format:** Pertanyaan singkat (1-3 soal) untuk mengecek pemahaman
   - **Contoh Pertanyaan:**
     * "Jelaskan dengan kalimat sendiri apa yang dimaksud dengan [konsep X]"
     * "Sebutkan 3 langkah untuk [melakukan Y]"
     * "Apa perbedaan antara [konsep A] dan [konsep B]?"
   - **Media:** Post-it notes / Google Form singkat / Padlet / Mentimeter
   - **Tindak Lanjut:** Jika >50% siswa salah, guru re-explain konsep tersebut sebelum lanjut

4. **Peer Review / Feedback (Penilaian Sesama Siswa):**
   - **Waktu:** Saat presentasi kelompok atau sharing hasil kerja
   - **Proses:** Kelompok lain memberikan feedback konstruktif menggunakan kriteria yang jelas
   - **Kriteria Feedback Spesifik untuk Materi Ini:**
     * [Kriteria 1: misal - Kelengkapan fitur/komponen sesuai spesifikasi]
     * [Kriteria 2: misal - Kerapihan kode/desain/implementasi]
     * [Kriteria 3: misal - Efektivitas solusi dalam menyelesaikan masalah]
     * [Kriteria 4: misal - Kejelasan presentasi dan demo]
   - **Format:** Rubrik sederhana dengan skala 1-4 atau ⭐⭐⭐⭐
   - **Instrumen:** Google Form peer assessment / Lembar kerja terstruktur

5. **Self-Assessment (Penilaian Diri):**
   - **Waktu:** Saat fase Merefleksi (sebelum pembelajaran selesai)
   - **Siswa Menilai Diri Sendiri Berdasarkan:**
     * Pemahaman konsep: "Seberapa paham saya dengan materi hari ini?" (Skala 1-5)
     * Kontribusi dalam kelompok: "Seberapa aktif saya berkontribusi?" (Skala 1-5)
     * Tantangan yang dihadapi dan cara mengatasi
     * Apa yang bisa dilakukan lebih baik lain kali
   - **Instrumen:** Jurnal refleksi digital di [Google Classroom / Notion / Padlet / Microsoft Teams]
   - **Template Refleksi:**
     ```
     1. Konsep/skill baru yang saya pelajari hari ini: [...]
     2. Tingkat pemahaman saya (1-5): [...]
     3. Tantangan terbesar: [...] | Cara mengatasinya: [...]
     4. Kontribusi saya dalam kelompok: [...]
     5. Yang bisa saya perbaiki: [...]
     6. Pertanyaan yang masih belum terjawab: [...]
     ```

6. **Quick Quiz / Formative Test (Opsional):**
   - **Waktu:** Setelah fase Mengaplikasi selesai (sebelum Merefleksi)
   - **Format:** 5-10 pertanyaan singkat (pilihan ganda/isian singkat)
   - **Platform:** Kahoot / Quizizz / Google Form / Socrative
   - **Tujuan:** Mengecek retensi pengetahuan dan kemampuan mengaplikasikan konsep
   - **Tidak untuk nilai akhir** - hanya untuk feedback dan identifikasi area yang perlu diperkuat

**Feedback yang Diberikan:**
- **Timing:** Segera setelah aktivitas (dalam 5-10 menit)
- **Sifat:** Spesifik, konstruktif, actionable
- **Contoh Feedback Baik:**
  * ✅ "Kode kalian sudah bagus, khususnya di bagian [X]. Untuk meningkatkan efisiensi, coba gunakan [Y] daripada [Z]"
  * ❌ "Bagus" (terlalu umum, tidak membantu)
- **Format:** Verbal langsung / Komentar tertulis di Google Classroom / Sticker digital

---

### C. Asesmen Sumatif (Assessment OF Learning)
**Tujuan:** Mengukur dan menilai pencapaian tujuan pembelajaran secara keseluruhan untuk menentukan tingkat kompetensi siswa

**Waktu Pelaksanaan:** Di akhir pembelajaran (Penutup) atau akhir unit/minggu (untuk proyek besar)

**Fungsi:**
- Menentukan apakah siswa sudah mencapai tujuan pembelajaran atau belum
- Memberikan nilai/grade untuk rapor/portofolio
- Mengukur efektivitas pembelajaran secara keseluruhan
- Dokumentasi pencapaian untuk akreditasi dan evaluasi kurikulum

**Teknik yang Digunakan:**

1. **Penilaian Produk/Karya/Project (Performance Assessment):**

   **Produk yang Dinilai:** [Sebutkan output konkret - misal: aplikasi web, desain UI/UX, jaringan terkonfigurasi, video produksi, prototype IoT, dll]

   **Rubrik Penilaian Detail:** (Skala 1-4: Kurang - Cukup - Baik - Sangat Baik)

   | **Aspek Penilaian** | **Sangat Baik (4)** | **Baik (3)** | **Cukup (2)** | **Kurang (1)** |
   |---------------------|---------------------|--------------|---------------|----------------|
   | **Kesesuaian dengan Tujuan Pembelajaran** | [Contoh: Aplikasi memiliki SEMUA fitur sesuai spesifikasi + fitur tambahan inovatif. Menunjukkan pemahaman mendalam tentang konsep] | [Contoh: Aplikasi memiliki SEMUA fitur sesuai spesifikasi. Menunjukkan pemahaman baik] | [Contoh: Aplikasi memiliki SEBAGIAN BESAR fitur (70-80%). Ada beberapa bug minor] | [Contoh: Aplikasi hanya memiliki <70% fitur. Banyak bug. Tidak sesuai spesifikasi] |
   | **Teknis/Implementasi** | [Contoh RPL: Kode bersih, efisien (O-notation optimal), dokumentasi lengkap, mengikuti best practice (SOLID, DRY), error handling baik] | [Contoh: Kode cukup baik, ada dokumentasi, sebagian besar mengikuti best practice] | [Contoh: Kode berfungsi tapi kurang efisien, dokumentasi minimal, beberapa anti-pattern] | [Contoh: Kode sulit dibaca, tidak efisien, tanpa dokumentasi, banyak code smell] |
   | **Kreativitas & Inovasi** | [Contoh: Solusi sangat original, pendekatan unik yang belum pernah diajarkan, ada improvisasi cerdas] | [Contoh: Ada elemen kreatif, beberapa modifikasi dari contoh] | [Contoh: Mengikuti contoh dengan sedikit modifikasi] | [Contoh: Copy-paste persis dari contoh tanpa modifikasi] |
   | **Kolaborasi Tim & Kontribusi** | [Contoh: Kontribusi merata (cek Git commit), komunikasi efektif (cek Discord/chat log), saling membantu, dokumentasi kolaborasi lengkap] | [Contoh: Kontribusi cukup merata (>40% per anggota), ada komunikasi, dokumentasi cukup] | [Contoh: Kontribusi tidak merata (20-40% per anggota), komunikasi minim] | [Contoh: Hanya 1-2 orang kerja, anggota lain pasif, tidak ada komunikasi] |
   | **Presentasi & Komunikasi** | [Contoh: Penjelasan sangat jelas, demo lancar tanpa error, menjawab semua pertanyaan dengan baik, slide/dokumentasi profesional] | [Contoh: Penjelasan cukup jelas, demo lancar, menjawab sebagian besar pertanyaan] | [Contoh: Penjelasan kurang jelas, demo ada error, kesulitan menjawab pertanyaan] | [Contoh: Tidak bisa menjelaskan, demo gagal, tidak bisa menjawab pertanyaan] |

   **Bobot Penilaian:**
   - **Produk/Karya:** [X]% (misal: 40%)
     * Kualitas teknis: [X]%
     * Kelengkapan fitur: [X]%
     * Kreativitas: [X]%
   - **Proses/Kolaborasi:** [X]% (misal: 25%)
     * Observasi selama pembelajaran
     * Kontribusi dalam kelompok
     * Peer assessment
   - **Presentasi:** [X]% (misal: 20%)
     * Kejelasan komunikasi
     * Demo produk
     * Q&A
   - **Refleksi & Dokumentasi:** [X]% (misal: 15%)
     * Jurnal refleksi
     * Dokumentasi teknis
     * Portofolio digital

   **Total: 100%**

2. **Penilaian Presentasi/Demo Produk:**
   - **Durasi:** [X] menit per kelompok
   - **Komponen yang Dinilai:**
     * **Kejelasan Penjelasan:** Apakah konsep dijelaskan dengan logis dan mudah dipahami?
     * **Demonstrasi Teknis:** Apakah produk berfungsi sesuai spesifikasi? Ada bug?
     * **Kemampuan Menjawab Pertanyaan:** Apakah bisa menjelaskan reasoning di balik keputusan teknis?
     * **Profesionalisme:** Slide/dokumentasi rapi, time management baik, bahasa tubuh percaya diri

   **Format:**
   - Presentasi kelompok di depan kelas
   - Demo live (bukan video rekaman) untuk menunjukkan produk bekerja
   - Sesi Q&A dari guru dan siswa lain
   - Penilaian oleh guru + peer assessment

3. **Penilaian Refleksi & Portofolio:**
   - **Komponen:**
     * **Jurnal Refleksi:** Kedalaman analisis tentang proses belajar, tantangan, solusi, pembelajaran yang didapat
     * **Dokumentasi Teknis:** README.md, user manual, API documentation, video tutorial (jika ada)
     * **Portofolio Digital:** Link GitHub/GitLab, screenshot, deployment link (jika web app)
   - **Kriteria:**
     * Kedalaman refleksi: Apakah hanya deskriptif atau ada analisis kritis?
     * Identifikasi kekuatan dan kelemahan dengan jujur
     * Koneksi dengan kehidupan nyata/profesi masa depan
     * Rencana pengembangan diri (action plan)

4. **Post-Test / Ujian Akhir Unit (Opsional):**
   - **Jika Diperlukan:** Untuk mata pelajaran yang membutuhkan penguasaan teori/konsep tertulis
   - **Format:** Pilihan ganda, essay, studi kasus
   - **Cakupan:** Seluruh materi yang diajarkan dalam unit/pertemuan
   - **Bobot:** [X]% dari nilai sumatif (jika ada)

**Konversi Nilai:**
- **Sangat Baik (4):** Nilai 85-100 (A)
- **Baik (3):** Nilai 75-84 (B)
- **Cukup (2):** Nilai 65-74 (C)
- **Kurang (1):** Nilai <65 (D/E) - perlu remedial

**Kriteria Ketuntasan Minimal (KKM):** [Sebutkan KKM untuk mata pelajaran ini - misal: 75]

**Tindak Lanjut:**
- **Siswa yang Tuntas (≥ KKM):** Diberikan tugas pengayaan atau challenge lanjutan
- **Siswa yang Belum Tuntas (< KKM):** Diberikan remedial teaching + remedial test

---

### D. Asesmen Dimensi Profil Pelajar Pancasila
**Dimensi yang Dinilai:** {$dimensiProfil}

**Teknik Penilaian:**

{$dimensiDetail}
[Untuk SETIAP dimensi di atas, jelaskan:
- Indikator perilaku yang diamati (KONKRET)
- Cara penilaian (observasi, self-assessment, peer review)
- Kapan dinilai (saat aktivitas apa)

Contoh untuk Kolaborasi:
✅ **Kolaborasi:**
- **Indikator:**
  * Aktif berkontribusi dalam diskusi kelompok
  * Mendengarkan dan menghargai pendapat teman
  * Membantu anggota kelompok yang kesulitan
  * Menyelesaikan konflik dengan baik
- **Cara Penilaian:** Observasi guru + peer assessment
- **Waktu:** Selama kegiatan kelompok di fase Mengaplikasi]

**Instrumen:** Lembar observasi + Self-assessment + Peer assessment

---

### E. Dokumentasi dan Tindak Lanjut

**Dokumentasi Hasil Belajar:**
- [Screenshot/foto/video produk karya]
- [Kode/file hasil praktik di-upload ke GitHub/Google Drive]
- [Laporan/dokumentasi tertulis]
- [Jurnal refleksi]

**Feedback kepada Siswa:**
- Guru memberikan feedback **spesifik dan konstruktif** kepada setiap kelompok/siswa
- Highlight kekuatan ("Saya terkesan dengan...")
- Saran perbaikan yang actionable ("Untuk meningkatkan X, coba...")
- Apresiasi effort dan progress

**Tindak Lanjut untuk Siswa yang Perlu Pendampingan:**
- [Identifikasi siswa yang membutuhkan bantuan tambahan]
- [Bentuk pendampingan: peer tutoring, konsultasi individual, tugas remidi]
- [Waktu dan cara pelaksanaan]

**Rencana Pengembangan Lebih Lanjut:**
- [Tugas pengayaan untuk siswa yang sudah menguasai]
- [Challenge lanjutan untuk eksplorasi lebih dalam]
- [Koneksi dengan materi pertemuan berikutnya]

---

**📊 Catatan Penting Tentang Asesmen:**

✅ Asesmen bersifat **holistik** - tidak hanya nilai angka, tapi juga process skills dan karakter

✅ Gunakan **multiple forms of assessment** - kombinasi observasi, produk, presentasi, refleksi

✅ Feedback harus **timely dan specific** - diberikan sesegera mungkin setelah aktivitas

✅ Libatkan siswa dalam proses asesmen (self & peer assessment) untuk mengembangkan **metakognisi**

✅ Dokumentasikan semua hasil asesmen untuk **portofolio digital** siswa

---

## ⚠️ REMINDER PENTING TENTANG STRUKTUR:

**Jika ada MULTIPLE TUJUAN PEMBELAJARAN dalam "{$rppData['tujuan_pembelajaran']}":**

📌 **Opsi 1 - Satu Tujuan per Pertemuan (RECOMMENDED):**
```
Pertemuan 1: Tujuan A
  ├─ Pendahuluan (20 menit)
  ├─ Inti (XX menit)
  │   ├─ MEMAHAMI Tujuan A
  │   ├─ MENGAPLIKASI Tujuan A
  │   └─ MEREFLEKSI Tujuan A
  └─ Penutup (30 menit)

Pertemuan 2: Tujuan B
  ├─ Pendahuluan (20 menit)
  ├─ Inti (XX menit)
  │   ├─ MEMAHAMI Tujuan B
  │   ├─ MENGAPLIKASI Tujuan B
  │   └─ MEREFLEKSI Tujuan B
  └─ Penutup (30 menit)
```

📌 **Opsi 2 - Multiple Tujuan dalam Satu Pertemuan (jika tujuan saling terkait erat):**
```
Pertemuan 1: Tujuan A + B
  ├─ Pendahuluan (20 menit)
  ├─ Inti (XX menit)
  │   ├─ MEMAHAMI Tujuan A → MENGAPLIKASI A → MEREFLEKSI A (singkat)
  │   └─ MEMAHAMI Tujuan B → MENGAPLIKASI B → MEREFLEKSI B (singkat)
  └─ Penutup (30 menit) - Refleksi holistik kedua tujuan
```

⚠️ JANGAN lupa bahwa SETIAP tujuan pembelajaran HARUS melewati 3 fase lengkap!

---

---

## ⚠️ CONTOH SPESIFIK vs GENERIK (PELAJARI INI!):

❌ **SALAH (Terlalu Generik):**
"Siswa melakukan diskusi kelompok"
"Siswa menggunakan komputer untuk praktik"
"Guru menjelaskan materi"

✅ **BENAR (Spesifik & Detail):**
"Siswa berdiskusi dalam kelompok (4 orang) tentang **analisis kebutuhan sistem kasir** untuk UMKM 'Warung Makan Ibu Siti', mengidentifikasi 5 fitur utama yang diperlukan (input pesanan, kalkulasi harga, cetak struk, laporan harian, manajemen stok)"

"Siswa menggunakan **Figma** untuk membuat **wireframe low-fidelity** halaman login dengan komponen: logo, form username/password, button 'Masuk', dan link 'Lupa Password'. Setiap siswa membuat minimal 3 varian desain (15 menit)"

"Guru mendemonstrasikan **konfigurasi VLAN 10 dan VLAN 20** di **Cisco Packet Tracer** dengan langkah: 1) Buka CLI Switch, 2) Ketik 'enable', 3) Ketik 'configure terminal', 4) Ketik 'vlan 10', 5) Ketik 'name Marketing'..."

---

**🎯 CHECKLIST SEBELUM KIRIM JAWABAN:**
- [ ] Sudah menyebutkan NAMA tools/software yang digunakan?
- [ ] Sudah menjelaskan LANGKAH-LANGKAH teknis secara detail?
- [ ] Sudah menjelaskan bagaimana SETIAP dimensi profil muncul?
- [ ] Sudah menyebutkan DURASI waktu untuk setiap aktivitas?
- [ ] Sudah membuat problem statement yang SPESIFIK untuk {$namaMapel}?
- [ ] Sudah menjelaskan peran {$kemitraanText} secara KONKRET?
- [ ] Tidak ada kalimat generik seperti "diskusi kelompok" tanpa konteks?

═══════════════════════════════════════════════════════════════════════════
⚠️ PERINGATAN KERAS - BACA DENGAN TELITI!
═══════════════════════════════════════════════════════════════════════════

JANGAN BERHENTI DI TENGAH JALAN!

✅ WAJIB menulis LENGKAP sampai bagian:
1. ✅ PENDAHULUAN (20 menit) - Orientasi, Apersepsi, Motivasi
2. ✅ KEGIATAN INTI ({$waktuInti} menit) - Semua fase pembelajaran sesuai model
3. ✅ PENUTUP (30 menit) - Refleksi, Evaluasi, Tindak Lanjut, Doa Penutup
4. ✅ **ASESMEN PEMBELAJARAN** - SANGAT PENTING! WAJIB ada 3 jenis:
   - **A. Asesmen Diagnostik** (Assessment AS Learning)
   - **B. Asesmen Formatif** (Assessment FOR Learning)
   - **C. Asesmen Sumatif** (Assessment OF Learning)

⚠️ **PERINGATAN KHUSUS UNTUK ASESMEN:**
- Setiap jenis asesmen HARUS dijelaskan dengan DETAIL LENGKAP sesuai format yang sudah diberikan
- JANGAN hanya menulis judul - jelaskan teknik, instrumen, contoh pertanyaan, rubrik penilaian
- ASESMEN adalah bagian WAJIB dari RPP - TIDAK BOLEH dilewati!
- Jika output terpotong sebelum selesai menulis asesmen = GAGAL TOTAL!

**STRUKTUR OUTPUT LENGKAP YANG WAJIB ADA:**
1. Langkah-Langkah Pembelajaran Mendalam (Pendahuluan, Inti, Penutup)
2. Catatan Penting (Dimensi Profil, Outcome, dll)
3. **📝 Asesmen Pembelajaran** ← BAGIAN INI SANGAT PENTING!
   - A. Asesmen Diagnostik (lengkap dengan pertanyaan, instrumen, tindak lanjut)
   - B. Asesmen Formatif (lengkap dengan observasi, feedback, rubrik)
   - C. Asesmen Sumatif (lengkap dengan kriteria penilaian, bobot, rubrik detail)
   - D. Asesmen Dimensi Profil (jika diperlukan)
   - E. Dokumentasi dan Tindak Lanjut

JIKA OUTPUT TERPOTONG = GAGAL!

**MULAI TULIS LANGKAH PEMBELAJARAN SEKARANG - HARUS DETAIL, SPESIFIK, LENGKAP SAMPAI BAGIAN ASESMEN SELESAI!**
PROMPT;

        return $prompt;
    }

    /**
     * Parse generated text from Gemini AI
     * AI returns full Markdown content - we use it directly
     */
    private function parseGeneratedText($text)
    {
        Log::info('Raw AI Response:', ['length' => strlen($text), 'preview' => substr($text, 0, 1000)]);

        // Remove markdown code blocks if present
        $text = preg_replace('/```markdown\s*/i', '', $text);
        $text = preg_replace('/```\s*$/i', '', $text);
        $text = trim($text);

        // AI generates Markdown format, we return it as-is for rendering
        // The frontend will handle Markdown to HTML conversion
        if (!empty($text) && strlen($text) > 100) {
            Log::info('Successfully parsed Markdown response', ['length' => strlen($text)]);

            return [
                'langkah_pembelajaran' => $text,
                'full_content' => $text
            ];
        }

        Log::error('AI response too short or empty, length: ' . strlen($text));

        // Only use fallback if response is truly empty
        return [
            'langkah_pembelajaran' => "# Error: Respons AI Tidak Valid\n\nMohon coba lagi atau hubungi administrator.",
            'full_content' => "Error: Respons dari AI terlalu pendek atau tidak valid."
        ];
    }
}
