-- =====================================================
-- DEBUG: CEK KENAPA DKV TIDAK MUNCUL
-- =====================================================

-- 1. CEK KONSENTRASI KEAHLIAN DKV (id_konsentrasi = 110)
SELECT 'CEK KONSENTRASI DKV' as info;
SELECT * FROM konsentrasi_keahlian WHERE id_konsentrasi = 110;

-- 2. CEK CP_DETAIL DKV (id_cp = 3)
SELECT 'CEK CP_DETAIL DKV' as info;
SELECT * FROM cp_detail WHERE id_cp = 3 LIMIT 3;

-- 3. CEK MATA_PELAJARAN DARI CP_DETAIL DKV
SELECT 'CEK MATA_PELAJARAN DKV' as info;
SELECT 
    mp.*
FROM mata_pelajaran mp
WHERE mp.id_mapel = (SELECT id_mapel FROM cp_detail WHERE id_cp = 3 LIMIT 1);

-- 4. CEK APAKAH QUERY JOIN BERHASIL
SELECT 'CEK JOIN DKV' as info;
SELECT 
    cd.id_cp,
    cd.id_mapel,
    mp.nama_mapel,
    mp.id_konsentrasi,
    mp.id_fase,
    kk.nama_konsentrasi
FROM cp_detail cd
JOIN mata_pelajaran mp ON cd.id_mapel = mp.id_mapel
LEFT JOIN konsentrasi_keahlian kk ON mp.id_konsentrasi = kk.id_konsentrasi
WHERE cd.id_cp = 3;

-- 5. TEST QUERY YANG DIPAKAI APLIKASI UNTUK DKV
SELECT 'TEST QUERY APLIKASI DKV (id_konsentrasi=110, id_fase=2)' as info;
SELECT 
    cd.*
FROM cp_detail cd
INNER JOIN mata_pelajaran mp ON cd.id_mapel = mp.id_mapel
WHERE mp.id_konsentrasi = 110
  AND mp.id_fase = 2;

-- 6. CEK SEMUA MATA_PELAJARAN DENGAN id_konsentrasi = 110
SELECT 'SEMUA MATA_PELAJARAN DI KONSENTRASI DKV' as info;
SELECT * FROM mata_pelajaran WHERE id_konsentrasi = 110;

-- =====================================================
-- INSTRUKSI:
-- Jalankan query ini dan kirim hasilnya ke saya
-- Terutama hasil dari query nomor 4 dan 5
-- =====================================================
