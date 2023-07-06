<?php

namespace App\Http\Controllers;

use App\Models\Pelatih;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class PelatihController extends Controller
{
    public function index()
    {
        $pelatih = Pelatih::all();
        $no = 1;
        return view('pelatih.index', compact(['pelatih', 'no']));
    }

    public function detail()
    {
        # code...
    }

    public function insert()
    {
        return view('pelatih.insert');
    }

    public function store(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'nama'              => 'required',
            'email'             => 'required|unique:users,email',
            'asal_kota'         => 'required',
            'alamat'            => 'required',
            'tempat_lahir'      => 'required',
            'tgl_lahir'         => 'required',
            'no_telp'           => 'required',
            'jenis_kelamin'     => 'required',
            'jenis_pelatih'     => 'required',
            'status_kepelatihan'=> 'required',
            'foto_pelatih'=> 'required',
        ], [
            'nama.required'             => 'Nama Harus Diisi!',
            'email.required'            => 'Email Harus Diisi!',
            'email.unique'              => 'Email Sudah Terdaftar!',
            'asal_kota.required'        => 'Asal Kota Harus Diisi!',
            'alamat.required'           => 'Alamat Harus Diisi!',
            'tempat_lahir.required'     => 'Tempat Lahir Harus Diisi!',
            'tgl_lahir.required'        => 'Tanggal Lahir Harus Diisi!',
            'no_telp.required'          => 'Nomor Telepon Harus Diisi!',
            'jenis_kelamin.required'        => 'Jenis Kelamin Harus Diisi!',
            'jenis_pelatih.required'        => 'Jenis Pelatih Harus Diisi!',
            'status_kepelatihan.required'        => 'Asal Kota Harus Diisi!',
            'foto_pelatih.required'        => 'Foto Harus Diisi!',
        ]);

        if($validate->fails()){
            Session::put('sweetalert', 'warning');
            return redirect()->back()->with('alert', 'Gagal Menambahkan Data Pelatih!')->withErrors($validate);
        }

        $namaPelatih = preg_split("/[\s,]+/", $request->nama);

        // dd($request->file('foto_pelatih'));
        $foto = $request->file('foto_pelatih');
        $foto_name = time().'.'.$foto->getClientOriginalExtension();
        $foto->move('foto_pelatih',$foto_name);

        $user = new User();
        $user->role_id      = 3;
        $user->name         = $request->nama;
        $user->email        = $request->email;
        $user->username     = $namaPelatih[0];
        $user->password     = bcrypt('pelatih');
        $user->image        = $foto_name;
        $user->created_at   = Carbon::now();
        $user->updated_at   = Carbon::now();
        $user->save();

        Pelatih::insert([
            'user_id'           => $user->id,
            'nama'              => $request->nama,
            'asal_kota'         => $request->asal_kota,
            'alamat'            => $request->alamat,
            'tempat_lahir'      => $request->tempat_lahir,
            'tgl_lahir'         => $request->tgl_lahir,
            'jenis_kelamin'     => $request->jenis_kelamin,
            'no_telp'           => $request->no_telp,
            'jenis_pelatih'     => $request->jenis_pelatih,
            'status_kepelatihan'=> $request->status_kepelatihan,
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now()
        ]);
        
        Session::put('sweetalert', 'success');
        return redirect()->route('a.pelatih')->with('alert', 'Sukses Menambahkan Data');
    }

    public function edit($id)
    {
        $pelatih = Pelatih::find($id);
        $user = User::where('id', $pelatih->user_id)->first();

        return view('pelatih.edit', compact(['pelatih', 'user']));
    }

    public function update(Request $request, $id)
    {
        $validate = Validator::make($request->all(),[
            'nama'              => 'required',
            'email'             => 'required',
            'asal_kota'         => 'required',
            'alamat'            => 'required',
            'tempat_lahir'      => 'required',
            'tgl_lahir'         => 'required',
            'no_telp'           => 'required',
            'jenis_kelamin'     => 'required',
            'jenis_pelatih'     => 'required',
            'status_kepelatihan'=> 'required',
        ], [
            'nama.required'             => 'Nama Harus Diisi!',
            'email.required'            => 'Email Harus Diisi!',
            'asal_kota.required'        => 'Asal Kota Harus Diisi!',
            'alamat.required'           => 'Alamat Harus Diisi!',
            'tempat_lahir.required'     => 'Tempat Lahir Harus Diisi!',
            'tgl_lahir.required'        => 'Tanggal Lahir Harus Diisi!',
            'no_telp.required'          => 'Nomor Telepon Harus Diisi!',
            'jenis_kelamin.required'        => 'Jenis Kelamin Harus Diisi!',
            'jenis_pelatih.required'        => 'Jenis Pelatih Harus Diisi!',
            'status_kepelatihan.required'        => 'Asal Kota Harus Diisi!',
        ]);

        if($validate->fails()){
            Session::put('sweetalert', 'warning');
            return redirect()->back()->with('alert', 'Gagal Mengubah Data Pelatih!')->withErrors($validate);
        }

        $pelatih = Pelatih::find($id);
        $namaPelatih = preg_split("/[\s,]+/", $request->nama);

        User::where('id', $pelatih->user_id)->update([
            'name'      => $request->nama,
            'email'     => $request->email,
            'username'  => $namaPelatih,
            'updated_at'=> Carbon::now()
        ]);

        Pelatih::where('id', $id)->update([
            'nama'              => $request->nama,
            'asal_kota'         => $request->asal_kota,
            'alamat'            => $request->alamat,
            'tempat_lahir'      => $request->tempat_lahir,
            'tgl_lahir'         => $request->tgl_lahir,
            'jenis_kelamin'     => $request->jenis_kelamin,
            'no_telp'           => $request->no_telp,
            'jenis_pelatih'     => $request->jenis_pelatih,
            'status_kepelatihan'    => $request->status_kepelatihan,
            'updated_at'=> Carbon::now()
        ]);
        
        Session::put('sweetalert', 'success');
        return redirect()->route('a.pelatih')->with('alert', 'Sukses Mengedit Data');
    }

    public function destroy($id)
    {
        $pelatih = Pelatih::find($id);
        if($pelatih){
            Pelatih::where('id', $id)->delete();
            User::where('id', $pelatih->user_id)->delete();
            
            return response()->json([
                'status'    => 200
            ]);
        }
    }
}
