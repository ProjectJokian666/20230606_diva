<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->delete();
        DB::table('users')->insert([
            [
                'role_id'           => 1,
                'name'              => 'pemilik',
                'username'          => 'pemilik',
                'email'             => 'pemilik@gmail.com',
                'password'          => bcrypt('pemilik'),
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
            [
                'role_id'           => 2,
                'name'              => 'admin',
                'username'          => 'admin',
                'email'             => 'admin@gmail.com',
                'password'          => bcrypt('admin'),
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
            [
                'role_id'           => 3,
                'name'              => 'pelatih1',
                'username'          => 'pelatih1',
                'email'             => 'pelatih1@gmail.com',
                'password'          => bcrypt('pelatih'),
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
            [
                'role_id'           => 3,
                'name'              => 'pelatih2',
                'username'          => 'pelatih2',
                'email'             => 'pelatih2@gmail.com',
                'password'          => bcrypt('pelatih'),
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
            [
                'role_id'           => 3,
                'name'              => 'pelatih3',
                'username'          => 'pelatih3',
                'email'             => 'pelatih3@gmail.com',
                'password'          => bcrypt('pelatih'),
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
            [
                'role_id'           => 3,
                'name'              => 'pelatih4',
                'username'          => 'pelatih4',
                'email'             => 'pelatih4@gmail.com',
                'password'          => bcrypt('pelatih'),
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
            [
                'role_id'           => 4,
                'name'              => 'member1',
                'username'          => 'member1',
                'email'             => 'member1@gmail.com',
                'password'          => bcrypt('member'),
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
            [
                'role_id'           => 4,
                'name'              => 'member2',
                'username'          => 'member2',
                'email'             => 'member2@gmail.com',
                'password'          => bcrypt('member'),
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
            [
                'role_id'           => 4,
                'name'              => 'member3',
                'username'          => 'member3',
                'email'             => 'member3@gmail.com',
                'password'          => bcrypt('member'),
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
            [
                'role_id'           => 5,
                'name'              => 'non-member1',
                'username'          => 'non-member1',
                'email'             => 'non-member1@gmail.com',
                'password'          => bcrypt('non-member'),
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
            [
                'role_id'           => 5,
                'name'              => 'non-member2',
                'username'          => 'non-member2',
                'email'             => 'non-member2@gmail.com',
                'password'          => bcrypt('non-member'),
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
        ]);
    }
}
