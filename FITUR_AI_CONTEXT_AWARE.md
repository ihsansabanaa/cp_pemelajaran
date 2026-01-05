# Fitur AI Context-Aware untuk RPP

## Deskripsi
Sistem AI sekarang menggunakan konteks dari Capaian Pembelajaran yang dipilih user untuk menghasilkan Langkah-Langkah Pembelajaran yang lebih relevan dan spesifik sesuai dengan jurusan/mata pelajaran.

## Perubahan yang Dilakukan

### 1. Database
- **Migration**: Menambahkan kolom `id_mapel` ke tabel `rpp`
- **Foreign Key**: Relasi ke tabel `mata_pelajaran`

### 2. Model (`app/Models/Rpp.php`)
- Menambahkan `id_mapel` ke `$fillable`
- Sistem sekarang menyimpan mata pelajaran yang dipilih

### 3. Service (`app/Services/GeminiService.php`)
**Method Baru: `getCpContext($idMapel)`**
- Mengambil data CP Detail dari database berdasarkan id_mapel
- Mengembalikan:
  - Nama mata pelajaran
  - Jenis mata pelajaran (kejuruan/umum)
  - Rasional
  - Tujuan pembelajaran
  - Karakteristik
  - Capaian pembelajaran
  - Uraian CP

**Update Method: `buildPrompt($rppData, $cpContext)`**
- Sekarang menerima parameter `$cpContext`
- Menambahkan konteks mata pelajaran ke dalam prompt AI
- Format prompt yang lebih terstruktur:

```
**KONTEKS MATA PELAJARAN:**
- Mata Pelajaran: [Nama Mata Pelajaran]
- Jenis: [kejuruan/umum]
- Capaian Pembelajaran: [CP lengkap]
- Karakteristik: [Karakteristik MP]

**DATA RPP:**
- Dimensi Profil Lulusan
- Tujuan Pembelajaran
- dll...
```

### 4. Controller (`app/Http/Controllers/RppController.php`)
- Update `store()` method untuk mengirim `id_mapel` ke `GeminiService`
- Menyimpan `id_mapel` ke database

### 5. Frontend (`resources/views/dashboard.blade.php`)
**Form RPP:**
- Menambahkan hidden input `id_mapel`

**JavaScript:**
- Update `showRppForm()` untuk menerima parameter `idMapel`
- Mengambil `id_mapel` dari hasil pencarian CP Detail
- Mengirim `id_mapel` saat submit form RPP

## Cara Kerja

### Flow Lengkap:
1. **User memilih** Bidang → Program → Konsentrasi/Mata Pelajaran → Fase
2. **Sistem menampilkan** Capaian Pembelajaran yang sesuai
3. **User mengisi form RPP** (dimensi profil, tujuan, dll.)
4. **User klik tombol Simpan**
5. **Backend mengambil** konteks CP Detail berdasarkan `id_mapel`
6. **AI Gemini menerima** prompt dengan konteks lengkap:
   - Data mata pelajaran (nama, jenis, karakteristik)
   - Capaian pembelajaran
   - Data RPP yang diisi user
7. **AI menghasilkan** Langkah Pembelajaran yang relevan dengan jurusan
8. **Sistem menyimpan** hasil ke database
9. **User melihat** hasil yang spesifik sesuai jurusan

## Contoh Hasil

### Sebelum (Tanpa Konteks):
AI menghasilkan langkah pembelajaran generik tanpa memperhatikan jurusan.

### Sesudah (Dengan Konteks):
**Untuk jurusan RPL (Rekayasa Perangkat Lunak):**
- Memahami: Peserta didik memahami konsep database relational, ERD, dan normalisasi...
- Mengaplikasi: Peserta didik membuat aplikasi CRUD menggunakan framework Laravel...
- Merefleksi: Peserta didik mengevaluasi performa query database...

**Untuk jurusan TKR (Teknik Kendaraan Ringan):**
- Memahami: Peserta didik memahami sistem engine 4-tak, komponen utama, dan prinsip kerja...
- Mengaplikasi: Peserta didik melakukan overhaul engine sesuai SOP...
- Merefleksi: Peserta didik mengevaluasi hasil perbaikan engine...

## Testing
1. Login ke dashboard
2. Pilih mata pelajaran (contoh: Rekayasa Perangkat Lunak)
3. Lihat Capaian Pembelajaran
4. Isi form RPP
5. Klik "Simpan"
6. Perhatikan hasil AI yang generated - harusnya sesuai dengan konteks jurusan RPL

## Teknologi
- **Model AI**: Gemini 2.5 Flash (verified December 2025)
- **API**: Google Generative Language API v1beta
- **Context Window**: 1M tokens
- **Temperature**: 0.7
