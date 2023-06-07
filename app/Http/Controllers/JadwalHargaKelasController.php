<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JadwalHargaKelasController extends Controller
{
    public function index()
    {
        $kelassenam = DB::select("
            SELECT ks.*, concat(js.start, '-', js.finish) as sesi, p.nama as nama_pelatih, 
            FROM kelas_senams ks, jadwal_sesies js, pelatihs p
            WHERE ks.jadwal_sesi_id = js.id
                AND ks.pelatih_id = p.id
        ");
        $no = 1;
        return view('kelassenam.index', compact(['kelassenam', 'no']));
    }
}
