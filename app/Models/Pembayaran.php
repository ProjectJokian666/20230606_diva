<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;
    protected $table = 'pembayaran';
    protected $fillable = [
        'anggota_id', 'pendaftaran_kelas_id', 'total_dibayar', 'bukti_transfer', 'status_konfirmasi'
    ];
}
