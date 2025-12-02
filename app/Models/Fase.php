<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fase extends Model
{
    protected $table = 'fase';
    protected $primaryKey = 'id_fase';
    protected $fillable = ['nama_fase', 'deskripsi'];

    public function mataPelajaran()
    {
        return $this->hasMany(MataPelajaran::class, 'id_fase', 'id_fase');
    }
}
