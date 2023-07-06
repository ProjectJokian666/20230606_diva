<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\JadwalSesi;
use App\Models\Ikutkelas;

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

    public function audience($id)
    {
        $jumlah=0;
        $data_id = "";
        $data = JadwalSesi::
        select('jadwal_sesies.id as jadwal_id')->
        leftjoin('kelas_senams','jadwal_sesies.senam_id','kelas_senams.id')->
        where('senam_id',$id)->get();
        foreach ($data as $key => $value) {
            $jumlah_data = Ikutkelas::where('jadwal_id',$value->jadwal_id)->get();
            foreach ($jumlah_data as $key_jumlah_data => $value_jumlah_data) {
                // $data_id.="<br>id=".$value->jadwal_id."<br>";
                $jumlah++;
            }
        }
        // return $jumlah." ".$data_id;
        return $jumlah." orang";
    }
}
