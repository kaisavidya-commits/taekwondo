<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pendaftar extends Model
{
    protected $table = 'pendaftar';
    protected $primaryKey = 'id_pendaftar';
    public $timestamps = false;

    protected $fillable = [
        'nama',
        'alamat',
        'no_telp',
        'tgl_lahir',
        'sekolah',
        'foto',
        'akte',
        'kk',
        'status'
    ];




}