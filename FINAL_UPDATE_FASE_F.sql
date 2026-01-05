-- =====================================================
-- UPDATE FINAL - DENGAN id_fase INTEGER 2
-- =====================================================
-- id_fase di tabel fase adalah INTEGER: 1='E' dan 2='F'
-- Fase F (id_fase=2) untuk kelas XI dan XII SMK
-- =====================================================

-- CEK DATA SEBELUM UPDATE
SELECT 'DATA SEBELUM UPDATE' as info;
SELECT 
    cd.id_cp,
    mp.id_mapel,
    mp.nama_mapel,
    mp.id_konsentrasi,
    mp.id_fase
FROM cp_detail cd
JOIN mata_pelajaran mp ON cd.id_mapel = mp.id_mapel
WHERE cd.id_cp IN (5, 6, 7, 8, 10, 11, 13);

-- =====================================================
-- UPDATE DENGAN id_fase = 'F' (STRING)
-- =====================================================

-- UPDATE 1: Teknik Geomatika (id_cp=5 → id_konsentrasi=57, Fase F=2)
SET @mapel_id = NULL;
SELECT id_mapel INTO @mapel_id FROM cp_detail WHERE id_cp = 5 LIMIT 1;
UPDATE mata_pelajaran SET id_konsentrasi = 57, id_fase = 2 WHERE id_mapel = @mapel_id;
SELECT CONCAT('✓ Teknik Geomatika - id_mapel: ', @mapel_id, ' UPDATED') as status;

-- UPDATE 2: Teknik Audio Video (id_cp=6 → id_konsentrasi=27, Fase F=2)
SET @mapel_id = NULL;
SELECT id_mapel INTO @mapel_id FROM cp_detail WHERE id_cp = 6 LIMIT 1;
UPDATE mata_pelajaran SET id_konsentrasi = 27, id_fase = 2 WHERE id_mapel = @mapel_id;
SELECT CONCAT('✓ Teknik Audio Video - id_mapel: ', @mapel_id, ' UPDATED') as status;

-- UPDATE 3: Teknik Elektronika Industri (id_cp=7 → id_konsentrasi=29, Fase F=2)
SET @mapel_id = NULL;
SELECT id_mapel INTO @mapel_id FROM cp_detail WHERE id_cp = 7 LIMIT 1;
UPDATE mata_pelajaran SET id_konsentrasi = 29, id_fase = 2 WHERE id_mapel = @mapel_id;
SELECT CONCAT('✓ Teknik Elektronika Industri - id_mapel: ', @mapel_id, ' UPDATED') as status;

-- UPDATE 4: Instalasi Tenaga Listrik (id_cp=8 → id_konsentrasi=49, Fase F=2)
SET @mapel_id = NULL;
SELECT id_mapel INTO @mapel_id FROM cp_detail WHERE id_cp = 8 LIMIT 1;
UPDATE mata_pelajaran SET id_konsentrasi = 49, id_fase = 2 WHERE id_mapel = @mapel_id;
SELECT CONCAT('✓ Instalasi Tenaga Listrik - id_mapel: ', @mapel_id, ' UPDATED') as status;

-- UPDATE 5: Teknik Kendaraan Ringan (id_cp=10 → id_konsentrasi=16, Fase F=2)
SET @mapel_id = NULL;
SELECT id_mapel INTO @mapel_id FROM cp_detail WHERE id_cp = 10 LIMIT 1;
UPDATE mata_pelajaran SET id_konsentrasi = 16, id_fase = 2 WHERE id_mapel = @mapel_id;
SELECT CONCAT('✓ Teknik Kendaraan Ringan - id_mapel: ', @mapel_id, ' UPDATED') as status;

-- UPDATE 6: Otomasi Industri (id_cp=11 → id_konsentrasi=30, Fase F=2)
SET @mapel_id = NULL;
SELECT id_mapel INTO @mapel_id FROM cp_detail WHERE id_cp = 11 LIMIT 1;
UPDATE mata_pelajaran SET id_konsentrasi = 30, id_fase = 2 WHERE id_mapel = @mapel_id;
SELECT CONCAT('✓ Otomasi Industri - id_mapel: ', @mapel_id, ' UPDATED') as status;

-- UPDATE 7: Teknik Sepeda Motor (id_cp=13 → id_konsentrasi=17, Fase F=2)
SET @mapel_id = NULL;
SELECT id_mapel INTO @mapel_id FROM cp_detail WHERE id_cp = 13 LIMIT 1;
UPDATE mata_pelajaran SET id_konsentrasi = 17, id_fase = 2 WHERE id_mapel = @mapel_id;
SELECT CONCAT('✓ Teknik Sepeda Motor - id_mapel: ', @mapel_id, ' UPDATED') as status;

-- =====================================================
-- VERIFIKASI HASIL LENGKAP
-- =====================================================
SELECT 'DATA SETELAH UPDATE - VERIFIKASI LENGKAP' as info;
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
        WHEN mp.id_konsentrasi IS NOT NULL AND mp.id_fase = 2 THEN '✓ SUKSES'
        WHEN mp.id_konsentrasi IS NULL THEN '✗ id_konsentrasi NULL'
        WHEN mp.id_fase IS NULL THEN '✗ id_fase NULL'
        WHEN mp.id_fase != 2 THEN CONCAT('✗ id_fase = ', mp.id_fase)
        ELSE '✗ ERROR LAIN'
    END as status
FROM cp_detail cd
JOIN mata_pelajaran mp ON cd.id_mapel = mp.id_mapel
LEFT JOIN konsentrasi_keahlian kk ON mp.id_konsentrasi = kk.id_konsentrasi
LEFT JOIN fase f ON mp.id_fase = f.id_fase
WHERE cd.id_cp IN (5, 6, 7, 8, 10, 11, 13)
ORDER BY cd.id_cp;

-- =====================================================
-- RINGKASAN
-- =====================================================
SELECT 'RINGKASAN UPDATE' as info;
SELECT 
    COUNT(*) as total_updated,
    SUM(CASE WHEN mp.id_konsentrasi IS NOT NULL AND mp.id_fase = 2 THEN 1 ELSE 0 END) as sukses,
    SUM(CASE WHEN mp.id_konsentrasi IS NULL OR mp.id_fase IS NULL THEN 1 ELSE 0 END) as gagal
FROM cp_detail cd
JOIN mata_pelajaran mp ON cd.id_mapel = mp.id_mapel
WHERE cd.id_cp IN (5, 6, 7, 8, 10, 11, 13);

-- =====================================================
-- SELESAI!
-- =====================================================
-- Setelah menjalankan SQL ini:
-- 1. Pastikan semua status "✓ SUKSES"
-- 2. Refresh aplikasi Anda
-- 3. Pilih Konsentrasi Keahlian dan Fase F
-- 4. CP Detail seharusnya sudah muncul
-- =====================================================
