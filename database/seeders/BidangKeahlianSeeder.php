<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BidangKeahlianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nama_bidang' => 'Teknologi Konstruksi dan Bangunan',
                'program_keahlian' => [
                    [
                        'nama_program' => 'Teknik Perawatan Gedung',
                        'kompetensi_keahlian' => ['Teknik Perawatan Gedung']
                    ],
                    [
                        'nama_program' => 'Konstruksi dan Perawatan Bangunan Sipil',
                        'kompetensi_keahlian' => [
                            'Konstruksi Jalan, Irigasi, dan Jembatan',
                            'Konstruksi Jalan dan Jembatan'
                        ]
                    ],
                    [
                        'nama_program' => 'Teknik Konstruksi dan Perumahan',
                        'kompetensi_keahlian' => [
                            'Teknik Konstruksi dan Perumahan',
                            'Konstruksi Gedung dan Sanitasi'
                        ]
                    ],
                    [
                        'nama_program' => 'Desain Pemodelan dan Informasi Bangunan',
                        'kompetensi_keahlian' => ['Desain Pemodelan dan Informasi Bangunan']
                    ],
                    [
                        'nama_program' => 'Teknik Furnitur',
                        'kompetensi_keahlian' => [
                            'Desain Interior dan Teknik Furnitur',
                            'Desain dan Teknik Furnitur'
                        ]
                    ],
                ]
            ],
            [
                'nama_bidang' => 'Teknologi Manufaktur dan Rekayasa',
                'program_keahlian' => [
                    [
                        'nama_program' => 'Teknik Mesin',
                        'kompetensi_keahlian' => ['Teknik Pemesinan']
                    ],
                    [
                        'nama_program' => 'Teknik Otomotif',
                        'kompetensi_keahlian' => [
                            'Teknik Kendaraan Ringan',
                            'Teknik Sepeda Motor'
                        ]
                    ],
                    [
                        'nama_program' => 'Teknik Pengelasan dan Fabrikasi Logam',
                        'kompetensi_keahlian' => ['Teknik Pengelasan']
                    ],
                    [
                        'nama_program' => 'Teknik Logistik',
                        'kompetensi_keahlian' => ['Teknik Logistik']
                    ],
                    [
                        'nama_program' => 'Teknik Elektronika',
                        'kompetensi_keahlian' => ['Teknik Elektronika Industri']
                    ],
                    [
                        'nama_program' => 'Teknik Pesawat Udara',
                        'kompetensi_keahlian' => ['Airframe Powerplant']
                    ],
                    [
                        'nama_program' => 'Teknik Konstruksi Kapal',
                        'kompetensi_keahlian' => ['Desain Rancang Bangun Kapal']
                    ],
                    [
                        'nama_program' => 'Kimia Analisis',
                        'kompetensi_keahlian' => ['Kimia Analisis']
                    ],
                    [
                        'nama_program' => 'Teknik Kimia Industri',
                        'kompetensi_keahlian' => ['Teknik Kimia Industri']
                    ],
                    [
                        'nama_program' => 'Teknik Tekstil',
                        'kompetensi_keahlian' => ['Teknik Pembuatan Kain']
                    ],
                ]
            ],
            [
                'nama_bidang' => 'Energi dan Pertambangan',
                'program_keahlian' => [
                    [
                        'nama_program' => 'Teknik Ketenagalistrikan',
                        'kompetensi_keahlian' => ['Teknik Instalasi Tenaga Listrik']
                    ],
                    [
                        'nama_program' => 'Teknik Energi Terbarukan',
                        'kompetensi_keahlian' => ['Teknik Energi Surya, Hidro, dan Angin']
                    ],
                    [
                        'nama_program' => 'Teknik Geospasial',
                        'kompetensi_keahlian' => ['Teknik Geomatika']
                    ],
                    [
                        'nama_program' => 'Teknik Geologi Pertambangan',
                        'kompetensi_keahlian' => ['Geologi Pertambangan']
                    ],
                    [
                        'nama_program' => 'Teknik Perminyakan',
                        'kompetensi_keahlian' => ['Teknik Produksi Minyak dan Gas']
                    ],
                ]
            ],
            [
                'nama_bidang' => 'Teknologi Informasi',
                'program_keahlian' => [
                    [
                        'nama_program' => 'Pengembangan Perangkat Lunak dan Gim',
                        'kompetensi_keahlian' => [
                            'Rekayasa Perangkat Lunak',
                            'Pengembangan Gim'
                        ]
                    ],
                    [
                        'nama_program' => 'Teknik Jaringan Komputer dan Telekomunikasi',
                        'kompetensi_keahlian' => [
                            'Teknik Komputer dan Jaringan',
                            'Teknik Transmisi Telekomunikasi'
                        ]
                    ],
                ]
            ],
            [
                'nama_bidang' => 'Kesehatan dan Pekerjaan Sosial',
                'program_keahlian' => [
                    [
                        'nama_program' => 'Layanan Kesehatan',
                        'kompetensi_keahlian' => [
                            'Caregiving',
                            'Dental Care'
                        ]
                    ],
                    [
                        'nama_program' => 'Teknik Laboratorium Medik',
                        'kompetensi_keahlian' => ['Laboratorium Medik']
                    ],
                    [
                        'nama_program' => 'Teknologi Farmasi',
                        'kompetensi_keahlian' => ['Farmasi Industri']
                    ],
                    [
                        'nama_program' => 'Pekerjaan Sosial',
                        'kompetensi_keahlian' => ['Pekerjaan Sosial']
                    ],
                ]
            ],
            [
                'nama_bidang' => 'Agribisnis dan Agriteknologi',
                'program_keahlian' => [
                    [
                        'nama_program' => 'Agribisnis Tanaman',
                        'kompetensi_keahlian' => ['Tanaman Perkebunan']
                    ],
                    [
                        'nama_program' => 'Agribisnis Ternak',
                        'kompetensi_keahlian' => ['Ternak Ruminansia']
                    ],
                    [
                        'nama_program' => 'Agribisnis Perikanan',
                        'kompetensi_keahlian' => [
                            'Perikanan Air Tawar',
                            'Pengolahan Hasil Perikanan'
                        ]
                    ],
                    [
                        'nama_program' => 'Usaha Pertanian Terpadu',
                        'kompetensi_keahlian' => ['Mekanisasi Pertanian']
                    ],
                    [
                        'nama_program' => 'Agriteknologi Pengolahan Hasil Pertanian',
                        'kompetensi_keahlian' => ['Agriteknologi Pengolahan Hasil Pertanian']
                    ],
                    [
                        'nama_program' => 'Kehutanan',
                        'kompetensi_keahlian' => ['Kehutanan']
                    ],
                ]
            ],
            [
                'nama_bidang' => 'Kemaritiman',
                'program_keahlian' => [
                    [
                        'nama_program' => 'Teknika Kapal Penangkap Ikan',
                        'kompetensi_keahlian' => ['Teknika Kapal Penangkap Ikan']
                    ],
                    [
                        'nama_program' => 'Nautika Kapal Penangkap Ikan',
                        'kompetensi_keahlian' => ['Nautika Kapal Penangkap Ikan']
                    ],
                    [
                        'nama_program' => 'Teknika Kapal Niaga',
                        'kompetensi_keahlian' => ['Teknika Kapal Niaga']
                    ],
                    [
                        'nama_program' => 'Nautika Kapal Niaga',
                        'kompetensi_keahlian' => ['Nautika Kapal Niaga']
                    ],
                ]
            ],
            [
                'nama_bidang' => 'Bisnis dan Manajemen',
                'program_keahlian' => [
                    [
                        'nama_program' => 'Pemasaran',
                        'kompetensi_keahlian' => ['Bisnis Digital']
                    ],
                    [
                        'nama_program' => 'Manajemen Perkantoran dan Layanan Bisnis',
                        'kompetensi_keahlian' => ['Manajemen Logistik']
                    ],
                    [
                        'nama_program' => 'Akuntansi dan Keuangan Lembaga',
                        'kompetensi_keahlian' => [
                            'Perbankan Syariah',
                            'Akuntansi'
                        ]
                    ],
                ]
            ],
            [
                'nama_bidang' => 'Pariwisata',
                'program_keahlian' => [
                    [
                        'nama_program' => 'Usaha Layanan Pariwisata',
                        'kompetensi_keahlian' => ['Ekowisata']
                    ],
                    [
                        'nama_program' => 'Perhotelan',
                        'kompetensi_keahlian' => ['Perhotelan']
                    ],
                    [
                        'nama_program' => 'Kuliner',
                        'kompetensi_keahlian' => ['Kuliner']
                    ],
                    [
                        'nama_program' => 'Kecantikan dan Spa',
                        'kompetensi_keahlian' => [
                            'Tata Kecantikan Kulit dan Rambut',
                            'Spa dan Beauty Therapy'
                        ]
                    ],
                ]
            ],
            [
                'nama_bidang' => 'Seni dan Ekonomi Kreatif',
                'program_keahlian' => [
                    [
                        'nama_program' => 'Seni Rupa',
                        'kompetensi_keahlian' => ['Seni Lukis']
                    ],
                    [
                        'nama_program' => 'Desain Komunikasi Visual',
                        'kompetensi_keahlian' => ['Teknik Grafika']
                    ],
                    [
                        'nama_program' => 'Desain dan Produksi Kriya',
                        'kompetensi_keahlian' => ['Kriya Kreatif Batik']
                    ],
                    [
                        'nama_program' => 'Seni Pertunjukan',
                        'kompetensi_keahlian' => ['Seni Musik']
                    ],
                    [
                        'nama_program' => 'Broadcasting dan Perfilman',
                        'kompetensi_keahlian' => ['Produksi Film']
                    ],
                    [
                        'nama_program' => 'Animasi',
                        'kompetensi_keahlian' => ['Animasi']
                    ],
                    [
                        'nama_program' => 'Busana',
                        'kompetensi_keahlian' => ['Desain dan Produksi Busana']
                    ],
                ]
            ],
        ];

        foreach ($data as $bidang) {
            // Insert Bidang Keahlian
            $bidangId = DB::table('bidang_keahlian')->insertGetId([
                'nama_bidang' => $bidang['nama_bidang'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            foreach ($bidang['program_keahlian'] as $program) {
                // Insert Program Keahlian
                $programId = DB::table('program_keahlian')->insertGetId([
                    'id_bidang' => $bidangId,
                    'nama_program' => $program['nama_program'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                // Insert Kompetensi Keahlian
                foreach ($program['kompetensi_keahlian'] as $kompetensi) {
                    DB::table('kompetensi_keahlian')->insert([
                        'id_bidang' => $bidangId,
                        'id_program' => $programId,
                        'nama_kompetensi' => $kompetensi,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }
        }
    }
}
