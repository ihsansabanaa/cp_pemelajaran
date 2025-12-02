# ⚠️ PENTING - Setup Email Verification

## 🔑 Langkah Wajib Sebelum Testing

Anda **HARUS** mengisi **App Password Gmail** di file `.env` terlebih dahulu!

### Cara Mendapatkan App Password:

1. **Buka Google Account** dari akun `gtk1313131@gmail.com`
   - Link: https://myaccount.google.com/security

2. **Aktifkan 2-Step Verification** (jika belum)
   - Klik "2-Step Verification"
   - Ikuti petunjuk untuk mengaktifkan

3. **Generate App Password**
   - Kembali ke Security page
   - Scroll ke bawah, klik **"App passwords"**
   - Atau buka langsung: https://myaccount.google.com/apppasswords
   - Pilih "Mail" dan "Other (Custom name)"
   - Ketik: "Laravel CP Pembelajaran"
   - Klik **Generate**
   - **COPY** 16-character password yang muncul

4. **Update file `.env`**
   ```env
   MAIL_PASSWORD=abcd efgh ijkl mnop  # Paste App Password di sini
   ```
   
   **Hapus semua spasi**, jadi seperti ini:
   ```env
   MAIL_PASSWORD=abcdefghijklmnop
   ```

5. **Clear cache:**
   ```bash
   php artisan config:clear
   ```

## ✅ File `.env` yang Sudah Dikonfigurasi

```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=gtk1313131@gmail.com
MAIL_PASSWORD=your_app_password_here  # ← GANTI INI!
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="gtk1313131@gmail.com"
MAIL_FROM_NAME="CP Pembelajaran"
```

## 🧪 Testing

Setelah setup App Password:

```bash
# 1. Clear cache
php artisan config:clear

# 2. Start server
php artisan serve

# 3. Buka browser
http://localhost:8000/register
```

## 📧 Yang Terjadi Saat Register:

1. User mengisi form register
2. Data disimpan ke database
3. **Email verifikasi otomatis terkirim** dari `gtk1313131@gmail.com`
4. User cek email → klik link verifikasi
5. Email terverifikasi → bisa login
6. Redirect ke dashboard

## ❌ Jika Email Tidak Terkirim

Cek di terminal, akan muncul error seperti:
```
Swift_TransportException: Expected response code 250 but got code "535"
```

**Solusi:**
- App Password salah atau belum diisi
- 2-Step Verification belum aktif
- Ada spasi di MAIL_PASSWORD

---

**Status Saat Ini:**
✅ Routes sudah dibuat  
✅ Controllers sudah dibuat  
✅ Views sudah dibuat  
✅ User model sudah implement MustVerifyEmail  
⚠️ **PERLU:** App Password Gmail di `.env`
