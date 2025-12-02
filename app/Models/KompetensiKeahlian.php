<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KompetensiKeahlian extends Model
{
    protected $table = 'kompetensi_keahlian';
    protected $primaryKey = 'id_kompetensi';
    protected $fillable = ['id_program', 'id_bidang', 'nama_kompetensi'];

    public function programKeahlian()
    {
        return $this->belongsTo(ProgramKeahlian::class, 'id_program', 'id_program');
    }

    public function mataPelajaran()
    {
        return $this->hasMany(MataPelajaran::class, 'id_kompetensi', 'id_kompetensi');
    }
}
