<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PemilikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pemiliks')->delete();
        DB::table('pemiliks')->insert([
            'user_id'           => 1,
            'nama'              => 'Pemilik',
            'alamat'            => 'Jl. Jendral Sudirman no 11',
            'tempat_lahir'      => 'Kediri',
            'tgl_lahir'         => '1998-02-12',
            'jenis_kelamin'     => 'Laki-Laki',
            'no_telp'           => '081203849121',
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now()
        ]);
    }
}
