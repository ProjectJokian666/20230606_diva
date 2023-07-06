<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IkutKelas extends Model
{
    use HasFactory;
    protected $table = 'ikut_kelas';
    protected $fillable = [
        'jadwal_id',
        'user_id',
        'harga',
        'diskon',
        'bayar',
        'status',
        'payment',
    ];
}
