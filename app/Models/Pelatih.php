<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelatih extends Model
{
    use HasFactory;
    protected $table = 'pelatihs';
    protected $fillable = [
        'user_id', 'nama', 'asal_kota', 'alamat', 'tempat_lahir', 'tgl_lahir', 'jenis_kelamin', 'no_telp', 'jenis_pelatih', 'status_kepelatihan'
    ];

    public function jadwal()
    {
        return $this->belongsTo(JadwalSesi::class);
    }
}
