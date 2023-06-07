<?php

namespace App\Http\Controllers;

use App\Models\Audience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AudienceController extends Controller
{
    public function index()
    {
        $audience = DB::select("
            SELECT COUNT(audiences.user_id) AS total_audience, kelas_senams.nama, (SELECT COUNT(*) FROM audiences WHERE status_hadir = 1) AS total_hadir
            FROM audiences
            INNER JOIN pendaftaran_kelases ON pendaftaran_kelases.id = audiences.pendaftaran_kelas_id
            INNER JOIN kelas_senams ON kelas_senams.id = pendaftaran_kelases.kelas_senam_id
            INNER JOIN users ON users.id = audiences.user_id;
        ");
        $no = 1;
        
        return view('audience.index', compact(['audience', 'no']));
    }
}
