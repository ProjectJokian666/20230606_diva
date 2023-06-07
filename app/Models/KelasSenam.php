<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelasSenam extends Model
{
    use HasFactory;
    protected $table = 'kelas_senams';
    protected $fillable = [
        'nama',
        'harga',
        'diskon',
    ];

    public function jadwal()
    {
        return $this->belongsTo(JadwalSesi::class);
    }
}
