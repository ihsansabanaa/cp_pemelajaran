<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BidangKeahlian extends Model
{
    protected $table = 'bidang_keahlian';
    protected $primaryKey = 'id_bidang';
    protected $fillable = ['nama_bidang'];

    public function programKeahlian()
    {
        return $this->hasMany(ProgramKeahlian::class, 'id_bidang', 'id_bidang');
    }
}
