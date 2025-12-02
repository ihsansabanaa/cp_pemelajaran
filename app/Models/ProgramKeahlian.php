<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProgramKeahlian extends Model
{
    protected $table = 'program_keahlian';
    protected $primaryKey = 'id_program';
    protected $fillable = ['id_bidang', 'nama_program'];

    public function bidangKeahlian()
    {
        return $this->belongsTo(BidangKeahlian::class, 'id_bidang', 'id_bidang');
    }

    public function kompetensiKeahlian()
    {
        return $this->hasMany(KompetensiKeahlian::class, 'id_program', 'id_program');
    }
}
