-- ============================================
-- UPDATE CP DETAIL TEKNIK AUDIO VIDEO KE KONSENTRASI KEAHLIAN
-- Tanggal: 11 Desember 2025
-- ============================================

-- 1. CEK CP DETAIL TEKNIK AUDIO VIDEO (id_cp = 6)
SELECT 
    id_cp,
    id_mapel,
    LEFT(capaian_pembelajaran, 100) as capaian_preview,
    LEFT(karakteristik, 100) as karakteristik_preview
FROM cp_detail 
WHERE id_cp = 6;

-- 2. CEK MATA PELAJARAN YANG TERHUBUNG DENGAN CP TEKNIK AUDIO VIDEO
SELECT 
    mp.id_mapel,
    mp.nama_mapel,
    mp.jenis_mapel,
    mp.id_konsentrasi,
    kk.nama_konsentrasi as konsentrasi_saat_ini
FROM mata_pelajaran mp
LEFT JOIN konsentrasi_keahlian kk ON mp.id_konsentrasi = kk.id_konsentrasi
WHERE mp.id_mapel = (SELECT id_mapel FROM cp_detail WHERE id_cp = 6 LIMIT 1);

-- 3. CEK KONSENTRASI KEAHLIAN TEKNIK AUDIO VIDEO (id_konsentrasi = 27)
SELECT 
    kk.id_konsentrasi,
    kk.nama_konsentrasi,
    pk.nama_program,
    bk.nama_bidang
FROM konsentrasi_keahlian kk
JOIN program_keahlian pk ON kk.id_program = pk.id_program
JOIN bidang_keahlian bk ON pk.id_bidang = bk.id_bidang
WHERE kk.id_konsentrasi = 27;

-- ============================================
-- UPDATE KONEKSI
-- ============================================

-- 4. UPDATE id_konsentrasi DAN id_fase untuk Mata Pelajaran TEKNIK AUDIO VIDEO (FASE F)
-- CARA 1: Gunakan JOIN (Recommended)
UPDATE mata_pelajaran mp
INNER JOIN cp_detail cd ON mp.id_mapel = cd.id_mapel
SET mp.id_konsentrasi = 27,
    mp.id_fase = 'F'
WHERE cd.id_cp = 6;

-- CARA 2: Jika CARA 1 tidak bekerja, gunakan temporary variable
-- SET @mapel_id = (SELECT id_mapel FROM cp_detail WHERE id_cp = 6 LIMIT 1);
-- UPDATE mata_pelajaran SET id_konsentrasi = 27, id_fase = 'F' WHERE id_mapel = @mapel_id;

-- ============================================
-- VERIFIKASI HASIL UPDATE
-- ============================================

-- 5. VERIFIKASI - Lihat hubungan lengkap setelah update
SELECT 
    'VERIFIKASI UPDATE TEKNIK AUDIO VIDEO' as info,
    cp.id_cp,
    LEFT(cp.capaian_pembelajaran, 80) as cp_preview,
    mp.id_mapel,
    mp.nama_mapel,
    mp.jenis_mapel,
    mp.id_konsentrasi,
    kk.nama_konsentrasi,
    pk.nama_program,
    bk.nama_bidang
FROM cp_detail cp
JOIN mata_pelajaran mp ON cp.id_mapel = mp.id_mapel
JOIN konsentrasi_keahlian kk ON mp.id_konsentrasi = kk.id_konsentrasi
JOIN program_keahlian pk ON kk.id_program = pk.id_program
JOIN bidang_keahlian bk ON pk.id_bidang = bk.id_bidang
WHERE cp.id_cp = 6;

-- 6. CEK SEMUA MATA PELAJARAN DI KONSENTRASI TEKNIK AUDIO VIDEO
SELECT 
    mp.id_mapel,
    mp.nama_mapel,
    mp.jenis_mapel,
    CASE 
        WHEN cp.id_cp IS NOT NULL THEN 'Ada CP Detail'
        ELSE 'Tidak ada CP Detail'
    END as status_cp
FROM mata_pelajaran mp
LEFT JOIN cp_detail cp ON mp.id_mapel = cp.id_mapel
WHERE mp.id_konsentrasi = 27
ORDER BY mp.jenis_mapel, mp.nama_mapel;

-- ============================================
-- ROLLBACK (Jika ada kesalahan)
-- ============================================

-- Jika perlu rollback, jalankan query ini:
-- UPDATE mata_pelajaran 
-- SET id_konsentrasi = [ID_KONSENTRASI_LAMA] 
-- WHERE id_mapel = (SELECT id_mapel FROM cp_detail WHERE id_cp = 6 LIMIT 1);
