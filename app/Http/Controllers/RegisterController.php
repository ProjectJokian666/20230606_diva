<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'name'              => 'required',
            'email'             => 'required|unique:users,email',
            'tempat_lahir'      => 'required',
            'tgl_lahir'         => 'required',
            'jenis_kelamin'     => 'required',
            'alamat'            => 'required',
            'no_telp'           => 'required',
            'password'          => 'required'
        ], [
            'name.required'             => 'Nama Harus Diisi!',
            'email.required'            => 'Email Harus Diisi!',
            'email.unique'              => 'Email Sudah Terdaftar!',
            'alamat.required'           => 'Alamat Harus Diisi!',
            'tempat_lahir.required'     => 'Tempat Lahir Harus Diisi!',
            'tgl_lahir.required'        => 'Tanggal Lahir Harus Diisi!',
            'no_telp.required'          => 'Nomor Telepon Harus Diisi!',
            'jenis_kelamin.required'        => 'Jenis Kelamin Harus Diisi!',
            'password.required'         => 'Password Harus Diisi!'
        ]);

        if($validate->fails()){
            Session::put('sweetalert', 'warning');
            return redirect()->back()->with('alert', 'Gagal Register!')->withErrors($validate);
        }

        $namaAnggota = preg_split("/[\s,]+/", $request->name);
        
        $user = new User();
        $user->role_id      = 4;
        $user->name         = $request->name;
        $user->email        = $request->email;
        $user->username     = $namaAnggota[0];
        $user->password     = bcrypt($request->password);
        $user->created_at   = Carbon::now();
        $user->updated_at   = Carbon::now();
        $user->save();

        Anggota::insert([
            'user_id'       => $user->id,
            'nama'          => $request->name,
            'alamat'        => $request->alamat,
            'tempat_lahir'  => $request->tempat_lahir,
            'tgl_lahir'     => $request->tgl_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'no_telp'       => $request->no_telp,
            'status_anggota' => 0,
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now()
        ]);

        Session::put('sweetalert', 'success');
        return redirect()->route('login')->with('alert', 'Sukses Register! Silahkan Login!');
    }
}
