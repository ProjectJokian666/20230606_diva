<?php

namespace App\Http\Controllers;

use App\Models\JadwalSesi;
use App\Models\KelasSenam;
use App\Models\Pelatih;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class KelasSenamController extends Controller
{
    public function index()
    {
        $data = [
            'kelassenam'=>KelasSenam::all(),
        ];
        return view('kelassenam.index', compact('data'));
    }

    public function insert()
    {
        return view('kelassenam.insert');
    }

    public function store(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'nama'               => 'required',
            'harga'               => 'required',
            'diskon'               => 'required',
        ], [
            'nama.required'             => 'Nama Harus Diisi!',
            'harga.required'             => 'Nama Harus Diisi!',
            'diskon.required'             => 'Nama Harus Diisi!',
        ]);

        if($validate->fails()){
            Session::put('sweetalert', 'warning');
            return redirect()->back()->with('alert', 'Gagal Mengubah Data Pelatih!')->withErrors($validate);
        }

        KelasSenam::insert([
            'nama'              => $request->nama,
            'harga'             => $request->harga,
            'diskon'            => $request->diskon,
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now()
        ]);

        Session::put('sweetalert', 'success');
        return redirect()->route('a.kelassenam')->with('alert', 'Sukses Menambahkan Data');
    }

    public function edit($id)
    {
        $kelassenam = KelasSenam::find($id);
        return view('kelassenam.edit', compact(['kelassenam']));
    }

    public function update(Request $request, $id)
    {
        $validate = Validator::make($request->all(),[
            'nama'               => 'required',
            'harga'               => 'required',
            'diskon'               => 'required',
        ], [
            'nama.required'             => 'Nama Harus Diisi!',
            'harga.required'             => 'Nama Harus Diisi!',
            'diskon.required'             => 'Nama Harus Diisi!',
        ]);

        if($validate->fails()){
            Session::put('sweetalert', 'warning');
            return redirect()->back()->with('alert', 'Gagal Mengubah Data Data!')->withErrors($validate);
        }

        KelasSenam::where('id', $id)->update([
            'nama'              => $request->nama,
            'harga'             => $request->harga,
            'diskon'            => $request->diskon,
            'updated_at'        => Carbon::now(),
        ]);

        Session::put('sweetalert', 'success');
        return redirect()->route('a.kelassenam')->with('alert', 'Sukses Mengubah Data');
    }

    public function destroy($id)
    {
        $kelassenam = KelasSenam::find($id);
        if($kelassenam){
            KelasSenam::where('id', $id)->delete();
            DB::statement('alter table kelas_senams auto_increment=0');
        }
    }
}
