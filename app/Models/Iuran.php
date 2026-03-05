<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Iuran extends Model
{
    use HasFactory;

    protected $table = 'iuran'; // pastikan nama tabel sesuai migration


    protected $fillable = [
        'id_murid',
        'unit',
        'harga',
        'keterangan',
        'status', // misal: 'Belum Bayar', 'Menunggu Konfirmasi', 'Lunas'
    ];

    /**
     * Relasi ke Murid
     */
    public function murid()
    {
        return $this->belongsTo(\App\Models\Murid::class, 'id_murid', 'id_murid');
    }
}