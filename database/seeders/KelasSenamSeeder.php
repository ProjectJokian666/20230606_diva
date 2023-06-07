<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KelasSenamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kelas_senams')->delete();
        DB::table('kelas_senams')->insert([
            [
                'nama'                  => 'Aerobic Pemula',
                'harga'                 => 120000,
                'diskon'                => 10,
            ],
            [
                'nama'                  => 'Aerobic Koreo',
                'harga'                 => 120000,
                'diskon'                => 10,
            ],
            [
                'nama'                  => 'Yoga',
                'harga'                 => 10000,
                'diskon'                => 0,
            ],
            [
                'nama'                  => 'Aerobic Zumba',
                'harga'                 => 120000,
                'diskon'                => 10,
            ],
        ]);
    }
}
