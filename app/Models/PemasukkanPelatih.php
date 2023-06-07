<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemasukkanPelatih extends Model
{
    use HasFactory;
    protected $table = 'pemasukkan_pelatihs';
    protected $fillable = [
        'user_id', 'pendaftaran_kelas_id', 'pendapatan'
    ];
}
