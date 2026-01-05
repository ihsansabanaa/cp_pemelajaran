-- =====================================================
-- UPDATE SEMUA KONEKSI CP DETAIL KE KONSENTRASI KEAHLIAN
-- =====================================================
-- File ini menggabungkan semua update untuk kemudahan eksekusi
-- Tanggal: 11 Desember 2025
-- =====================================================

-- PENTING: Jalankan semua query di bawah ini sekaligus
-- Copy paste semua isi file ini ke phpMyAdmin SQL tab, lalu klik GO

-- =====================================================
-- 1. CEK DATA SEBELUM UPDATE
-- =====================================================
SELECT 'DATA SEBELUM UPDATE' as info;

SELECT 
    cd.id_cp,
    cd.id_mapel,
    LEFT(cd.elemen_cp, 30) as elemen,
    mp.nama_mapel,
    mp.id_konsentrasi,
    mp.id_fase,
    kk.nama_konsentrasi
FROM cp_detail cd
JOIN mata_pelajaran mp ON cd.id_mapel = mp.id_mapel
LEFT JOIN konsentrasi_keahlian kk ON mp.id_konsentrasi = kk.id_konsentrasi
WHERE cd.id_cp IN (5, 6, 7, 8, 10, 11, 13)
ORDER BY cd.id_cp;

-- =====================================================
-- 2. UPDATE SEMUA KONEKSI
-- =====================================================

-- UPDATE 1: Teknik Geomatika (id_cp=5 → id_konsentrasi=57, Fase F)
UPDATE mata_pelajaran mp
INNER JOIN cp_detail cd ON mp.id_mapel = cd.id_mapel
SET mp.id_konsentrasi = 57,
    mp.id_fase = 'F'
WHERE cd.id_cp = 5;

SELECT 'UPDATE 1: Teknik Geomatika - SELESAI' as status;

-- UPDATE 2: Teknik Audio Video (id_cp=6 → id_konsentrasi=27, Fase F)
UPDATE mata_pelajaran mp
INNER JOIN cp_detail cd ON mp.id_mapel = cd.id_mapel
SET mp.id_konsentrasi = 27,
    mp.id_fase = 'F'
WHERE cd.id_cp = 6;

SELECT 'UPDATE 2: Teknik Audio Video - SELESAI' as status;

-- UPDATE 3: Teknik Elektronika Industri (id_cp=7 → id_konsentrasi=29, Fase F)
UPDATE mata_pelajaran mp
INNER JOIN cp_detail cd ON mp.id_mapel = cd.id_mapel
SET mp.id_konsentrasi = 29,
    mp.id_fase = 'F'
WHERE cd.id_cp = 7;

SELECT 'UPDATE 3: Teknik Elektronika Industri - SELESAI' as status;

-- UPDATE 4: Instalasi Tenaga Listrik (id_cp=8 → id_konsentrasi=49, Fase F)
UPDATE mata_pelajaran mp
INNER JOIN cp_detail cd ON mp.id_mapel = cd.id_mapel
SET mp.id_konsentrasi = 49,
    mp.id_fase = 'F'
WHERE cd.id_cp = 8;

SELECT 'UPDATE 4: Instalasi Tenaga Listrik - SELESAI' as status;

-- UPDATE 5: Teknik Kendaraan Ringan (id_cp=10 → id_konsentrasi=16, Fase F)
UPDATE mata_pelajaran mp
INNER JOIN cp_detail cd ON mp.id_mapel = cd.id_mapel
SET mp.id_konsentrasi = 16,
    mp.id_fase = 'F'
WHERE cd.id_cp = 10;

SELECT 'UPDATE 5: Teknik Kendaraan Ringan - SELESAI' as status;

-- UPDATE 6: Otomasi Industri (id_cp=11 → id_konsentrasi=30, Fase F)
UPDATE mata_pelajaran mp
INNER JOIN cp_detail cd ON mp.id_mapel = cd.id_mapel
SET mp.id_konsentrasi = 30,
    mp.id_fase = 'F'
WHERE cd.id_cp = 11;

SELECT 'UPDATE 6: Otomasi Industri - SELESAI' as status;

-- UPDATE 7: Teknik Sepeda Motor (id_cp=13 → id_konsentrasi=17, Fase F)
UPDATE mata_pelajaran mp
INNER JOIN cp_detail cd ON mp.id_mapel = cd.id_mapel
SET mp.id_konsentrasi = 17,
    mp.id_fase = 'F'
WHERE cd.id_cp = 13;

SELECT 'UPDATE 7: Teknik Sepeda Motor - SELESAI' as status;

-- =====================================================
-- 3. VERIFIKASI HASIL UPDATE
-- =====================================================
SELECT 'DATA SETELAH UPDATE' as info;

SELECT 
    cd.id_cp,
    cd.id_mapel,
    LEFT(cd.elemen_cp, 30) as elemen,
    mp.nama_mapel,
    mp.id_konsentrasi,
    mp.id_fase,
    kk.nama_konsentrasi
FROM cp_detail cd
JOIN mata_pelajaran mp ON cd.id_mapel = mp.id_mapel
LEFT JOIN konsentrasi_keahlian kk ON mp.id_konsentrasi = kk.id_konsentrasi
WHERE cd.id_cp IN (5, 6, 7, 8, 10, 11, 13)
ORDER BY cd.id_cp;

-- =====================================================
-- 4. CEK DETAIL PER JURUSAN
-- =====================================================
SELECT '=== RINGKASAN KONEKSI ===' as info;

SELECT 
    CASE cd.id_cp
        WHEN 5 THEN 'Teknik Geomatika'
        WHEN 6 THEN 'Teknik Audio Video'
        WHEN 7 THEN 'Teknik Elektronika Industri'
        WHEN 8 THEN 'Instalasi Tenaga Listrik'
        WHEN 10 THEN 'Teknik Kendaraan Ringan'
        WHEN 11 THEN 'Otomasi Industri'
        WHEN 13 THEN 'Teknik Sepeda Motor'
    END as nama_jurusan,
    cd.id_cp,
    mp.id_konsentrasi,
    mp.id_fase,
    kk.nama_konsentrasi,
    CASE 
        WHEN mp.id_konsentrasi IS NOT NULL AND mp.id_fase = 'F' THEN '✓ BERHASIL'
        ELSE '✗ GAGAL'
    END as status
FROM cp_detail cd
JOIN mata_pelajaran mp ON cd.id_mapel = mp.id_mapel
LEFT JOIN konsentrasi_keahlian kk ON mp.id_konsentrasi = kk.id_konsentrasi
WHERE cd.id_cp IN (5, 6, 7, 8, 10, 11, 13)
ORDER BY cd.id_cp;

-- =====================================================
-- INSTRUKSI EKSEKUSI:
-- =====================================================
-- 1. Buka phpMyAdmin
-- 2. Pilih database Anda
-- 3. Klik tab "SQL"
-- 4. Copy paste SEMUA isi file ini
-- 5. Klik tombol "Go" atau "Kirim"
-- 6. Lihat hasil di bagian bawah, pastikan semua status "✓ BERHASIL"
-- 7. Refresh aplikasi Anda dan coba pilih konsentrasi keahlian lagi
-- =====================================================

-- =====================================================
-- ROLLBACK (Jika perlu dibatalkan)
-- =====================================================
-- Jangan jalankan ini kecuali Anda ingin membatalkan semua update
/*
UPDATE mata_pelajaran mp
INNER JOIN cp_detail cd ON mp.id_mapel = cd.id_mapel
SET mp.id_konsentrasi = NULL,
    mp.id_fase = NULL
WHERE cd.id_cp IN (5, 6, 7, 8, 10, 11, 13);
*/
