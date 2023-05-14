<?php

namespace Database\Seeders;

use App\Models\JalurMasuk;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JalurMasukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        JalurMasuk::truncate();
        JalurMasuk::create([
            'nama' => 'reguler',
        ]);
        JalurMasuk::create([
            'nama' => 'ekstensi',
        ]);
        JalurMasuk::create([
            'nama' => 'tugal belajar',
        ]);
        JalurMasuk::create([
            'nama' => 'ijin belajar',
        ]);
    }
}
