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
        public function index(){
                $senin=[];
                $selasa=[];
                $rabu=[];
                $kamis=[];
                $jumat=[];
                $sabtu=[];
                $minggu=[];
                $data_jadwal = JadwalSesi::where(DB::RAW("concat(hari,' ',jam)"),">=",DB::RAW("concat(curdate(),' ',curtime())"))->get();
                foreach ($data_jadwal as $key => $value) {
                        $cek_hari = DATE('l',strtotime($value->hari));
                        if ($cek_hari=='Monday') {
                                $tanggal_jam = $value->hari.' '.$value->jam;
                                if (DATE('Y-m-d H:i:s')<=$tanggal_jam) {
                                        array_push($senin,[
                                                'id'=>$value->id,
                                                'pelatih'=>$value->pelatih->nama,
                                                'kelas'=>$value->senam->nama,
                                                'tanggal'=>$value->hari,
                                                'jam'=>$value->jam,
                                        ]);
                                }
                        }
                        if ($cek_hari=='Tuesday') {
                                $tanggal_jam = $value->hari.' '.$value->jam;
                                if (DATE('Y-m-d H:i:s')<=$tanggal_jam) {
                                        array_push($selasa,[
                                                'id'=>$value->id,
                                                'pelatih'=>$value->pelatih->nama,
                                                'kelas'=>$value->senam->nama,
                                                'tanggal'=>$value->hari,
                                                'jam'=>$value->jam,
                                        ]);
                                }
                        }
                        if ($cek_hari=='Wednesday') {
                                $tanggal_jam = $value->hari.' '.$value->jam;
                                if (DATE('Y-m-d H:i:s')<=$tanggal_jam) {
                                        array_push($rabu,[
                                                'id'=>$value->id,
                                                'pelatih'=>$value->pelatih->nama,
                                                'kelas'=>$value->senam->nama,
                                                'tanggal'=>$value->hari,
                                                'jam'=>$value->jam,
                                        ]);
                                }
                        }
                        if ($cek_hari=='Thursday') {
                                $tanggal_jam = $value->hari.' '.$value->jam;
                                if (DATE('Y-m-d H:i:s')<=$tanggal_jam) {
                                        array_push($kamis,[
                                                'id'=>$value->id,
                                                'pelatih'=>$value->pelatih->nama,
                                                'kelas'=>$value->senam->nama,
                                                'tanggal'=>$value->hari,
                                                'jam'=>$value->jam,
                                        ]);
                                }
                        }
                        if ($cek_hari=='Friday') {
                                $tanggal_jam = $value->hari.' '.$value->jam;
                                if (DATE('Y-m-d H:i:s')<=$tanggal_jam) {
                                        array_push($jumat,[
                                                'id'=>$value->id,
                                                'pelatih'=>$value->pelatih->nama,
                                                'kelas'=>$value->senam->nama,
                                                'tanggal'=>$value->hari,
                                                'jam'=>$value->jam,
                                        ]);
                                }
                        }
                        if ($cek_hari=='Saturday') {
                                $tanggal_jam = $value->hari.' '.$value->jam;
                                if (DATE('Y-m-d H:i:s')<=$tanggal_jam) {
                                        array_push($sabtu,[
                                                'id'=>$value->id,
                                                'pelatih'=>$value->pelatih->nama,
                                                'kelas'=>$value->senam->nama,
                                                'tanggal'=>$value->hari,
                                                'jam'=>$value->jam,
                                        ]);
                                }
                        }
                        if ($cek_hari=='Sunday') {
                                $tanggal_jam = $value->hari.' '.$value->jam;
                                if (DATE('Y-m-d H:i:s')<=$tanggal_jam) {
                                        array_push($minggu,[
                                                'id'=>$value->id,
                                                'pelatih'=>$value->pelatih->nama,
                                                'kelas'=>$value->senam->nama,
                                                'tanggal'=>$value->hari,
                                                'jam'=>$value->jam,
                                        ]);
                                }
                        }
                }
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
                        'events' => Events::where(DB::RAW("concat(tanggal,' ',jam)"),">=",DB::RAW("concat(curdate(),' ',curtime())"))->get(),
                ];
// dd($data);
                return view('home.index', compact('data'));
        }
        public function event($id)
        {
                $data = [
                        'event'=>Events::find($id),
                ];
        // dd($data);
                return view('home.event',compact('data'));
        }
        public function cek_nomor()
        {
                $status = "tidak";

                $cek_data =Anggota::where('no_telp','=',request()->nomor)->first();

                if ($cek_data) {
                        $status='ada';
                }

                $data = [
                        'data'=>$cek_data,
                        'status'=>$status,
                ];
                return response()->json($data);
        }
        public function event_daftar($id,Request $request)
        {

        }
        public function kelas($id)
        {
                $data = [
                        'kelas'=>JadwalSesi::find($id),
                ];
        // dd($data);
                return view('home.kelas',compact('data'));
        }
        public function pelatih($id)
        {
                $data = [
                        'pelatih'=>Pelatih::join('users','pelatihs.user_id','users.id')->where('user_id',$id)->first(),
                ];
                return view('home.pelatih',compact('data'));
        }
}
