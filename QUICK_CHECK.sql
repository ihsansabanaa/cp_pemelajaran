-- =====================================================
-- QUICK CHECK - CEK KENAPA CP TIDAK MUNCUL
-- =====================================================
-- Copy paste query ini satu per satu dan kirim hasilnya
-- =====================================================

-- QUERY 1: Lihat isi tabel FASE
SELECT * FROM fase ORDER BY id_fase;

-- QUERY 2: Lihat CP yang BERHASIL muncul (RPL, TKJ, DPIB)
SELECT 
    cd.id_cp,
    mp.id_mapel,
    mp.nama_mapel,
    mp.id_konsentrasi,
    mp.id_fase,
    kk.nama_konsentrasi,
    f.nama_fase
FROM cp_detail cd
JOIN mata_pelajaran mp ON cd.id_mapel = mp.id_mapel
LEFT JOIN konsentrasi_keahlian kk ON mp.id_konsentrasi = kk.id_konsentrasi
LEFT JOIN fase f ON mp.id_fase = f.id_fase
WHERE cd.id_cp IN (1, 2, 4)
LIMIT 5;

-- QUERY 3: Lihat CP yang TIDAK muncul (Geomatika, Audio Video, dll)
SELECT 
    cd.id_cp,
    mp.id_mapel,
    mp.nama_mapel,
    mp.id_konsentrasi,
    mp.id_fase,
    kk.nama_konsentrasi,
    f.nama_fase
FROM cp_detail cd
JOIN mata_pelajaran mp ON cd.id_mapel = mp.id_mapel
LEFT JOIN konsentrasi_keahlian kk ON mp.id_konsentrasi = kk.id_konsentrasi
LEFT JOIN fase f ON mp.id_fase = f.id_fase
WHERE cd.id_cp IN (5, 6, 7, 8, 10, 11, 13)
LIMIT 10;

-- QUERY 4: Cek id_mapel dari cp_detail yang bermasalah
SELECT id_cp, id_mapel FROM cp_detail WHERE id_cp IN (5, 6, 7, 8, 10, 11, 13);

-- QUERY 5: Cek mata_pelajaran berdasarkan id_mapel dari query 4
-- GANTI 99, 100, 101 dengan id_mapel hasil dari QUERY 4
-- SELECT * FROM mata_pelajaran WHERE id_mapel IN (99, 100, 101);
