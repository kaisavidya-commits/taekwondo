<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Murid extends Model
{
    protected $table = 'murid';
    protected $primaryKey = 'id_murid';
    public $timestamps = false;

    protected $fillable = [
        'nis',
        'alamat',
        'tgl_lahir',
        'no_telp',
        'sabuk',
        'foto',
        'id_pendaftar',
        'id'
    ];

    public function user()
{
    return $this->belongsTo(\App\Models\User::class, 'id');
}

public function pendaftar()
{
    return $this->belongsTo(\App\Models\Pendaftar::class, 'id_pendaftar');
}
}