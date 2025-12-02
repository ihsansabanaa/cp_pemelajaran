<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CpDetail extends Model
{
    protected $table = 'cp_detail';
    protected $primaryKey = 'id_cp';
    protected $fillable = [
        'id_mapel',
        'rasional',
        'tujuan',
        'karakteristik',
        'capaian_pembelajaran',
        'uraian_cp'
    ];

    public function mataPelajaran()
    {
        return $this->belongsTo(MataPelajaran::class, 'id_mapel', 'id_mapel');
    }
}
