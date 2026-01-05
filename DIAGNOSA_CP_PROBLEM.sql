-- =====================================================
-- INVESTIGASI KENAPA CP TIDAK MUNCUL
-- =====================================================
-- Jalankan query ini untuk diagnosa masalah
-- =====================================================

-- 1. CEK APAKAH UPDATE SUDAH JALAN (Cek mata_pelajaran)
SELECT 'CEK MATA_PELAJARAN' as step;
SELECT 
    mp.id_mapel,
    mp.nama_mapel,
    mp.id_konsentrasi,
    mp.id_fase,
    mp.jenis_mapel
FROM mata_pelajaran mp
WHERE mp.id_mapel IN (
    SELECT DISTINCT id_mapel FROM cp_detail WHERE id_cp IN (5, 6, 7, 8, 10, 11, 13)
);

-- 2. CEK CP_DETAIL
SELECT 'CEK CP_DETAIL' as step;
SELECT 
    cd.id_cp,
    cd.id_mapel,
    LEFT(cd.elemen_cp, 50) as elemen_cp,
    LEFT(cd.capaian_pembelajaran, 50) as capaian_pembelajaran
FROM cp_detail cd
WHERE cd.id_cp IN (5, 6, 7, 8, 10, 11, 13);

-- 3. CEK TABEL FASE - APAKAH ADA FASE 'F'?
SELECT 'CEK TABEL FASE' as step;
SELECT * FROM fase;

-- 4. CEK KONSENTRASI KEAHLIAN YANG DICARI
SELECT 'CEK KONSENTRASI KEAHLIAN' as step;
SELECT 
    id_konsentrasi,
    kode_konsentrasi,
    nama_konsentrasi,
    id_program_keahlian
FROM konsentrasi_keahlian
WHERE id_konsentrasi IN (16, 17, 27, 29, 30, 49, 57);

-- 5. CEK JOIN LENGKAP (Query yang sama dengan aplikasi)
SELECT 'CEK JOIN LENGKAP - QUERY APLIKASI' as step;
SELECT 
    cd.id_cp,
    cd.id_mapel,
    LEFT(cd.elemen_cp, 40) as elemen,
    mp.nama_mapel,
    mp.id_konsentrasi,
    mp.id_fase,
    kk.nama_konsentrasi,
    f.nama_fase
FROM cp_detail cd
INNER JOIN mata_pelajaran mp ON cd.id_mapel = mp.id_mapel
LEFT JOIN konsentrasi_keahlian kk ON mp.id_konsentrasi = kk.id_konsentrasi
LEFT JOIN fase f ON mp.id_fase = f.id_fase
WHERE cd.id_cp IN (5, 6, 7, 8, 10, 11, 13);

-- 6. TEST QUERY UNTUK SATU KONSENTRASI (contoh: Teknik Geomatika)
SELECT 'TEST QUERY UNTUK TEKNIK GEOMATIKA (id_konsentrasi=57, id_fase=F)' as step;
SELECT 
    cd.*
FROM cp_detail cd
INNER JOIN mata_pelajaran mp ON cd.id_mapel = mp.id_mapel
WHERE mp.id_konsentrasi = 57
  AND mp.id_fase = 'F';

-- 7. CEK APAKAH id_fase DI TABEL FASE ADALAH 'F' atau INTEGER?
SELECT 'CEK TIPE DATA id_fase' as step;
DESCRIBE fase;
DESCRIBE mata_pelajaran;

-- 8. CEK SEMUA MATA_PELAJARAN DENGAN id_konsentrasi YANG SUDAH DIUPDATE
SELECT 'SEMUA MATA_PELAJARAN DENGAN KONSENTRASI YANG DIUPDATE' as step;
SELECT 
    mp.*
FROM mata_pelajaran mp
WHERE mp.id_konsentrasi IN (16, 17, 27, 29, 30, 49, 57);
