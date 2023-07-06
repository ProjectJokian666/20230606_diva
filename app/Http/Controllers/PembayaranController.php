<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\PendaftaranKelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PembayaranController extends Controller
{
    public function index()
    {
        if(Auth::user()->role_id == 4){
            $data = [

            ];
            return view('pembayaran.index', compact(['data']));
        }else{
            $data = [

            ];
            return view('pembayaran.index', compact(['data']));
        }

    }

    public function acceptPayment($id)
    {
        $pembayaran = Pembayaran::where('id', $id);
        if($pembayaran){
            $pembayaranData = $pembayaran->first();
            PendaftaranKelas::where('id', $pembayaranData->pendaftaran_kelas_id)->update(['status_pembayaran' => 1]);
            $pembayaran->update(['status_konfirmasi' => 1]);
        }
    }

    public function rejectPayment($id)
    {
        $pembayaran = Pembayaran::where('id', $id);
        if($pembayaran){
            $pembayaranData = $pembayaran->first();
            PendaftaranKelas::where('id', $pembayaranData->pendaftaran_kelas_id)->update(['status_pembayaran' => 2]);
            $pembayaran->update(['status_konfirmasi' => 2]);
        }
    }
}
