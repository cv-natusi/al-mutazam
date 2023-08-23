<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Users;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Users::create([
            'name_user' => 'Administrator',
            'email' => 'admin',
            'password' => bcrypt('admin'),
            'level'=> '1',
            'active'=> 'active'
        ]);
        Users::create([
            'name_user' => 'Petugas Sekolah',
            'email' => 'petugas',
            'password' => bcrypt('petugas'),
            'level'=> '2',
            'active'=> 'active'
        ]);
        Users::create([
            'name_user' => 'Guru Pengajar',
            'email' => 'guru',
            'password' => bcrypt('guru'),
            'level'=> '3',
            'active'=> 'active'
        ]);
    }
}
