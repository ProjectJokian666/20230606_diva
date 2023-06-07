<?php

namespace App\Http\Controllers;

use App\Models\Events;
use Carbon\Carbon;
use Illuminate\Http\Request;
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
        $validate = Validator::make($request->all(),[
            'nama_event'      => 'required',
            'detail_event'          => 'required',
            'event_start'         => 'required',
            'event_finish'         => 'required'
        ], [
            'nama_event.required'     => 'Nama Harus Diisi!',
            'detail_event.required'         => 'Email Harus Diisi!',
            'event_start.required'        => 'Asal Kota Harus Diisi!',
            'event_finish.required'        => 'Asal Kota Harus Diisi!'
        ]);

        if($validate->fails()){
            Session::put('sweetalert', 'warning');
            return redirect()->back()->with('alert', 'Gagal Mengubah Data Event!')->withErrors($validate);
        }

        Events::insert([
            'nama_event'        => $request->nama_event,
            'detail_event'      => $request->detail_event,
            'event_start'       => $request->event_start,
            'event_finish'      => $request->event_finish,
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now()
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
            'nama_event'      => 'required',
            'detail_event'          => 'required',
            'event_start'         => 'required',
            'event_finish'         => 'required'
        ], [
            'nama_event.required'     => 'Nama Harus Diisi!',
            'detail_event.required'         => 'Email Harus Diisi!',
            'event_start.required'        => 'Asal Kota Harus Diisi!',
            'event_finish.required'        => 'Asal Kota Harus Diisi!'
        ]);

        if($validate->fails()){
            Session::put('sweetalert', 'warning');
            return redirect()->back()->with('alert', 'Gagal Mengubah Data Event!')->withErrors($validate);
        }

        Events::where('id', $id)->update([
            'nama_event'        => $request->nama_event,
            'detail_event'      => $request->detail_event,
            'event_start'       => $request->event_start,
            'event_finish'      => $request->event_finish,
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
        }   
    }
}
