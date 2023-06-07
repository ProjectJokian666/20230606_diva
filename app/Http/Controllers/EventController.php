<?php

namespace App\Http\Controllers;

use App\Models\Events;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class EventController extends Controller
{
    public function index()
    {
        $event = Events::orderBy('created_at', 'DESC')->get();
        $no = 1;
        return view('event.index', compact(['event', 'no']));
    }

    public function insert()
    {
        return view('event.insert');
    }

    public function store(Request $request)
    {
        // dd($request);
        $validate = Validator::make($request->all(),[
            'tanggal' => 'required',
            'nama_event'=> 'required',
            'detail_event' => 'required',
            'diskon_event' => 'required',
            'harga_event' => 'required',
        ], [
            'tanggal.required' => 'Tanggal Harus Diisi!',
            'nama_event.required' => 'Nama Harus Diisi!',
            'detail_event.required' => 'Detail Harus Diisi!',
            'diskon_event.required' => 'Diskon Harus Diisi!',
            'harga_event.required' => 'Harga Harus Diisi!',
        ]);

        if($validate->fails()){
            Session::put('sweetalert', 'warning');
            return redirect()->back()->with('alert', 'Gagal Mengubah Data Event!')->withErrors($validate);
        }

        Events::insert([
            'tanggal' => $request->tanggal,
            'nama_event' => $request->nama_event,
            'detail_event' => $request->detail_event,
            'diskon_event' => $request->diskon_event,
            'harga_event' => $request->harga_event,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        Session::put('sweetalert', 'success');
        return redirect()->route('a.event')->with('alert', 'Sukses Menambahkan Data');
    }

    public function edit($id)
    {
        $event = Events::find($id);
        return view('event.edit', compact(['event']));
    }

    public function update(Request $request, $id)
    {
        $validate = Validator::make($request->all(),[
            'tanggal' => 'required',
            'nama_event'=> 'required',
            'detail_event' => 'required',
            'diskon_event' => 'required',
            'harga_event' => 'required',
        ], [
            'tanggal.required' => 'Tanggal Harus Diisi!',
            'nama_event.required' => 'Nama Harus Diisi!',
            'detail_event.required' => 'Detail Harus Diisi!',
            'diskon_event.required' => 'Diskon Harus Diisi!',
            'harga_event.required' => 'Harga Harus Diisi!',
        ]);

        if($validate->fails()){
            Session::put('sweetalert', 'warning');
            return redirect()->back()->with('alert', 'Gagal Mengubah Data Event!')->withErrors($validate);
        }

        Events::where('id', $id)->update([
            'tanggal' => $request->tanggal,
            'nama_event' => $request->nama_event,
            'detail_event' => $request->detail_event,
            'diskon_event' => $request->diskon_event,
            'harga_event' => $request->harga_event,
            'updated_at'        => Carbon::now()
        ]);

        Session::put('sweetalert', 'success');
        return redirect()->route('a.event')->with('alert', 'Sukses Mengedit Data');
    }

    public function destroy($id)
    {
        $event = Events::find($id);
        if($event){
            Events::where('id', $id)->delete();
            DB::statement('ALTER TABLE events AUTO_INCREMENT=0');
        }   
    }
}
