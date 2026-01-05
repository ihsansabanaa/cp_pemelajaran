<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Rpp extends Model
{
    protected $table = 'rpp';
    protected $primaryKey = 'id_rpp';

    protected $fillable = [
        'id_user',
        'id_bidang',
        'id_program',
        'id_konsentrasi',
        'id_fase',
        'id_mapel',
        'dimensi_profil',
        'jumlah_pertemuan',
        'jam_pelajaran',
        'tujuan_pembelajaran',
        'praktik_pedagogis',
        'strategi_pembelajaran',
        'kemitraan_pembelajaran',
        'metode_pembelajaran',
        'lingkungan_pembelajaran',
        'pemanfaatan_digital',
        'langkah_pembelajaran'
    ];

    protected $casts = [
        'dimensi_profil' => 'array',
        'strategi_pembelajaran' => 'array',
        'kemitraan_pembelajaran' => 'array',
        'metode_pembelajaran' => 'array',
        'langkah_pembelajaran' => 'array',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function bidangKeahlian(): BelongsTo
    {
        return $this->belongsTo(BidangKeahlian::class, 'id_bidang');
    }

    public function programKeahlian(): BelongsTo
    {
        return $this->belongsTo(ProgramKeahlian::class, 'id_program');
    }

    public function konsentrasiKeahlian(): BelongsTo
    {
        return $this->belongsTo(KonsentrasiKeahlian::class, 'id_konsentrasi');
    }

    public function fase(): BelongsTo
    {
        return $this->belongsTo(Fase::class, 'id_fase');
    }
}
