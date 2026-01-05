# Update Hubungan CP Detail - Konsentrasi Keahlian DPIB

## Tanggal: 11 Desember 2025

## Tujuan
Menghubungkan CP Detail untuk "Desain Pemodelan dan Informasi Bangunan" (id_cp = 4) ke Konsentrasi Keahlian DPIB (id_konsentrasi = 6).

## Struktur Hubungan Database
```
CP Detail (cp_detail) [id_cp = 4]
    ↓ id_mapel
Mata Pelajaran (mata_pelajaran)
    ↓ id_konsentrasi → UPDATE KE 6
Konsentrasi Keahlian (konsentrasi_keahlian) [id_konsentrasi = 6]
    ↓ id_program
Program Keahlian (program_keahlian)
    ↓ id_bidang
Bidang Keahlian (bidang_keahlian)
```

## Langkah-Langkah

### 1. Cek CP Detail untuk DPIB
```sql
SELECT * FROM cp_detail WHERE id_cp = 4;
```

### 2. Update Koneksi ke DPIB (id_konsentrasi = 6)
```sql
UPDATE mata_pelajaran 
SET id_konsentrasi = 6 
WHERE id_mapel = (SELECT id_mapel FROM cp_detail WHERE id_cp = 4 LIMIT 1);
```

### 3. Verifikasi Update
```sql
SELECT 
    cp.id_cp,
    cp.capaian_pembelajaran,
    mp.id_mapel,
    mp.nama_mapel,
    mp.id_konsentrasi,
    kk.nama_konsentrasi,
    pk.nama_program,
    bk.nama_bidang
FROM cp_detail cp
JOIN mata_pelajaran mp ON cp.id_mapel = mp.id_mapel
JOIN konsentrasi_keahlian kk ON mp.id_konsentrasi = kk.id_konsentrasi
JOIN program_keahlian pk ON kk.id_program = pk.id_program
JOIN bidang_keahlian bk ON pk.id_bidang = bk.id_bidang
WHERE cp.id_cp = 4;
```

## Hasil yang Diharapkan
Setelah update, ketika user memilih:
- **Bidang Keahlian** → Teknologi Konstruksi dan Properti (atau sesuai DPIB)
- **Program Keahlian** → [sesuai DPIB]
- **Konsentrasi Keahlian** → "Desain Pemodelan dan Informasi Bangunan" (id_konsentrasi = 6)
- **Mata Pelajaran** → akan muncul dengan CP Detail yang benar (id_cp = 4)

## Cara Menjalankan

### Via phpMyAdmin:
1. Buka phpMyAdmin
2. Pilih database aplikasi
3. Jalankan query di file `update_dpib_connection.sql` satu per satu
4. Perhatikan hasil setiap query

### Via Terminal:
```bash
mysql -u root -p
use nama_database;
source update_dpib_connection.sql;
```

## Status
✅ **SIAP DIJALANKAN** - File SQL sudah dibuat untuk menghubungkan CP Detail DPIB (id_cp=4) ke Konsentrasi Keahlian DPIB (id_konsentrasi=6)
