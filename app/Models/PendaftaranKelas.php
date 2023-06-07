<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendaftaranKelas extends Model
{
    use HasFactory;
    protected $table = 'pendaftaran_kelases';
    protected $fillable = [
        'user_id', 'kelas_senam_id', 'persen_diskon', 'total_diskon', 'total_harga', 'paket_mulai', 'paket_selesai', 'status_pembayaran', 'status_paket'
    ];
}
