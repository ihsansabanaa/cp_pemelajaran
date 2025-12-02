<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MataPelajaran extends Model
{
    protected $table = 'mata_pelajaran';
    protected $primaryKey = 'id_mapel';
    protected $fillable = ['id_kompetensi', 'id_fase', 'nama_mapel', 'jenis_mapel'];

    public function kompetensiKeahlian()
    {
        return $this->belongsTo(KompetensiKeahlian::class, 'id_kompetensi', 'id_kompetensi');
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
