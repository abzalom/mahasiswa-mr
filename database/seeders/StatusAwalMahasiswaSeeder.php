<?php

namespace Database\Seeders;

use App\Models\StatusAwalMahasiswa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusAwalMahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        StatusAwalMahasiswa::truncate();
        StatusAwalMahasiswa::create([
            'nama' => 'Peserta Didik Baru'
        ]);
        StatusAwalMahasiswa::create([
            'nama' => 'Peserta Pindahan'
        ]);
    }
}
