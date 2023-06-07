<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\KelasSenam;
use App\Models\Pelatih;
use App\Models\Pembayaran;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $pelatih    = count(Pelatih::all());
        $member     = count(Anggota::all());
        $kelas      = count(KelasSenam::all());
        $pembayaran = count(Pembayaran::all());
        return view('dashboard.index', compact(['pelatih', 'member', 'kelas', 'pembayaran']));
    }
}
