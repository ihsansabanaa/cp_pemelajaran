# Update Hubungan CP Detail - Konsentrasi Keahlian

## Tanggal: 10 Desember 2025

## Masalah
CP Detail untuk "Rekayasa Perangkat Lunak" (id_cp = 2) tidak terhubung ke Konsentrasi Keahlian yang benar (id_konsentrasi = 63).

## Analisa
- **CP Detail** (id_cp = 2) → terhubung ke **Mata Pelajaran** (id_mapel = 79)
- **Mata Pelajaran** (id_mapel = 79) → tadinya terhubung ke **id_konsentrasi = 25** (SALAH)
- **Konsentrasi Keahlian** yang benar: **id_konsentrasi = 63** untuk "Rekayasa Perangkat Lunak"

## Struktur Hubungan Database
```
CP Detail (cp_detail)
    ↓ id_mapel
Mata Pelajaran (mata_pelajaran)
    ↓ id_konsentrasi
Konsentrasi Keahlian (konsentrasi_keahlian)
    ↓ id_program
Program Keahlian (program_keahlian)
    ↓ id_bidang
Bidang Keahlian (bidang_keahlian)
```

## Solusi yang Diterapkan
Update field `id_konsentrasi` di tabel `mata_pelajaran` dari 25 → 63:

```sql
UPDATE mata_pelajaran 
SET id_konsentrasi = 63, updated_at = NOW()
WHERE id_mapel = 79;
```

## Hasil Setelah Update

### Data Lengkap Hubungan:
1. **CP Detail** (id_cp = 2)
   - id_mapel: 79
   - Mata Pelajaran: Rekayasa Perangkat Lunak

2. **Mata Pelajaran** (id_mapel = 79)
   - nama_mapel: Rekayasa Perangkat Lunak
   - id_konsentrasi: 63 ✅ (SUDAH BENAR)
   - id_fase: 2

3. **Konsentrasi Keahlian** (id_konsentrasi = 63)
   - nama_konsentrasi: Rekayasa Perangkat Lunak
   - id_program: 20
   - id_bidang: 4

4. **Program Keahlian** (id_program = 20)
   - nama_program: Pengembangan Perangkat Lunak & Gim
   - id_bidang: 4

5. **Bidang Keahlian** (id_bidang = 4)
   - nama_bidang: Teknologi Informasi

## Verifikasi di Aplikasi
Sekarang ketika user mengakses aplikasi dan memilih:
- **Bidang Keahlian**: Teknologi Informasi (id_bidang = 4)
- **Program Keahlian**: Pengembangan Perangkat Lunak & Gim (id_program = 20)
- **Konsentrasi Keahlian**: Rekayasa Perangkat Lunak (id_konsentrasi = 63)
- **Fase**: Fase E (id_fase = 2)

Maka akan muncul **CP Detail** untuk "Rekayasa Perangkat Lunak" dengan:
- Rasional
- Tujuan
- Karakteristik
- Capaian Pembelajaran
- Uraian CP (Basis Data, Pemrograman, Web, Mobile)

## Query API yang Bekerja
```php
POST /api/cp-detail
{
    "id_konsentrasi": 63,
    "id_fase": 2
}
```

Response akan mengembalikan CP Detail id_cp = 2 untuk Rekayasa Perangkat Lunak.

## Status: ✅ SELESAI
CP Detail untuk Rekayasa Perangkat Lunak sekarang sudah terhubung dengan benar ke Konsentrasi Keahlian id_konsentrasi = 63.
