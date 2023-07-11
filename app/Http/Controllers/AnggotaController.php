<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AnggotaController extends Controller
{
    public function index()
    {
        if(Auth::user()->role_id == 3){
            $anggota = Anggota::join('pendaftaran_kelases', 'pendaftaran_kelases.user_id', '=', 'anggotais.user_id')
            ->join('kelas_senams', 'kelas_senams.id', '=', 'pendaftaran_kelases.kelas_senam_id')
            ->join('jadwal_sesies', 'jadwal_sesies.id', '=', 'kelas_senams.jadwal_sesi_id')
            ->select('anggotais.*', 'kelas_senams.nama as nama_kelas', 'jadwal_sesies.start', 'jadwal_sesies.finish', 'pendaftaran_kelases.paket_mulai', 'pendaftaran_kelases.paket_selesai')
            ->where('status_pembayaran', 1)
            ->orderBy('pendaftaran_kelases.created_at', 'DESC')
            ->get();
        }else{
            $anggota = Anggota::all();
        }
        $no = 1;
        return view('anggota.index', compact(['anggota', 'no']));
    }

    public function detail()
    {
        # code...
    }

    public function insert()
    {
        return view('anggota.insert');
    }

    public function store(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'nama'              => 'required',
            'email'             => 'required',
            'alamat'            => 'required',
            'tempat_lahir'      => 'required',
            'tgl_lahir'         => 'required',
            'no_telp'           => 'required',
            'jenis_kelamin'     => 'required',
            'status_anggota'    => 'required',
        ], [
            'nama.required'=>'Nama Harus Diisi!',
            'email.required'=>'Email Harus Diisi!',
            'alamat.required'=>'Alamat Harus Diisi!',
            'tempat_lahir.required'=>'Tempat Lahir Harus Diisi!',
            'tgl_lahir.required'=>'Tanggal Lahir Harus Diisi!',
            'no_telp.required'=>'Nomor Telepon Harus Diisi!',
            'jenis_kelamin.required'=>'Jenis Kelamin Harus Diisi!',
            'status_anggota.required'=>'Status Anggota Harus Diisi!',
        ]);

        if($validate->fails()){
            Session::put('sweetalert', 'warning');
            return redirect()->back()->with('alert', 'Gagal Menambah Data Anggota!')->withErrors($validate);
        }

        $namaAnggota = preg_split("/[\s,]+/", $request->nama);

        $user = new User();
        $user->role_id      = 4;
        $user->name         = $request->nama;
        $user->email        = $request->email;
        $user->username     = $namaAnggota[0];
        $user->password     = bcrypt('member');
        $user->created_at   = Carbon::now();
        $user->updated_at   = Carbon::now();
        $user->save();

        Anggota::insert([
            'user_id'       => $user->id,
            'nama'          => $request->nama,
            'alamat'        => $request->alamat,
            'tempat_lahir'  => $request->tempat_lahir,
            'tgl_lahir'     => $request->tgl_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'no_telp'       => $request->no_telp,
            'status_anggota' => $request->status_anggota,
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now()
        ]);

        Session::put('sweetalert', 'success');
        return redirect()->route('a.anggota')->with('alert', 'Sukses Menambahkan Data');
    }

    public function edit($id)
    {
        $anggota = Anggota::find($id);
        $user = User::where('id', $anggota->user_id)->first();

        return view('anggota.edit', compact(['anggota', 'user']));
    }

    public function update(Request $request, $id)
    {
        $validate = Validator::make($request->all(),[
            'nama'              => 'required',
            'email'             => 'required',
            'alamat'            => 'required',
            'tempat_lahir'      => 'required',
            'tgl_lahir'         => 'required',
            'no_telp'           => 'required',
            'jenis_kelamin'     => 'required',
            'status_anggota'    => 'required',
        ], [
            'nama.required'             => 'Nama Harus Diisi!',
            'email.required'            => 'Email Harus Diisi!',
            'alamat.required'           => 'Alamat Harus Diisi!',
            'tempat_lahir.required'     => 'Tempat Lahir Harus Diisi!',
            'tgl_lahir.required'        => 'Tanggal Lahir Harus Diisi!',
            'no_telp.required'          => 'Nomor Telepon Harus Diisi!',
            'jenis_kelamin.required'        => 'Jenis Kelamin Harus Diisi!',
            'status_anggota.required'        => 'Status Anggota Harus Diisi!',
        ]);

        if($validate->fails()){
            Session::put('sweetalert', 'warning');
            return redirect()->back()->with('alert', 'Gagal Menambah Data Anggota!')->withErrors($validate);
        }
        $anggota = Anggota::find($id);
        $namaAnggota = preg_split("/[\s,]+/", $request->nama);

        User::where('id', $anggota->user_id)->update([
            'name'      => $request->nama,
            'email'     => $request->email,
            'username'  => $namaAnggota,
            'updated_at'=> Carbon::now()
        ]);

        Anggota::where('id', $id)->update([
            'nama'          => $request->nama,
            'alamat'        => $request->alamat,
            'tempat_lahir'  => $request->tempat_lahir,
            'tgl_lahir'     => $request->tgl_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'no_telp'       => $request->no_telp,
            'status_anggota' => $request->status_anggota,
            'updated_at'    => Carbon::now()
        ]);

        Session::put('sweetalert', 'success');
        return redirect()->route('a.anggota')->with('alert', 'Sukses Menambahkan Data');
    }

    public function destroy($id)
    {
        $anggota = Anggota::find($id);
        if($anggota){
            Anggota::where('id', $id)->delete();
            User::where('id', $anggota->user_id)->delete();

            return response()->json([
                'status'    => 200
            ]);
        }
    }
}
