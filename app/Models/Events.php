<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\IkutEvent;

class Events extends Model
{
    use HasFactory;
    protected $table = 'events';
    protected $fillable = [
        'tanggal','nama_event', 'detail_event', 'diskon_event', 'harga_event'
    ];

    public function audience($id)
    {
        $jumlah=0;
        $data = IkutEvent::
        where('event_id',$id)->get();
        foreach ($data as $key => $value) {
            $jumlah++;
        }
        // return $jumlah." ".$data_id;
        return $jumlah." orang";
    }
    public function cek_event($jadwal,$id)
    {
        if (IkutEvent::where('event_id',$jadwal)->where('user_id',$id)->first()) {
            return true;
        }
        return false;
    }
}
