<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pendaftar extends Model
{
    protected $table = 'pendaftar';

    protected $fillable = [
        'id_pendaftar',
        'nama',
        'alamat',
        'no_telp',
        'tgl_lahir',
        'sekolah',
        'foto',
        'akte',
        'kk',
        'status',
    ];
}