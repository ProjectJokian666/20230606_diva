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
        if(Auth::user()->role_id == 4 || Auth::user()->role_id == 5){
            $pembayaran = DB::select("
                SELECT a.nama as nama_anggota, ks.nama as nama_kelas, p.id, p.total_dibayar, p.bukti_transfer, p.status_konfirmasi
                FROM anggotais a, kelas_senams ks, pembayaran p, pendaftaran_kelases pk
                WHERE a.id = p.anggota_id AND pk.id = p.pendaftaran_kelas_id AND ks.id = pk.kelas_senam_id AND pk.user_id = '".Auth::user()->id."'
            ");

            $belumDibayar = DB::select("
                SELECT ks.nama as nama_kelas, ks.harga, js.nama_sesi, CONCAT(js.start, ' - ', js.finish) as jam, p.nama as nama_pelatih, pk.total_harga, CONCAT(pk.persen_diskon, ' | ', pk.total_diskon) as diskon, pk.status_pembayaran, pk.paket_mulai, pk.paket_selesai, pk.id
                FROM pendaftaran_kelases pk , kelas_senams ks, jadwal_sesies js, pelatihs p
                WHERE  pk.kelas_senam_id = ks.id AND ks.jadwal_sesi_id = js.id AND ks.pelatih_id = p.id
                    AND pk.user_id = '".Auth::user()->id."'
            ");
            $no = 1;
            $noBP = 1;
            return view('pembayaran.index', compact(['pembayaran', 'no', 'belumDibayar', 'noBP']));
        }else{
            $pembayaran = DB::select("
                SELECT a.nama as nama_anggota, ks.nama as nama_kelas, p.id, p.total_dibayar, p.bukti_transfer, p.status_konfirmasi
                FROM anggotais a, kelas_senams ks, pembayaran p, pendaftaran_kelases pk
                WHERE a.id = p.anggota_id AND pk.id = p.pendaftaran_kelas_id AND ks.id = pk.kelas_senam_id
            ");
            $belumDibayar = [];
            $no = 1;
            $noBP = 1;
            return view('pembayaran.index', compact(['pembayaran', 'belumDibayar', 'no', 'noBP']));
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
