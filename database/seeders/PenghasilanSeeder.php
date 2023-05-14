<?php

namespace Database\Seeders;

use App\Models\Penghasilan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PenghasilanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Penghasilan::truncate();
        Penghasilan::create([
            'jumlah' => '< 1 juta'
        ]);
        Penghasilan::create([
            'jumlah' => '1 juta s/d 3 juta'
        ]);
        Penghasilan::create([
            'jumlah' => '3 juta s/d 5 juta'
        ]);
        Penghasilan::create([
            'jumlah' => '> 5 juta'
        ]);
    }
}
