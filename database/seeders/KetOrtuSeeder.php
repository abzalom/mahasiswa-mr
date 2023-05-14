<?php

namespace Database\Seeders;

use App\Models\KetOrtu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KetOrtuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        KetOrtu::truncate();
        KetOrtu::create([
            'nama' => 'Masih Hidup'
        ]);
        KetOrtu::create([
            'nama' => 'Sudah Meniggal'
        ]);
    }
}
