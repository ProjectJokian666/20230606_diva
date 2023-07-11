<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IkutEvent;
use App\Models\IkutKelas;
use App\Models\Anggota;

class HistoryController extends Controller
{
    public function event()
    {
        $id = Anggota::where('user_id',Auth()->user()->id)->first();
        $data = [
            'event' => IkutEvent::where('user_id',$id->id)->get(),
        ];
        // dd($data);
        return view('event.history_event', compact('data'));
    }
    public function kelas()
    {
        $id = Anggota::where('user_id',Auth()->user()->id)->first();
        $data = [
            'jadwal' => IkutKelas::where('user_id',$id->id)->get(),
        ];
        // dd($data);
        return view('event.history_kelas', compact('data'));
    }
}
