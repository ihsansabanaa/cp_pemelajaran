<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MataPelajaran extends Model
{
    protected $table = 'mata_pelajaran';
    protected $primaryKey = 'id_mapel';
    protected $fillable = ['id_konsentrasi', 'id_fase', 'nama_mapel', 'jenis_mapel'];

    public function konsentrasiKeahlian()
    {
        return $this->belongsTo(KonsentrasiKeahlian::class, 'id_konsentrasi', 'id_konsentrasi');
    }

    public function fase()
    {
        return $this->belongsTo(Fase::class, 'id_fase', 'id_fase');
    }

    public function cpDetail()
    {
        return $this->hasMany(CpDetail::class, 'id_mapel', 'id_mapel');
    }
}
