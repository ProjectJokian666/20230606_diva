<?php

namespace App\Http\Controllers;

use App\Models\JadwalSesi;
use App\Models\KelasSenam;
use App\Models\Pelatih;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;


class JadwalController extends Controller
{
    public function index()
    {
        $data = [
            'jadwal' => JadwalSesi::all(),
        ];
        // dd($data);
        return view('jadwal.index', compact('data'));
    }

    public function insert()
    {
        $data = [
            'senam'=>KelasSenam::all(),
            'pelatih'=>Pelatih::all(),
        ];
        // dd($data);
        return view('jadwal.insert',compact('data'));
    }

    public function store(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'senam'     => 'required',
            'pelatih'   => 'required',
            'tanggal'   => 'required',
            'jam'   => 'required',
        ], [
            'senam.required'    => 'Kelas Harus Diisi!',
            'pelatih.required'  => 'Pelatih Harus Diisi!',
            'tanggal.required'  => 'Tanggal Harus Diisi!',
            'jam.required'  => 'Jam Harus Diisi!',
        ]);

        if($validate->fails()){
            Session::put('sweetalert', 'warning');
            return redirect()->back()->with('alert', 'Gagal Menambah Data Pelatih!')->withErrors($validate);
        }

        $cek_data = JadwalSesi::
        where('hari','=',$request->tanggal)->first();
        if ($cek_data) {
            Session::put('sweetalert', 'warning');
            return redirect()->back()->with('alert', 'Pada '.DATE('l, d M Y',strtotime($request->tanggal)).' Jadwal sudah terisi '.$cek_data->senam->nama.' pada jam '.DATE('H:i',strtotime($cek_data->jam)).' oleh '.$cek_data->pelatih->nama)->withErrors($validate);
        }
        $cek_data = JadwalSesi::
        where('senam_id','=',$request->senam)->
        where('user_id','=',$request->pelatih)->
        where('hari','=',$request->tanggal)->
        where('jam','=',$request->jam)->
        first();
        if ($cek_data) {
            Session::put('sweetalert', 'warning');
            return redirect()->back()->with('alert', 'Data sudah ada')->withErrors($validate);
        }
        $cek_data_hari = JadwalSesi::
        where('user_id','=',$request->pelatih)->
        where('hari','=',$request->tanggal)->first();
        if ($cek_data_hari) {
            Session::put('sweetalert', 'warning');
            return redirect()->back()->with('alert', 'Pelatih sudah ada jadwal untuk hari ini pada jam '.DATE('H:i',strtotime($cek_data_hari->jam)).' WIB')->withErrors($validate);
        }

        JadwalSesi::insert([
            'senam_id'      => $request->senam,
            'user_id'       => $request->pelatih,
            'hari'          => $request->tanggal,
            'jam'          => $request->jam,
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now()
        ]);

        Session::put('sweetalert', 'success');
        return redirect()->route('a.jadwal')->with('alert', 'Sukses Menambahkan Data');
    }

    public function edit($id)
    {
        $data = [
            'senam'=>KelasSenam::all(),
            'pelatih'=>Pelatih::all(),
            'jadwal' => JadwalSesi::find($id),
        ];
        // dd($data);
        return view('jadwal.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        // dd($request,$id);
        $validate = Validator::make($request->all(),[
            'senam'     => 'required',
            'pelatih'   => 'required',
            'tanggal'   => 'required',
            'jam'   => 'required',
        ], [
            'senam.required'    => 'Kelas Harus Diisi!',
            'pelatih.required'  => 'Pelatih Harus Diisi!',
            'tanggal.required'  => 'Tanggal Harus Diisi!',
            'jam.required'  => 'Jam Harus Diisi!',
        ]);

        if($validate->fails()){
            Session::put('sweetalert', 'warning');
            return redirect()->back()->with('alert', 'Gagal Menambah Data Pelatih!')->withErrors($validate);
        }

        //cek kesamaan data
        $data_awal = JadwalSesi::find($id);
        $data_exist = JadwalSesi::
        where('senam_id','=',$request->senam)->
        where('user_id','=',$request->pelatih)->
        where('hari','=',$request->tanggal)->
        where('jam','=',$request->jam)->
        first();
        if ($data_exist) {
            // jika data sama update sama dengan data yang mau diubah
            if (
                $data_awal->senam_id==$data_exist->senam_id
                &&
                $data_awal->user_id==$data_exist->user_id
                &&
                $data_awal->hari==$data_exist->hari
                &&
                $data_awal->jam==$data_exist->jam
            ) {
                Session::put('sweetalert', 'warning');
                return redirect()->back()->with('alert', 'Data tidak berubah');
            }
        }

        //cek ubah data pelatih saja
        $cek_data_hari = JadwalSesi::
        where('hari','=',$request->tanggal)->first();
        if ($cek_data_hari&&$cek_data_hari->user_id!=$data_awal->user_id) {
            Session::put('sweetalert', 'warning');
            return redirect()->back()->with('alert', 'Pada '.DATE('l, d M Y',strtotime($request->tanggal)).' Jadwal sudah terisi '.$cek_data_hari->senam->nama.' pada jam '.DATE('H:i',strtotime($cek_data_hari->jam)).' oleh '.$cek_data_hari->pelatih->nama)->withErrors($validate);
        }

        // dd($data_awal,$data_exist);
        // dd('masuk update jenis senam');

        JadwalSesi::where('id', $id)->update([
            'senam_id'      => $request->senam,
            'user_id'       => $request->pelatih,
            'hari'          => $request->tanggal,
            'jam'          => $request->jam,
            'updated_at'    => Carbon::now()
        ]);

        Session::put('sweetalert', 'success');
        return redirect()->route('a.jadwal')->with('alert', 'Sukses Mengedit Data');
    }

    public function destroy($id)
    {
        $jadwal = JadwalSesi::find($id);
        // $status = false;
        if($jadwal){
            JadwalSesi::where('id', $id)->delete();
            DB::statement('ALTER TABLE jadwal_sesies AUTO_INCREMENT=0');
            // $status = true;
        }
        // return $status;
    }
}
