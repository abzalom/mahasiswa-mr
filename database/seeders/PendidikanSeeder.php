<?php

namespace Database\Seeders;

use App\Models\Pendidikan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PendidikanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pendidikan::truncate();
        Pendidikan::create([
            'nama' => 'Tidak Bersekolah'
        ]);
        Pendidikan::create([
            'nama' => 'SD'
        ]);
        Pendidikan::create([
            'nama' => 'SMP / Sederajat'
        ]);
        Pendidikan::create([
            'nama' => 'SMA / SMK / Sederajat'
        ]);
        Pendidikan::create([
            'nama' => 'Sarjana'
        ]);
    }
}
