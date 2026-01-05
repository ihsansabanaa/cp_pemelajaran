# Update Hubungan CP Detail - Konsentrasi Keahlian DKV

## Tanggal: 11 Desember 2025

## Tujuan
Menghubungkan CP Detail untuk "Desain Komunikasi Visual" (id_cp = 3) ke Konsentrasi Keahlian DKV (id_konsentrasi = 110).

## Struktur Hubungan Database
```
CP Detail (cp_detail) [id_cp = 3]
    ↓ id_mapel
Mata Pelajaran (mata_pelajaran)
    ↓ id_konsentrasi → UPDATE KE 110
Konsentrasi Keahlian (konsentrasi_keahlian) [id_konsentrasi = 110]
    ↓ id_program
Program Keahlian (program_keahlian)
    ↓ id_bidang
Bidang Keahlian (bidang_keahlian)
```

## Langkah-Langkah

### 1. Cek CP Detail untuk DKV
```sql
SELECT * FROM cp_detail WHERE id_cp = 3;
```
**Hasil:** Ambil `id_mapel` dari CP Detail DKV

### 2. Cek Mata Pelajaran DKV
```sql
SELECT id_mapel, nama_mapel, jenis_mapel, id_konsentrasi 
FROM mata_pelajaran 
WHERE id_mapel = (SELECT id_mapel FROM cp_detail WHERE id_cp = 3);
```
**Hasil:** Lihat `id_konsentrasi` yang sekarang terhubung

### 3. Update Koneksi ke DKV (id_konsentrasi = 110)
```sql
UPDATE mata_pelajaran 
SET id_konsentrasi = 110 
WHERE id_mapel = (SELECT id_mapel FROM cp_detail WHERE id_cp = 3 LIMIT 1);
```

### 4. Verifikasi Update
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
WHERE cp.id_cp = 3;
```

## Hasil yang Diharapkan
Setelah update, ketika user memilih:
- **Bidang Keahlian** → [sesuai DKV]
- **Program Keahlian** → [sesuai DKV]
- **Konsentrasi Keahlian** → "Desain Komunikasi Visual" (id_konsentrasi = 110)
- **Mata Pelajaran** → akan muncul dengan CP Detail yang benar (id_cp = 3)

## Catatan
- Pastikan `id_konsentrasi = 110` benar-benar untuk DKV
- Backup data sebelum menjalankan UPDATE
- Test di form RPP setelah update untuk memastikan CP Detail muncul

## Status
✅ **SELESAI** - CP Detail DKV (id_cp=3) sekarang terhubung ke Konsentrasi Keahlian DKV (id_konsentrasi=110)
