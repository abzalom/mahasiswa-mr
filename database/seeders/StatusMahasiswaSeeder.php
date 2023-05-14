<?php

namespace Database\Seeders;

use App\Models\StatusMahasiswa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusMahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        StatusMahasiswa::truncate();
        StatusMahasiswa::create([
            'nama' => 'Aktif'
        ]);
        StatusMahasiswa::create([
            'nama' => 'Cuti'
        ]);
        StatusMahasiswa::create([
            'nama' => 'Tidak Aktif'
        ]);
    }
}
