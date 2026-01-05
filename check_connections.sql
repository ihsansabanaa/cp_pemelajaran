-- =====================================================
-- CEK SEMUA KONEKSI CP DETAIL KE KONSENTRASI KEAHLIAN
-- =====================================================
-- Jalankan query ini untuk melihat apakah update sudah berhasil atau belum

-- =====================================================
-- 1. CEK CP DETAIL YANG BELUM TERKONEKSI
-- =====================================================
SELECT 
    cd.id_cp,
    cd.id_mapel,
    cd.kode_cp,
    LEFT(cd.elemen_cp, 50) as elemen_cp,
    mp.nama_mapel,
    mp.id_konsentrasi,
    kk.nama_konsentrasi
FROM cp_detail cd
JOIN mata_pelajaran mp ON cd.id_mapel = mp.id_mapel
LEFT JOIN konsentrasi_keahlian kk ON mp.id_konsentrasi = kk.id_konsentrasi
WHERE cd.id_cp IN (5, 6, 7, 8, 10, 11, 13)
ORDER BY cd.id_cp;

-- =====================================================
-- 2. CEK DETAIL PER CP
-- =====================================================

-- Teknik Geomatika (id_cp = 5, harus id_konsentrasi = 57)
SELECT 'Teknik Geomatika' as nama, cd.id_cp, cd.id_mapel, mp.nama_mapel, mp.id_konsentrasi, kk.nama_konsentrasi
FROM cp_detail cd
JOIN mata_pelajaran mp ON cd.id_mapel = mp.id_mapel
LEFT JOIN konsentrasi_keahlian kk ON mp.id_konsentrasi = kk.id_konsentrasi
WHERE cd.id_cp = 5;

-- Teknik Audio Video (id_cp = 6, harus id_konsentrasi = 27)
SELECT 'Teknik Audio Video' as nama, cd.id_cp, cd.id_mapel, mp.nama_mapel, mp.id_konsentrasi, kk.nama_konsentrasi
FROM cp_detail cd
JOIN mata_pelajaran mp ON cd.id_mapel = mp.id_mapel
LEFT JOIN konsentrasi_keahlian kk ON mp.id_konsentrasi = kk.id_konsentrasi
WHERE cd.id_cp = 6;

-- Teknik Elektronika Industri (id_cp = 7, harus id_konsentrasi = 29)
SELECT 'Teknik Elektronika Industri' as nama, cd.id_cp, cd.id_mapel, mp.nama_mapel, mp.id_konsentrasi, kk.nama_konsentrasi
FROM cp_detail cd
JOIN mata_pelajaran mp ON cd.id_mapel = mp.id_mapel
LEFT JOIN konsentrasi_keahlian kk ON mp.id_konsentrasi = kk.id_konsentrasi
WHERE cd.id_cp = 7;

-- Instalasi Tenaga Listrik (id_cp = 8, harus id_konsentrasi = 49)
SELECT 'Instalasi Tenaga Listrik' as nama, cd.id_cp, cd.id_mapel, mp.nama_mapel, mp.id_konsentrasi, kk.nama_konsentrasi
FROM cp_detail cd
JOIN mata_pelajaran mp ON cd.id_mapel = mp.id_mapel
LEFT JOIN konsentrasi_keahlian kk ON mp.id_konsentrasi = kk.id_konsentrasi
WHERE cd.id_cp = 8;

-- Teknik Kendaraan Ringan (id_cp = 10, harus id_konsentrasi = 16)
SELECT 'Teknik Kendaraan Ringan' as nama, cd.id_cp, cd.id_mapel, mp.nama_mapel, mp.id_konsentrasi, kk.nama_konsentrasi
FROM cp_detail cd
JOIN mata_pelajaran mp ON cd.id_mapel = mp.id_mapel
LEFT JOIN konsentrasi_keahlian kk ON mp.id_konsentrasi = kk.id_konsentrasi
WHERE cd.id_cp = 10;

-- Otomasi Industri (id_cp = 11, harus id_konsentrasi = 30)
SELECT 'Otomasi Industri' as nama, cd.id_cp, cd.id_mapel, mp.nama_mapel, mp.id_konsentrasi, kk.nama_konsentrasi
FROM cp_detail cd
JOIN mata_pelajaran mp ON cd.id_mapel = mp.id_mapel
LEFT JOIN konsentrasi_keahlian kk ON mp.id_konsentrasi = kk.id_konsentrasi
WHERE cd.id_cp = 11;

-- Teknik Sepeda Motor (id_cp = 13, harus id_konsentrasi = 17)
SELECT 'Teknik Sepeda Motor' as nama, cd.id_cp, cd.id_mapel, mp.nama_mapel, mp.id_konsentrasi, kk.nama_konsentrasi
FROM cp_detail cd
JOIN mata_pelajaran mp ON cd.id_mapel = mp.id_mapel
LEFT JOIN konsentrasi_keahlian kk ON mp.id_konsentrasi = kk.id_konsentrasi
WHERE cd.id_cp = 13;

-- =====================================================
-- 3. CEK STRUKTUR TABEL CP_DETAIL
-- =====================================================
DESCRIBE cp_detail;

-- =====================================================
-- 4. CEK JUMLAH RECORD DI CP_DETAIL
-- =====================================================
SELECT 
    id_cp,
    id_mapel,
    COUNT(*) as jumlah_record
FROM cp_detail
WHERE id_cp IN (5, 6, 7, 8, 10, 11, 13)
GROUP BY id_cp, id_mapel;

-- =====================================================
-- INSTRUKSI:
-- =====================================================
-- 1. Jalankan query ini di phpMyAdmin
-- 2. Lihat hasilnya, apakah id_konsentrasi sudah terisi atau masih NULL
-- 3. Jika masih NULL, jalankan file update_*.sql yang sesuai
-- 4. Jika sudah terisi tapi CP Detail tetap tidak muncul, 
--    kemungkinan masalah ada di:
--    - id_fase tidak sesuai
--    - Atau ada kondisi lain di aplikasi
-- =====================================================
