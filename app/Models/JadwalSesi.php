<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalSesi extends Model
{
    use HasFactory;
    protected $table = 'jadwal_sesies';
    protected $fillable = [
        'senam_id', 'users_id', 'hari'
    ];

    public function senam()
    {
        return $this->hasOne(KelasSenam::class,'id','senam_id');
    }
    public function pelatih()
    {
        // dd($id);
        // dd($this->hasOne(Pelatih::class,'id','users_id'));
        return $this->hasOne(Pelatih::class,'id','user_id');
    }
    public function ikutkelas()
    {
        return $this->belongsTo(IkutKelas::class);
    }
    public function cek_kelas($jadwal,$id)
    {
        if (IkutKelas::where('jadwal_id',$jadwal)->where('user_id',$id)->first()) {
            return true;
        }
        return false;
    }
}
