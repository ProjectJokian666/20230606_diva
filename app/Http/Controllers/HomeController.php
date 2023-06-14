<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\KelasSenam;
use App\Models\Pelatih;
use App\Models\PendaftaranKelas;
use App\Models\JadwalSesi;
use App\Models\Events;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
        public function index()
        {
                $senin=[];
                $selasa=[];
                $rabu=[];
                $kamis=[];
                $jumat=[];
                $sabtu=[];
                $minggu=[];
                $data_jadwal = JadwalSesi::get();
                foreach ($data_jadwal as $key => $value) {
                        $cek_hari = DATE('l',strtotime($value->hari));
                        //senin
                        if ($cek_hari=='Monday') {
                                array_push($senin,[
                                        'id'=>$value->id,
                                        'pelatih'=>$value->pelatih->nama,
                                        'kelas'=>$value->senam->nama,
                                        'tanggal'=>$value->hari,
                                ]);
                        }
                        //selasa
                        if ($cek_hari=='Tuesday') {
                                array_push($selasa,[
                                        'id'=>$value->id,
                                        'pelatih'=>$value->pelatih->nama,
                                        'kelas'=>$value->senam->nama,
                                        'tanggal'=>$value->hari,
                                ]);
                        }
                        //rabu
                        if ($cek_hari=='Wednesday') {
                                array_push($rabu,[
                                        'id'=>$value->id,
                                        'pelatih'=>$value->pelatih->nama,
                                        'kelas'=>$value->senam->nama,
                                        'tanggal'=>$value->hari,
                                ]);
                        }
                        //kamis
                        if ($cek_hari=='Thursday') {
                                array_push($kamis,[
                                        'id'=>$value->id,
                                        'pelatih'=>$value->pelatih->nama,
                                        'kelas'=>$value->senam->nama,
                                        'tanggal'=>$value->hari,
                                ]);
                        }
                        //jumat
                        if ($cek_hari=='Friday') {
                                array_push($jumat,[
                                        'id'=>$value->id,
                                        'pelatih'=>$value->pelatih->nama,
                                        'kelas'=>$value->senam->nama,
                                        'tanggal'=>$value->hari,
                                ]);
                        }
                        //sabtu
                        if ($cek_hari=='Saturday') {
                                array_push($sabtu,[
                                        'id'=>$value->id,
                                        'pelatih'=>$value->pelatih->nama,
                                        'kelas'=>$value->senam->nama,
                                        'tanggal'=>$value->hari,
                                ]);
                        }
                        //minggu
                        if ($cek_hari=='Sunday') {
                                array_push($minggu,[
                                        'id'=>$value->id,
                                        'pelatih'=>$value->pelatih->nama,
                                        'kelas'=>$value->senam->nama,
                                        'tanggal'=>$value->hari,
                                ]);
                        }
                        // echo DATE('l, d M Y',strtotime($value->hari)).$value->id;
                }

                // dd($data_jadwal,$senin,$selasa,$rabu,$kamis,$jumat,$sabtu,$minggu);
                $data = [
                        'countKelas' => Count(KelasSenam::all()),
                        'countPelatih' => Count(Pelatih::all()),
                        'countAnggota' => Count(Anggota::all()),
                        'countTerdaftar' => Count(PendaftaranKelas::all()),
                        'pelatih'=>Pelatih::join('users','pelatihs.user_id','users.id')->get(),
                        'senin' => $senin,
                        'selasa' => $selasa,
                        'rabu' => $rabu,
                        'kamis' => $kamis,
                        'jumat' => $jumat,
                        'sabtu' => $sabtu,
                        'minggu' => $minggu,
                        'events' => Events::all(),
                ];
                // dd($data);
                return view('home.index', compact('data'));
        }
}
