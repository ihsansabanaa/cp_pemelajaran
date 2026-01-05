-- =====================================================
-- SOLUSI ALTERNATIF - UPDATE DENGAN CARA 2 STEP
-- =====================================================
-- Gunakan temporary variable untuk menghindari subquery error
-- =====================================================

-- CEK DULU ISI TABEL FASE
SELECT 'ISI TABEL FASE:' as info;
SELECT * FROM fase;

-- =====================================================
-- METODE 1: Update satu-satu dengan variable
-- =====================================================

-- UPDATE 1: Teknik Geomatika (id_cp = 5)
SET @mapel_id = NULL;
SELECT id_mapel INTO @mapel_id FROM cp_detail WHERE id_cp = 5 LIMIT 1;
SELECT @mapel_id as 'ID Mapel Geomatika';
UPDATE mata_pelajaran SET id_konsentrasi = 57, id_fase = 6 WHERE id_mapel = @mapel_id;

-- UPDATE 2: Teknik Audio Video (id_cp = 6)
SET @mapel_id = NULL;
SELECT id_mapel INTO @mapel_id FROM cp_detail WHERE id_cp = 6 LIMIT 1;
SELECT @mapel_id as 'ID Mapel Audio Video';
UPDATE mata_pelajaran SET id_konsentrasi = 27, id_fase = 6 WHERE id_mapel = @mapel_id;

-- UPDATE 3: Teknik Elektronika Industri (id_cp = 7)
SET @mapel_id = NULL;
SELECT id_mapel INTO @mapel_id FROM cp_detail WHERE id_cp = 7 LIMIT 1;
SELECT @mapel_id as 'ID Mapel Elektronika Industri';
UPDATE mata_pelajaran SET id_konsentrasi = 29, id_fase = 6 WHERE id_mapel = @mapel_id;

-- UPDATE 4: Instalasi Tenaga Listrik (id_cp = 8)
SET @mapel_id = NULL;
SELECT id_mapel INTO @mapel_id FROM cp_detail WHERE id_cp = 8 LIMIT 1;
SELECT @mapel_id as 'ID Mapel Instalasi Tenaga Listrik';
UPDATE mata_pelajaran SET id_konsentrasi = 49, id_fase = 6 WHERE id_mapel = @mapel_id;

-- UPDATE 5: Teknik Kendaraan Ringan (id_cp = 10)
SET @mapel_id = NULL;
SELECT id_mapel INTO @mapel_id FROM cp_detail WHERE id_cp = 10 LIMIT 1;
SELECT @mapel_id as 'ID Mapel Kendaraan Ringan';
UPDATE mata_pelajaran SET id_konsentrasi = 16, id_fase = 6 WHERE id_mapel = @mapel_id;

-- UPDATE 6: Otomasi Industri (id_cp = 11)
SET @mapel_id = NULL;
SELECT id_mapel INTO @mapel_id FROM cp_detail WHERE id_cp = 11 LIMIT 1;
SELECT @mapel_id as 'ID Mapel Otomasi Industri';
UPDATE mata_pelajaran SET id_konsentrasi = 30, id_fase = 6 WHERE id_mapel = @mapel_id;

-- UPDATE 7: Teknik Sepeda Motor (id_cp = 13)
SET @mapel_id = NULL;
SELECT id_mapel INTO @mapel_id FROM cp_detail WHERE id_cp = 13 LIMIT 1;
SELECT @mapel_id as 'ID Mapel Sepeda Motor';
UPDATE mata_pelajaran SET id_konsentrasi = 17, id_fase = 6 WHERE id_mapel = @mapel_id;

-- =====================================================
-- VERIFIKASI HASIL
-- =====================================================
SELECT 'HASIL UPDATE:' as info;
SELECT 
    cd.id_cp,
    CASE cd.id_cp
        WHEN 5 THEN 'Teknik Geomatika'
        WHEN 6 THEN 'Teknik Audio Video'
        WHEN 7 THEN 'Teknik Elektronika Industri'
        WHEN 8 THEN 'Instalasi Tenaga Listrik'
        WHEN 10 THEN 'Teknik Kendaraan Ringan'
        WHEN 11 THEN 'Otomasi Industri'
        WHEN 13 THEN 'Teknik Sepeda Motor'
    END as nama_jurusan,
    mp.id_mapel,
    mp.nama_mapel,
    mp.id_konsentrasi,
    mp.id_fase,
    kk.nama_konsentrasi,
    f.nama_fase,
    CASE 
        WHEN mp.id_konsentrasi IS NOT NULL AND mp.id_fase IS NOT NULL THEN '✓ OK'
        ELSE '✗ ERROR'
    END as status
FROM cp_detail cd
JOIN mata_pelajaran mp ON cd.id_mapel = mp.id_mapel
LEFT JOIN konsentrasi_keahlian kk ON mp.id_konsentrasi = kk.id_konsentrasi
LEFT JOIN fase f ON mp.id_fase = f.id_fase
WHERE cd.id_cp IN (5, 6, 7, 8, 10, 11, 13)
ORDER BY cd.id_cp;

-- =====================================================
-- CATATAN PENTING:
-- =====================================================
-- 1. Jika id_fase Fase F bukan 6, ganti semua angka 6 di atas dengan id_fase yang benar
-- 2. Jalankan query "SELECT * FROM fase;" dulu untuk tahu id_fase Fase F
-- 3. Jika Fase F = 'F' (string bukan integer), ganti angka 6 dengan 'F'
-- =====================================================
