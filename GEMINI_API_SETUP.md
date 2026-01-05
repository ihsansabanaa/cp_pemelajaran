# Panduan Setup Gemini AI API

## Langkah 1: Dapatkan API Key Gemini

1. Buka [Google AI Studio](https://makersuite.google.com/app/apikey)
2. Login dengan akun Google Anda
3. Klik tombol **"Get API Key"** atau **"Create API Key"**
4. Pilih project Google Cloud atau buat project baru
5. Copy API Key yang dihasilkan

## Langkah 2: Tambahkan ke File .env

Buka file `.env` di root project dan tambahkan API key:

```env
GEMINI_API_KEY=your_actual_api_key_here
```

Ganti `your_actual_api_key_here` dengan API key yang sudah Anda copy.

## Langkah 3: Restart Server

Setelah menambahkan API key, restart Laravel development server:

```bash
php artisan serve
```

## Cara Kerja Integrasi AI

1. **User mengisi form RPP** dengan:
   - Dimensi Profil Lulusan
   - Tujuan Pembelajaran
   - Praktik Pedagogis
   - Kemitraan Pembelajaran
   - Lingkungan Pembelajaran
   - Pemanfaatan Digital

2. **Sistem memanggil Gemini AI** dengan prompt terstruktur berdasarkan data RPP

3. **AI menghasilkan Langkah-Langkah Pembelajaran** dengan struktur:
   - **Pengalaman Belajar:**
     - Memahami (konsep dan materi)
     - Mengaplikasi (konstruksi pengetahuan)
     - Merefleksi (evaluasi dan strategi)
   - **Asesmen Pembelajaran** (teknik dan instrumen penilaian)

4. **Hasil ditampilkan** di bawah form RPP secara otomatis

## Troubleshooting

### Error: "Invalid API Key"
- Pastikan API key valid dan aktif
- Cek apakah API key sudah di-copy dengan benar (tanpa spasi)
- Pastikan sudah mengaktifkan Gemini API di Google Cloud Console

### Error: "Quota exceeded"
- Gemini API memiliki limit free tier
- Cek quota di [Google Cloud Console](https://console.cloud.google.com)
- Upgrade ke paid plan jika diperlukan

### Error: "Network timeout"
- Periksa koneksi internet
- Cek firewall yang mungkin memblokir API call
- Tingkatkan timeout di `config/services.php` jika perlu

## Informasi Tambahan

- **Model**: gemini-2.5-flash (stable, verified December 2025)
- **Endpoint**: https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-flash:generateContent
- **Temperature**: 0.7 (keseimbangan kreativitas & konsistensi)
- **Max Tokens**: 2048
- **Context Window**: 1M tokens
- **Note**: Model ini sudah diverifikasi tersedia dan gratis untuk digunakan.

## Dokumentasi Resmi

- [Gemini API Documentation](https://ai.google.dev/docs)
- [Get Started with Gemini API](https://ai.google.dev/tutorials/get_started_web)
- [API Reference](https://ai.google.dev/api/rest)
