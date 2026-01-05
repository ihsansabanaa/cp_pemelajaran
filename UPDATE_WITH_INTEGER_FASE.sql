-- =====================================================
-- UPDATE DENGAN ID_FASE INTEGER (JIKA FASE F = 6)
-- =====================================================

-- LANGKAH 1: CEK DULU ID_FASE UNTUK FASE F
SELECT * FROM fase WHERE nama_fase LIKE '%F%' OR kode_fase = 'F' OR id_fase = 6;

-- LANGKAH 2: SETELAH TAU ID_FASE FASE F, GANTI ANGKA 6 DI BAWAH DENGAN ID YANG BENAR
-- Misalnya jika Fase F punya id_fase = 6, maka:

-- UPDATE 1: Teknik Geomatika
UPDATE mata_pelajaran mp
INNER JOIN cp_detail cd ON mp.id_mapel = cd.id_mapel
SET mp.id_konsentrasi = 57,
    mp.id_fase = 6  -- GANTI 6 dengan id_fase yang benar untuk Fase F
WHERE cd.id_cp = 5;

-- UPDATE 2: Teknik Audio Video
UPDATE mata_pelajaran mp
INNER JOIN cp_detail cd ON mp.id_mapel = cd.id_mapel
SET mp.id_konsentrasi = 27,
    mp.id_fase = 6  -- GANTI 6 dengan id_fase yang benar untuk Fase F
WHERE cd.id_cp = 6;

-- UPDATE 3: Teknik Elektronika Industri
UPDATE mata_pelajaran mp
INNER JOIN cp_detail cd ON mp.id_mapel = cd.id_mapel
SET mp.id_konsentrasi = 29,
    mp.id_fase = 6  -- GANTI 6 dengan id_fase yang benar untuk Fase F
WHERE cd.id_cp = 7;

-- UPDATE 4: Instalasi Tenaga Listrik
UPDATE mata_pelajaran mp
INNER JOIN cp_detail cd ON mp.id_mapel = cd.id_mapel
SET mp.id_konsentrasi = 49,
    mp.id_fase = 6  -- GANTI 6 dengan id_fase yang benar untuk Fase F
WHERE cd.id_cp = 8;

-- UPDATE 5: Teknik Kendaraan Ringan
UPDATE mata_pelajaran mp
INNER JOIN cp_detail cd ON mp.id_mapel = cd.id_mapel
SET mp.id_konsentrasi = 16,
    mp.id_fase = 6  -- GANTI 6 dengan id_fase yang benar untuk Fase F
WHERE cd.id_cp = 10;

-- UPDATE 6: Otomasi Industri
UPDATE mata_pelajaran mp
INNER JOIN cp_detail cd ON mp.id_mapel = cd.id_mapel
SET mp.id_konsentrasi = 30,
    mp.id_fase = 6  -- GANTI 6 dengan id_fase yang benar untuk Fase F
WHERE cd.id_cp = 11;

-- UPDATE 7: Teknik Sepeda Motor
UPDATE mata_pelajaran mp
INNER JOIN cp_detail cd ON mp.id_mapel = cd.id_mapel
SET mp.id_konsentrasi = 17,
    mp.id_fase = 6  -- GANTI 6 dengan id_fase yang benar untuk Fase F
WHERE cd.id_cp = 13;

-- VERIFIKASI
SELECT 
    cd.id_cp,
    mp.nama_mapel,
    mp.id_konsentrasi,
    mp.id_fase,
    kk.nama_konsentrasi,
    f.nama_fase
FROM cp_detail cd
JOIN mata_pelajaran mp ON cd.id_mapel = mp.id_mapel
LEFT JOIN konsentrasi_keahlian kk ON mp.id_konsentrasi = kk.id_konsentrasi
LEFT JOIN fase f ON mp.id_fase = f.id_fase
WHERE cd.id_cp IN (5, 6, 7, 8, 10, 11, 13);
