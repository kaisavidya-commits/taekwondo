<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Murid extends Model
{
    protected $table = 'murid'; // 🔥 WAJIB kalau bukan murids

    protected $fillable = [
        'id_murid',
        'nis',
        'alamat',
        'tgl_lahir',
        'no_telp',
        'sabuk',
        'foto',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}