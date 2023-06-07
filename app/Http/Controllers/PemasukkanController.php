<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PemasukkanController extends Controller
{
    public function index()
    {
        if(Auth::user()->role_id == 3){
            $pemasukkan = DB::select("
                SELECT ks.nama, p.*
                FROM kelas_senams ks, pemasukkan_pelatihs p, pendaftaran_kelases pk
                WHERE p.pendaftaran_kelas_id = pk.id
                    AND pk.kelas_senam_id = ks.id
                    AND p.user_id = '".Auth::user()->id."'
            ");
            $no = 1;
            return view('pemasukkan.pelatih.index', compact(['pemasukkan', 'no']));
        }else{
            $pemasukkan = DB::select("
                SELECT ks.nama, p.*
                FROM kelas_senams ks, pemasukkans p, pendaftaran_kelases pk
                WHERE p.pendaftaran_kelas_id = pk.id
                    AND pk.kelas_senam_id = ks.id
            ");
            $no = 1;
            return view('pemasukkan.pemilik.index', compact(['pemasukkan', 'no']));
        }
        
    }
}
