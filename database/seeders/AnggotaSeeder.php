<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnggotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('anggotais')->insert([
            [
                'user_id'           => 7,
                'nama'              => 'member1',
                'alamat'            => 'Jl. Sawojajar No 12, Jombang',
                'tempat_lahir'      => 'Kediri',
                'tgl_lahir'         => '1999-12-31',
                'jenis_kelamin'     => 'Laki-Laki',
                'no_telp'           => '08172937161',
                'status_anggota'    => 1,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now()
            ],
            [
                'user_id'           => 8,
                'nama'              => 'member2',
                'alamat'            => 'Jl. Sawotimur No 12, Kediri',
                'tempat_lahir'      => 'Jombang',
                'tgl_lahir'         => '1992-04-21',
                'jenis_kelamin'     => 'Perempuan',
                'no_telp'           => '018263812',
                'status_anggota'    => 1,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now()
            ],
            [
                'user_id'           => 9,
                'nama'              => 'member3',
                'alamat'            => 'Jl. Merdeka No 10, Madiun',
                'tempat_lahir'      => 'Madiun',
                'tgl_lahir'         => '1997-09-11',
                'jenis_kelamin'     => 'Laki-Lai',
                'no_telp'           => '08271036121',
                'status_anggota'    => 1,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now()
            ],
        ]);
    }
}
