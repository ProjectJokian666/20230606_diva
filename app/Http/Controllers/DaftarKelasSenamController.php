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

class DaftarKelasSenamController extends Controller
{
    public function index()
    {
        $kelassenam = DB::select("
            SELECT ks.*, concat(js.start, ' - ', js.finish) as sesi, p.nama as nama_pelatih
            FROM kelas_senams ks, jadwal_sesies js, pelatihs p
            WHERE ks.jadwal_sesi_id = js.id
                AND ks.pelatih_id = p.id
        ");
        $no = 1;
        return view('daftarkelas.index', compact(['kelassenam', 'no']));
    }

    public function insert($id)
    {
        $kelasSenam = KelasSenam::join('jadwal_sesies', 'jadwal_sesies.id', '=', 'kelas_senams.jadwal_sesi_id')
                    ->join('pelatihs', 'pelatihs.id', '=', 'kelas_senams.pelatih_id')
                    ->join('users', 'users.id', '=', 'pelatihs.user_id')
                    ->where('kelas_senams.id', $id)
                    ->select('pelatihs.*', 'kelas_senams.*', 'kelas_senams.id as id_kelas_senam', 'kelas_senams.nama as nama_kelas', 'jadwal_sesies.*')
                    ->first();
        return view('daftarkelas.insert', compact(['kelasSenam']));
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
