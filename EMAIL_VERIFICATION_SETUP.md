# Setup Email Verification - Laravel

## ✅ Fitur yang Sudah Diimplementasikan

1. **Register dengan Email Asli**
   - User harus menggunakan email asli
   - Password minimal 8 karakter
   - Validasi konfirmasi password

2. **Email Verification**
   - Otomatis kirim email verifikasi setelah register
   - Email dikirim dari: `gtk1313131@gmail.com`
   - User harus verifikasi email sebelum bisa login

3. **Login dengan Verifikasi**
   - User harus verifikasi email terlebih dahulu
   - Jika belum verifikasi, akan diarahkan ke halaman verifikasi
   - Fitur "Remember Me"

4. **Dashboard**
   - Hanya bisa diakses setelah login dan verifikasi email
   - Menampilkan badge "Email Terverifikasi"

## 🔧 Cara Setup Gmail SMTP

### 1. Aktifkan 2-Step Verification di Akun Gmail

1. Buka [Google Account Security](https://myaccount.google.com/security)
2. Login dengan akun **gtk1313131@gmail.com**
3. Di bagian "How you sign in to Google", klik **2-Step Verification**
4. Follow petunjuk untuk mengaktifkan

### 2. Buat App Password untuk Laravel

1. Setelah 2-Step Verification aktif, kembali ke [Security Settings](https://myaccount.google.com/security)
2. Scroll ke bawah, klik **App passwords** (atau buka langsung: https://myaccount.google.com/apppasswords)
3. Pilih "Mail" dan "Windows Computer" (atau Other)
4. Klik **Generate**
5. **Copy 16-character password** yang muncul

### 3. Update File .env

Buka file `.env` dan update bagian MAIL seperti ini:

```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=gtk1313131@gmail.com
MAIL_PASSWORD=xxxx xxxx xxxx xxxx  # Paste App Password di sini (16 karakter)
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="gtk1313131@gmail.com"
MAIL_FROM_NAME="CP Pembelajaran"
```

**PENTING:** Ganti `xxxx xxxx xxxx xxxx` dengan App Password yang sudah di-generate!

### 4. Clear Cache & Test

```bash
php artisan config:clear
php artisan cache:clear
```

## 📝 Testing

1. **Test Register:**
   ```
   http://localhost:8000/register
   ```
   - Isi form dengan email asli Anda
   - Submit form
   - Cek email untuk link verifikasi

2. **Test Email Verification:**
   - Buka email dari gtk1313131@gmail.com
   - Klik link verifikasi
   - Akan redirect ke dashboard

3. **Test Login:**
   ```
   http://localhost:8000/login
   ```
   - Login dengan email dan password
   - Jika belum verifikasi, akan muncul peringatan
   - Jika sudah verifikasi, masuk ke dashboard

## 🎯 Routes yang Tersedia

| Route | Method | Keterangan |
|-------|--------|------------|
| `/register` | GET, POST | Halaman & proses registrasi |
| `/login` | GET, POST | Halaman & proses login |
| `/logout` | POST | Logout user |
| `/email/verify` | GET | Halaman pemberitahuan verifikasi |
| `/email/verify/{id}/{hash}` | GET | Link verifikasi dari email |
| `/email/verification-notification` | POST | Kirim ulang email verifikasi |
| `/dashboard` | GET | Dashboard (perlu auth + verified) |

## 🔐 Middleware

- `guest` - Hanya untuk user yang belum login (register, login)
- `auth` - Hanya untuk user yang sudah login
- `verified` - Hanya untuk user yang sudah verifikasi email

## ⚠️ Troubleshooting

### Email tidak terkirim?
1. Pastikan App Password sudah benar
2. Pastikan 2-Step Verification aktif
3. Cek file `.env` tidak ada spasi extra
4. Jalankan `php artisan config:clear`

### Link verifikasi tidak bekerja?
1. Pastikan `APP_URL` di `.env` sudah sesuai
2. Link verifikasi hanya valid untuk user yang sama
3. Link menggunakan signed URL untuk keamanan

### Gagal login setelah verifikasi?
1. Cek database, kolom `email_verified_at` harus terisi
2. Clear session: `php artisan session:clear`
3. Logout dan login kembali

## 📧 Format Email Verifikasi

Email yang dikirim akan berisi:
- Subject: "Verify Email Address"
- Dari: gtk1313131@gmail.com
- Isi: Link verifikasi yang harus diklik
- Link valid selama 60 menit

## 🚀 Menjalankan Aplikasi

```bash
# Start development server
php artisan serve

# Akses di browser
http://localhost:8000
```

---

**Dibuat untuk:** CP Pembelajaran SMK  
**Email Sender:** gtk1313131@gmail.com  
**Framework:** Laravel 12.x
