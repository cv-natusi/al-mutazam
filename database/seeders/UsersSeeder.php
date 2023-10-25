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
            'email' => '3527162918000001',
            'password' => bcrypt('3527162918000001'),
            'lihat_password' => '3527162918000001',
            'level'=> '1',
            'active'=> 'active'
        ]);
        Users::create([
            'name_user' => 'Petugas Sekolah',
            'email' => '3527162918000002',
            'password' => bcrypt('3527162918000002'),
            'lihat_password' => '3527162918000002',
            'level'=> '2',
            'active'=> 'active'
        ]);
        Users::create([
            'name_user' => 'Guru Pengajar',
            'email' => '3527162918000003',
            'password' => bcrypt('3527162918000003'),
            'lihat_password' => '3527162918000003',
            'level'=> '3',
            'active'=> 'active'
        ]);
    }
}
