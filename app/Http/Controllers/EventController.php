<?php

namespace App\Http\Controllers;

use App\Models\Events;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

use App\Models\IkutEvent;

class EventController extends Controller
{
    public function index()
    {
        if (Auth()->user()->role_id==1||Auth()->user()->role_id==2) {
            $data = [
                'event' => Events::all(),
            ];
        }
        else{
            $data = [
                'event' => Events::where(DB::RAW("concat(tanggal,' ',jam)"),">=",DB::RAW("concat(curdate(),' ',curtime())"))->orderBy('tanggal', 'DESC')->get(),
            ];
        }
        return view('event.index', compact('data'));
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
            'jam' => 'required',
            'nama_event'=> 'required',
            'detail_event' => 'required',
            'diskon_event' => 'required',
            'harga_event' => 'required',
        ], [
            'tanggal.required' => 'Tanggal Harus Diisi!',
            'jam.required' => 'Tanggal Harus Diisi!',
            'nama_event.required' => 'Nama Harus Diisi!',
            'detail_event.required' => 'Detail Harus Diisi!',
            'diskon_event.required' => 'Diskon Harus Diisi!',
            'harga_event.required' => 'Harga Harus Diisi!',
        ]);

        if($validate->fails()){
            Session::put('sweetalert', 'warning');
            return redirect()->back()->with('alert', 'Gagal Mnambahkan Data Event!')->withErrors($validate);
        }

        Events::insert([
            'tanggal' => $request->tanggal,
            'jam' => $request->jam,
            'nama_event' => $request->nama_event,
            'detail_event' => $request->detail_event,
            'diskon_event' => $request->diskon_event,
            'harga_event' => $request->harga_event,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        Session::put('sweetalert', 'success');
        return redirect()->route('a.event')->with('alert', 'Sukses Menambahkan Data Event');
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
            'jam' => 'required',
            'nama_event'=> 'required',
            'detail_event' => 'required',
            'diskon_event' => 'required',
            'harga_event' => 'required',
        ], [
            'tanggal.required' => 'Tanggal Harus Diisi!',
            'jam.required' => 'Jam Harus Diisi!',
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
            'jam' => $request->jam,
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

    public function tambah_event($id,Request $request)
    {
        $cek_data = IkutEvent::where('event_id','=',$id)->where('user_id','=',Auth()->user()->anggota->id)->first();
        // dd($id,$request,Auth()->user()->anggota->id);
        if($cek_data){
            // dd('ada');
            Session::put('sweetalert', 'danger');
            return redirect()->route('m.event')->with('alert', 'Data Sudah Ada');
        }
        else{
            // dd('tidak');
            $insert_data = IkutEvent::insert([
                'event_id'=>$id,
                'user_id'=>Auth()->user()->anggota->id,
            ]);
            if ($insert_data) {
                Session::put('sweetalert', 'success');
                return redirect()->route('m.event')->with('alert', 'Sukses Menambahkan Data');
            }
            else{
                Session::put('sweetalert', 'danger');
                return redirect()->route('m.event')->with('alert', 'Gagal Menambahkan Data');
            }
        }
    }

    public function delete_event($jadwal,Request $request)
    {
        $cek_data = IkutEvent::where('event_id','=',$jadwal)->where('user_id','=',Auth()->user()->anggota->id)->first();
        // dd($id,$request,Auth()->user()->anggota->id);
        if($cek_data){
            // dd('ada');
            $delete_data = IkutEvent::where('event_id','=',$jadwal)->where('user_id','=',Auth()->user()->anggota->id)->delete();
            if ($delete_data) {
                DB::statement('ALTER TABLE ikut_event AUTO_INCREMENT=0');
                Session::put('sweetalert', 'success');
                return redirect()->route('m.event')->with('alert', 'Sukses menghapus Data');
            }
            else{
                Session::put('sweetalert', 'danger');
                return redirect()->route('m.event')->with('alert', 'Gagal menghapus Data');
            }
        }
        else{
            // dd('tidak');
            Session::put('sweetalert', 'danger');
            return redirect()->route('m.event')->with('alert', 'Data Tidak Ada');
        }
    }
}
