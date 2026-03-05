<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembina extends Model
{
    protected $table = 'pembina';
    protected $primaryKey = 'id_pembina';
    public $timestamps = false; 

    protected $fillable = [
        'no_telpembina',
        'id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id', 'id');
    }
}