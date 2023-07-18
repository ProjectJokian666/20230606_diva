<?php

namespace App\Http\Controllers;

use App\Models\KelasSenam;
use App\Models\PendaftaranKelas;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

use App\Models\Ikutkelas;
use App\Models\JadwalSesi;

class DaftarKelasSenamController extends Controller
{
    public function index()
    {
        $data = [
            // 'kelas_diikuti' => Ikutkelas::leftjoin('anggotais','ikut_kelas.jadwal_id','anggotais.id')->where('anggotais.user_id','=',Auth()->user()->id)->get(),
            'jadwal_kelas' => JadwalSesi::where(DB::RAW("concat(hari,' ',jam)"),">=",DB::RAW("concat(curdate(),' ',curtime())"))->get(),
        ];
        // dd($data,Auth()->user()->id);
        return view('daftarkelas.index', compact('data'));
    }

    public function get_tambah_jadwal_user()
    {
        return redirect()->route('m.daftarKelas');
    }

    public function tambah_jadwal_user($jadwal,Request $request)
    {
        $cek_data = Ikutkelas::where('jadwal_id','=',$jadwal)->where('user_id','=',Auth()->user()->anggota->id)->first();
        // dd($id,$request,Auth()->user()->anggota->id);
        if($cek_data){
            // dd('ada');
            Session::put('sweetalert', 'danger');
            return redirect()->route('m.daftarKelas')->with('alert', 'Data Sudah Ada');
        }
        else{
            // dd('tidak');
            $insert_data = Ikutkelas::insert([
                'jadwal_id'=>$jadwal,
                'user_id'=>Auth()->user()->anggota->id,
            ]);
            if ($insert_data) {
                Session::put('sweetalert', 'success');
                return redirect()->route('m.daftarKelas')->with('alert', 'Sukses Menambahkan Data');
            }
            else{
                Session::put('sweetalert', 'danger');
                return redirect()->route('m.daftarKelas')->with('alert', 'Gagal Menambahkan Data');
            }
        }
    }

    public function bayar_jadwal_user($id)
    {
        $data = [
            'jadwal' => JadwalSesi::where(DB::RAW("concat(hari,' ',jam)"),">=",DB::RAW("concat(curdate(),' ',curtime())"))->get(),
        ];
        return view('daftarkelas.bayar',compact('data'));
    }

    public function delete_jadwal_user($jadwal,Request $request)
    {
        $cek_data = Ikutkelas::where('jadwal_id','=',$jadwal)->where('user_id','=',Auth()->user()->anggota->id)->first();
        // dd($id,$request,Auth()->user()->anggota->id);
        if($cek_data){
            // dd('ada');
            $delete_data = Ikutkelas::where('jadwal_id','=',$jadwal)->where('user_id','=',Auth()->user()->anggota->id)->delete();
            if ($delete_data) {
                DB::statement('ALTER TABLE ikut_kelas AUTO_INCREMENT=0');
                Session::put('sweetalert', 'success');
                return redirect()->route('m.daftarKelas')->with('alert', 'Sukses menghapus Data');
            }
            else{
                Session::put('sweetalert', 'danger');
                return redirect()->route('m.daftarKelas')->with('alert', 'Gagal menghapus Data');
            }
        }
        else{
            // dd('tidak');
            Session::put('sweetalert', 'danger');
            return redirect()->route('m.daftarKelas')->with('alert', 'Data Tidak Ada');
        }
    }

    public function store_jadwal_user(Request $request,$id)
    {
        // dd($request);


    }

    public function insert()
    {
        $data = [
            'jadwal_kelas' => JadwalSesi::all(),
        ];
        return view('daftarkelas.insert', compact('data'));
    }

    public function store(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'paket_mulai'       => 'required',
            'paket_selesai'     => 'required',
        ], [
            'paket_mulai.required'      => 'Paket Mulai Harus Diisi!',
            'paket_selesai.required'    => 'Paket Selesai Harus Diisi!'
        ]);

        if($validate->fails()){
            Session::put('sweetalert', 'warning');
            return redirect()->back()->with('alert', 'Gagal Daftar Kelas!')->withErrors($validate);
        }

        $paketStart    = date_create($request->paket_mulai);
        $paketFinish   = date_create($request->paket_selesai);
        $rangeHari = date_diff($paketStart, $paketFinish)->d;

        $totalHarga = intval($request->harga) * intval($rangeHari);
        $totalDiskon = $totalHarga * ($request->diskon/100);

        $pendaftaranKelas = new PendaftaranKelas;
        
        $pendaftaranKelas->user_id           = Auth::user()->id;
        $pendaftaranKelas->kelas_senam_id    = $request->kelas_senam_id;
        $pendaftaranKelas->persen_diskon     = $request->diskon;
        $pendaftaranKelas->total_diskon      = $totalDiskon;
        $pendaftaranKelas->total_harga       = $totalHarga;
        $pendaftaranKelas->paket_mulai       = $request->paket_mulai;
        $pendaftaranKelas->paket_selesai     = $request->paket_selesai;
        $pendaftaranKelas->status_pembayaran = 0;
        $pendaftaranKelas->status_paket      = 0;
        $pendaftaranKelas->created_at        = Carbon::now();
        $pendaftaranKelas->updated_at        = Carbon::now();
        $pendaftaranKelas->save();

        Session::put('sweetalert', 'success');
        return redirect()->route('m.pembayaran', $pendaftaranKelas->id)->with('alert', 'Sukses Mengedit Data');
    }
}
