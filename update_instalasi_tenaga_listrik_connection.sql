-- =====================================================
-- SQL File: Connect CP Detail Teknik Instalasi Tenaga Listrik to Konsentrasi Keahlian
-- =====================================================
-- Purpose: Update mata_pelajaran table to link CP Detail Teknik Instalasi Tenaga Listrik 
--          (id_cp = 8) with Konsentrasi Keahlian Instalasi Tenaga Listrik (id_konsentrasi = 49)
--
-- This ensures CP Detail appears in RPP form when selecting 
-- Konsentrasi Keahlian "Instalasi Tenaga Listrik"
-- =====================================================

-- =====================================================
-- SECTION 1: Check Current CP Detail
-- =====================================================
-- Verify CP Detail exists with id_cp = 8
SELECT 
    id_cp,
    id_mapel,
    kode_cp,
    elemen_cp,
    capaian_pembelajaran
FROM cp_detail
WHERE id_cp = 8;

-- =====================================================
-- SECTION 2: Check Current mata_pelajaran Connection
-- =====================================================
-- Check which konsentrasi_keahlian this mata_pelajaran is currently linked to
SELECT 
    mp.id_mapel,
    mp.nama_mapel,
    mp.id_konsentrasi,
    kk.nama_konsentrasi
FROM mata_pelajaran mp
LEFT JOIN konsentrasi_keahlian kk ON mp.id_konsentrasi = kk.id_konsentrasi
WHERE mp.id_mapel = (
    SELECT id_mapel 
    FROM cp_detail 
    WHERE id_cp = 8 
    LIMIT 1
);

-- =====================================================
-- SECTION 3: Check Target Konsentrasi Keahlian
-- =====================================================
-- Verify Konsentrasi Keahlian "Instalasi Tenaga Listrik" exists with id_konsentrasi = 49
SELECT 
    id_konsentrasi,
    kode_konsentrasi,
    nama_konsentrasi,
    id_program_keahlian
FROM konsentrasi_keahlian
WHERE id_konsentrasi = 49;

-- =====================================================
-- SECTION 4: UPDATE - Connect CP Detail to Konsentrasi Keahlian
-- =====================================================
-- Update mata_pelajaran to link with Konsentrasi Keahlian Instalasi Tenaga Listrik (FASE F)
-- CARA 1: Gunakan JOIN (Recommended)
UPDATE mata_pelajaran mp
INNER JOIN cp_detail cd ON mp.id_mapel = cd.id_mapel
SET mp.id_konsentrasi = 49,
    mp.id_fase = 'F'
WHERE cd.id_cp = 8;

-- CARA 2: Jika CARA 1 tidak bekerja, gunakan temporary variable
-- SET @mapel_id = (SELECT id_mapel FROM cp_detail WHERE id_cp = 8 LIMIT 1);
-- UPDATE mata_pelajaran SET id_konsentrasi = 49, id_fase = 'F' WHERE id_mapel = @mapel_id;

-- =====================================================
-- SECTION 5: Verification - Check Complete Hierarchy
-- =====================================================
-- Verify the connection was successful - shows full hierarchy
SELECT 
    cd.id_cp,
    cd.kode_cp,
    cd.elemen_cp,
    mp.id_mapel,
    mp.nama_mapel,
    kk.id_konsentrasi,
    kk.nama_konsentrasi,
    kk.kode_konsentrasi,
    pk.nama_program_keahlian,
    bk.nama_bidang_keahlian
FROM cp_detail cd
JOIN mata_pelajaran mp ON cd.id_mapel = mp.id_mapel
JOIN konsentrasi_keahlian kk ON mp.id_konsentrasi = kk.id_konsentrasi
JOIN program_keahlian pk ON kk.id_program_keahlian = pk.id_program_keahlian
JOIN bidang_keahlian bk ON pk.id_bidang_keahlian = bk.id_bidang_keahlian
WHERE cd.id_cp = 8;

-- =====================================================
-- SECTION 6: List All Mata Pelajaran in This Konsentrasi
-- =====================================================
-- Show all mata pelajaran currently linked to Instalasi Tenaga Listrik
SELECT 
    mp.id_mapel,
    mp.nama_mapel,
    mp.id_konsentrasi,
    kk.nama_konsentrasi
FROM mata_pelajaran mp
LEFT JOIN konsentrasi_keahlian kk ON mp.id_konsentrasi = kk.id_konsentrasi
WHERE mp.id_konsentrasi = 49
ORDER BY mp.nama_mapel;

-- =====================================================
-- ROLLBACK (If Needed)
-- =====================================================
-- If you need to undo this change, uncomment and run:
/*
UPDATE mata_pelajaran 
SET id_konsentrasi = NULL 
WHERE id_mapel = (
    SELECT id_mapel 
    FROM cp_detail 
    WHERE id_cp = 8 
    LIMIT 1
);
*/

-- =====================================================
-- EXECUTION INSTRUCTIONS
-- =====================================================
-- 1. Open phpMyAdmin or MySQL client
-- 2. Select your database
-- 3. Copy and paste this entire file into SQL tab
-- 4. Click "Go" or "Execute"
-- 5. Review results to ensure connection is correct
-- 6. Test in RPP form:
--    - Select Bidang Keahlian → Program Keahlian → Instalasi Tenaga Listrik
--    - Verify mata pelajaran dropdown shows options
--    - Select mata pelajaran and check if CP Detail loads
-- =====================================================
