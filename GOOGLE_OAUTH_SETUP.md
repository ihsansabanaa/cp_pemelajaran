# Setup Google OAuth Login

## Langkah-langkah untuk mendapatkan Google Client ID dan Secret:

### 1. Buka Google Cloud Console
- Kunjungi: https://console.cloud.google.com/

### 2. Buat Project Baru (atau pilih yang sudah ada)
- Klik "Select a project" di pojok kiri atas
- Klik "NEW PROJECT"
- Beri nama project, misalnya: "CP Pembelajaran"
- Klik "CREATE"

### 3. Aktifkan Google+ API
- Di menu kiri, pilih "APIs & Services" > "Library"
- Cari "Google+ API"
- Klik dan pilih "ENABLE"

### 4. Konfigurasi OAuth Consent Screen
- Di menu kiri, pilih "OAuth consent screen"
- Pilih "External" lalu klik "CREATE"
- Isi informasi:
  - App name: **CP Pembelajaran**
  - User support email: **ajiaji22209@gmail.com**
  - Developer contact email: **ajiaji22209@gmail.com**
- Klik "SAVE AND CONTINUE"
- Di halaman "Scopes", klik "ADD OR REMOVE SCOPES"
  - Pilih: userinfo.email, userinfo.profile, openid
  - Klik "UPDATE"
- Klik "SAVE AND CONTINUE"
- Di halaman "Test users", tambahkan email Anda untuk testing
- Klik "SAVE AND CONTINUE"

### 5. Buat OAuth 2.0 Credentials
- Di menu kiri, pilih "Credentials"
- Klik "CREATE CREDENTIALS" > "OAuth client ID"
- Application type: **Web application**
- Name: **CP Pembelajaran Web Client**
- Authorized JavaScript origins:
  - `http://127.0.0.1:8000`
  - `http://localhost:8000`
- Authorized redirect URIs:
  - `http://127.0.0.1:8000/auth/google/callback`
  - `http://localhost:8000/auth/google/callback`
- Klik "CREATE"

### 6. Salin Client ID dan Client Secret
- Setelah dibuat, akan muncul popup dengan:
  - **Client ID**: (copy ini)
  - **Client Secret**: (copy ini)

### 7. Update file .env
Buka file `.env` dan isi:
```env
GOOGLE_CLIENT_ID=paste_client_id_disini
GOOGLE_CLIENT_SECRET=paste_client_secret_disini
GOOGLE_REDIRECT_URI=http://127.0.0.1:8000/auth/google/callback
```

### 8. Clear Cache Laravel
```bash
php artisan config:clear
php artisan cache:clear
```

### 9. Test Login dengan Google
- Buka browser: http://127.0.0.1:8000/login
- Klik tombol "Login dengan Google"
- Pilih akun Google Anda
- Selesai! Anda akan otomatis login tanpa perlu verifikasi email

## Fitur Login dengan Google:
✅ Login langsung tanpa registrasi manual
✅ Email otomatis terverifikasi
✅ Tidak perlu konfirmasi email
✅ Akun Google langsung bisa akses dashboard
✅ Keamanan dijamin oleh Google OAuth 2.0

## Troubleshooting:
- Jika error "redirect_uri_mismatch": Pastikan URL callback di Google Console sama persis dengan yang di .env
- Jika error "invalid_client": Periksa kembali Client ID dan Secret di .env
- Jika halaman blank setelah login: Check storage/logs/laravel.log untuk error detail
