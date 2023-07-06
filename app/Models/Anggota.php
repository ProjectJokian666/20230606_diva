<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;
    protected $table = 'anggotais';
    protected $fillable = [
        'user_id', 'nama', 'alamat', 'tempat_lahir', 'tgl_lahir', 'jenis_kelamin', 'no_telp', 'status_anggota'
    ];

    public function user()
    {
        return $this->belongsTo(user::class);
    }
}
