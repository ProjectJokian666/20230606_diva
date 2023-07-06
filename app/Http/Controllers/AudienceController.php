<?php

namespace App\Http\Controllers;

use App\Models\Audience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\KelasSenam;
use App\Models\Events;

class AudienceController extends Controller
{
    public function index()
    {
        $data = [
            'kelas' => KelasSenam::all(),
            'event' => Events::all(),
        ];
        
        return view('audience.index', compact('data'));
    }
}
