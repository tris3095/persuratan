<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Jabatan;
use Illuminate\Database\Seeder;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Jabatan::create([
            'nama'          => 'Super Admin',
            'nama_singkat'  => 'Super Admin'
        ]);
        Jabatan::create([
            'nama'          => 'Admin',
            'nama_singkat'  => 'Admin'
        ]);
    }
}
