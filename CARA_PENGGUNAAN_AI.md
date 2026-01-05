# Cara Menggunakan Fitur AI-Generated Langkah Pembelajaran

## Langkah-Langkah Penggunaan

### 1. Cari Capaian Pembelajaran (CP)

**Untuk Mata Pelajaran Kejuruan:**
- Pilih tab **"Kejuruan"**
- Pilih **Bidang Keahlian** (contoh: Teknologi Informasi dan Komunikasi)
- Pilih **Program Keahlian** (contoh: Teknik Komputer dan Informatika)
- Pilih **Konsentrasi Keahlian** (contoh: Teknik Komputer dan Jaringan)
- Klik tombol **"Cari CP"**

**Untuk Mata Pelajaran Umum:**
- Pilih tab **"Umum"**
- Pilih **Fase** (E atau F)
- Pilih **Mata Pelajaran** (contoh: Matematika, Bahasa Indonesia)
- Klik tombol **"Cari CP"**

### 2. Lihat Hasil Capaian Pembelajaran

Setelah klik "Cari CP", sistem akan menampilkan:
- Daftar Capaian Pembelajaran yang tersedia
- Detail CP per mata pelajaran dan fase
- Card hasil dengan informasi lengkap

### 3. Isi Form RPP

Setelah hasil CP muncul, scroll ke bawah dan Anda akan melihat **Form RPP**. Lengkapi form dengan:

#### A. Identifikasi (Wajib)
**Dimensi Profil Lulusan** - Pilih minimal 1 dimensi:
- ☑️ Keimanan dan Ketakwaan terhadap Tuhan YME
- ☑️ Penalaran Kritis
- ☑️ Kolaborasi
- ☑️ Kesehatan
- ☑️ Kewargaan
- ☑️ Kreativitas
- ☑️ Kemandirian
- ☑️ Komunikasi

#### B. Desain Pembelajaran

1. **Tujuan Pembelajaran** (Wajib)
   ```
   Contoh: 
   Peserta didik mampu menganalisis prinsip dasar pemrograman 
   berorientasi objek dan mengimplementasikannya dalam proyek 
   aplikasi sederhana dengan menggunakan Java.
   ```

2. **Praktik Pedagogis** (Wajib)
   ```
   Contoh:
   Model pembelajaran berbasis proyek (Project Based Learning) 
   dengan pendekatan kolaboratif. Peserta didik bekerja dalam 
   kelompok kecil untuk mengembangkan aplikasi nyata.
   ```

3. **Kemitraan Pembelajaran** (Opsional)
   ```
   Contoh:
   Kolaborasi dengan industri IT lokal untuk memberikan mentoring 
   dan feedback terhadap proyek aplikasi yang dikembangkan peserta 
   didik.
   ```

4. **Lingkungan Pembelajaran** (Wajib)
   ```
   Contoh:
   Ruang kelas laboratorium komputer dengan layout kelompok, 
   dilengkapi whiteboard digital untuk presentasi dan diskusi. 
   Suasana kondusif untuk eksperimen dan kolaborasi.
   ```

5. **Pemanfaatan Digital** (Opsional)
   ```
   Contoh:
   Penggunaan GitHub untuk version control dan kolaborasi coding, 
   IntelliJ IDEA sebagai IDE, Google Classroom untuk sharing materi, 
   dan Discord untuk komunikasi tim.
   ```

### 4. Simpan RPP

- Pastikan semua field yang wajib sudah diisi
- Klik tombol **"Simpan RPP"**
- Sistem akan menyimpan data RPP Anda

### 5. AI Akan Generate Langkah Pembelajaran

Setelah RPP tersimpan:

1. **Loading State** 
   - Anda akan melihat animasi loading
   - Pesan: "🤖 AI sedang membuat langkah pembelajaran..."
   - Proses ini memakan waktu beberapa detik

2. **Hasil AI Muncul**
   
   Card **"Langkah-Langkah Pembelajaran"** akan menampilkan:

   **📚 Pengalaman Belajar**
   
   - **1. Memahami**
     - Kegiatan untuk memahami konsep dan materi
     - Berdasarkan prinsip pembelajaran berkesadaran
     
   - **2. Mengaplikasi**
     - Kegiatan mengonstruksi pengetahuan dan aplikasi
     - Pembelajaran bermakna melalui praktik nyata
     
   - **3. Merefleksi**
     - Mengevaluasi dan memaknai proses serta hasil
     - Mengelola proses belajar dan strategi ke depan

   **📝 Asesmen Pembelajaran**
   - Teknik penilaian (awal, proses, akhir pembelajaran)
   - Format assessment: 
     - Assessment as Learning (self-assessment)
     - Assessment for Learning (formatif)
     - Assessment of Learning (sumatif)
   - Contoh instrumen: Penilaian Sejawat, Penilaian Diri, Proyek, Produk, Observasi, dll.

### 6. Fitur Tambahan

**Cetak Dokumen**
- Klik tombol **"Cetak"** untuk print langkah pembelajaran
- Dokumen akan terbuka dalam mode print preview

**Generate Ulang** (Coming Soon)
- Jika hasil kurang sesuai, klik **"Generate Ulang"**
- AI akan membuat versi baru dengan variasi berbeda

## Tips Menggunakan AI

### Untuk Hasil Optimal:

1. **Isi form RPP sedetail mungkin**
   - Semakin lengkap input, semakin kontekstual output AI
   - Gunakan kalimat yang jelas dan spesifik

2. **Gunakan contoh konkret**
   - Sebutkan nama tools/aplikasi yang akan digunakan
   - Jelaskan metode pembelajaran secara spesifik

3. **Sesuaikan dengan konteks**
   - Pilih dimensi profil yang relevan dengan materi
   - Pastikan tujuan pembelajaran SMART (Specific, Measurable, Achievable, Relevant, Time-bound)

4. **Review hasil AI**
   - AI memberikan draft awal yang solid
   - Anda dapat menyesuaikan/edit sesuai kebutuhan kelas
   - Kombinasikan dengan pengalaman mengajar Anda

## Catatan Penting

⚠️ **Pastikan API Key Gemini sudah dikonfigurasi**
- Cek file `.env` → `GEMINI_API_KEY` harus terisi
- Lihat `GEMINI_API_SETUP.md` untuk panduan lengkap

⚠️ **Koneksi Internet Diperlukan**
- AI membutuhkan koneksi untuk generate konten
- Pastikan internet stabil saat klik "Simpan RPP"

⚠️ **Hasil AI Adalah Rekomendasi**
- Gunakan sebagai starting point
- Sesuaikan dengan karakteristik peserta didik Anda
- Tambahkan sentuhan personal dari pengalaman mengajar

## Troubleshooting

**❌ Form tidak bisa di-submit**
- Cek apakah semua field wajib sudah diisi (*)
- Pastikan minimal 1 dimensi profil dipilih

**❌ Loading terlalu lama**
- Cek koneksi internet
- Refresh halaman dan coba lagi
- Hubungi administrator jika masalah berlanjut

**❌ Hasil AI tidak muncul**
- Cek API Key di `.env`
- Lihat console browser (F12) untuk error details
- Pastikan quota API belum habis

## Contoh Hasil AI

Berikut preview singkat hasil yang akan dihasilkan AI:

### Memahami
```
Peserta didik diajak untuk mengeksplorasi konsep pemrograman 
berorientasi objek melalui analogi kehidupan nyata (contoh: 
mobil sebagai objek dengan atribut dan method). Guru memberikan 
penjelasan interaktif dengan diagram UML sederhana dan video 
tutorial singkat.
```

### Mengaplikasi
```
Dalam kelompok, peserta didik merancang class diagram untuk 
aplikasi sederhana (contoh: sistem perpustakaan mini). Setiap 
kelompok kemudian mengimplementasikan design mereka ke dalam 
kode Java, sambil berkolaborasi menggunakan GitHub untuk version 
control.
```

### Merefleksi
```
a) Setiap peserta didik mempresentasikan 1 tantangan yang 
dihadapi dan solusi yang ditemukan. Kelompok melakukan peer 
review terhadap kode satu sama lain.

b) Peserta didik menulis jurnal refleksi singkat tentang 
proses pembelajaran, mencatat strategi yang efektif dan area 
yang perlu diperbaiki untuk proyek berikutnya.
```

### Asesmen
```
1. Assessment As Learning: Self-assessment checklist untuk 
   evaluasi pemahaman OOP concepts

2. Assessment For Learning: Observasi proses kolaborasi dalam 
   kelompok, feedback berkala terhadap progress coding

3. Assessment Of Learning: Penilaian proyek akhir berdasarkan 
   rubrik (design, implementasi, kolaborasi, presentasi)
```

## Support

Jika ada pertanyaan atau menemui kendala, hubungi:
- Administrator Sistem
- Email: support@cppembelajaran.com
- WhatsApp: +62-xxx-xxxx-xxxx

---

**Selamat menggunakan fitur AI untuk mempermudah pembuatan RPP Anda! 🎉**
