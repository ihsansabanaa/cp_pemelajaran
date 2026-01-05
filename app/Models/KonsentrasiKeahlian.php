<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KonsentrasiKeahlian extends Model
{
    protected $table = 'konsentrasi_keahlian';
    protected $primaryKey = 'id_konsentrasi';
    protected $fillable = ['id_program', 'id_bidang', 'nama_konsentrasi'];

    public function programKeahlian()
    {
        return $this->belongsTo(ProgramKeahlian::class, 'id_program', 'id_program');
    }

    public function mataPelajaran()
    {
        return $this->hasMany(MataPelajaran::class, 'id_konsentrasi', 'id_konsentrasi');
    }
}
