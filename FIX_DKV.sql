-- =====================================================
-- UPDATE DKV - PERBAIKI id_konsentrasi
-- =====================================================
-- Saat ini: id_konsentrasi = 55 (SALAH)
-- Seharusnya: id_konsentrasi = 110 (DKV)
-- id_fase = 2 (sudah benar)
-- =====================================================

-- CEK DATA SEBELUM UPDATE
SELECT 'DATA DKV SEBELUM UPDATE' as info;
SELECT 
    cd.id_cp,
    mp.id_mapel,
    mp.nama_mapel,
    mp.id_konsentrasi,
    mp.id_fase
FROM cp_detail cd
JOIN mata_pelajaran mp ON cd.id_mapel = mp.id_mapel
WHERE cd.id_cp = 3;

-- UPDATE DKV: id_cp=3 → id_konsentrasi=110
SET @mapel_id = NULL;
SELECT id_mapel INTO @mapel_id FROM cp_detail WHERE id_cp = 3 LIMIT 1;
UPDATE mata_pelajaran SET id_konsentrasi = 110 WHERE id_mapel = @mapel_id;
SELECT CONCAT('✓ DKV - id_mapel: ', @mapel_id, ' UPDATED ke id_konsentrasi = 110') as status;

-- VERIFIKASI HASIL
SELECT 'DATA DKV SETELAH UPDATE' as info;
SELECT 
    cd.id_cp,
    mp.id_mapel,
    mp.nama_mapel,
    mp.id_konsentrasi,
    mp.id_fase,
    kk.nama_konsentrasi
FROM cp_detail cd
JOIN mata_pelajaran mp ON cd.id_mapel = mp.id_mapel
LEFT JOIN konsentrasi_keahlian kk ON mp.id_konsentrasi = kk.id_konsentrasi
WHERE cd.id_cp = 3;

-- TEST QUERY APLIKASI
SELECT 'TEST QUERY APLIKASI DKV (id_konsentrasi=110, id_fase=2)' as info;
SELECT COUNT(*) as jumlah_cp_detail
FROM cp_detail cd
INNER JOIN mata_pelajaran mp ON cd.id_mapel = mp.id_mapel
WHERE mp.id_konsentrasi = 110
  AND mp.id_fase = 2;
