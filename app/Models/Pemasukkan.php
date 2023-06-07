<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemasukkan extends Model
{
    use HasFactory;
    protected $table = 'pemasukkans';
    protected $fillable = [
        'user_id', 'jenis_pemasukkan', 'pendapatan_kotor', 'gaji_pelatih', 'pendapatan_bersih'
    ];
}
