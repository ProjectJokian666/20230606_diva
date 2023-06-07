<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PelatihSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pelatihs')->delete();
        DB::table('pelatihs')->insert([
            [
                'user_id'           => 3,
                'nama'              => 'Pelatih1',
                'asal_kota'         => 'Kediri',
                'alamat'            => 'Jl. Kumbang Selatan No 11',
                'tempat_lahir'      => 'Madiun',
                'tgl_lahir'         => '1999-12-12',
                'jenis_kelamin'     => 'Laki-Laki',
                'no_telp'           => '08129834612',
                'jenis_pelatih'     => 'Aerobic pemula',
                'status_kepelatihan'=> 1,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now()
            ],
            [
                'user_id'           => 4,
                'nama'              => 'Pelatih2',
                'asal_kota'         => 'Kediri',
                'alamat'            => 'Jl. Kumbang Utara No 11',
                'tempat_lahir'      => 'Madiun',
                'tgl_lahir'         => '1992-02-12',
                'jenis_kelamin'     => 'Laki-Laki',
                'no_telp'           => '08129834612',
                'jenis_pelatih'     => 'Aerobic koreo',
                'status_kepelatihan'=> 1,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now()
            ],
            [
                'user_id'           => 5,
                'nama'              => 'Pelatih3',
                'asal_kota'         => 'Kediri',
                'alamat'            => 'Jl. Kumbang Selatan No 11',
                'tempat_lahir'      => 'Madiun',
                'tgl_lahir'         => '1999-12-12',
                'jenis_kelamin'     => 'Laki-Laki',
                'no_telp'           => '08129834612',
                'jenis_pelatih'     => 'Yoga',
                'status_kepelatihan'=> 1,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now()
            ],
            [
                'user_id'           => 6,
                'nama'              => 'Pelatih4',
                'asal_kota'         => 'Kediri',
                'alamat'            => 'Jl. Kumbang Selatan No 11',
                'tempat_lahir'      => 'Madiun',
                'tgl_lahir'         => '1999-12-12',
                'jenis_kelamin'     => 'Laki-Laki',
                'no_telp'           => '08129834612',
                'jenis_pelatih'     => 'Aerobic Zumba',
                'status_kepelatihan'=> 1,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now()
            ],
        ]);
    }
}
