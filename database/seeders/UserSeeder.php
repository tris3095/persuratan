<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'nama'          => 'Super Admin',
            'email'         => 'superadmin@gmail.com',
            'password'      => Hash::make('Superadmin@1234'),
            'id_jabatan'    => 1,
        ]);
        User::create([
            'nama'          => 'Admin',
            'email'         => 'admin@gmail.com',
            'password'      => Hash::make('123456'),
            'id_jabatan'    => 2,
        ]);
    }
}
