<?php

namespace Database\Seeders;

use App\Models\Pekerjaan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PekerjaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = Storage::disk('data')->get('pekerjaan.json');
        $data = json_decode($json, true);

        Pekerjaan::truncate();
        foreach ($data as $value) {
            Pekerjaan::create([
                'nama' => $value['nama'],
            ]);
        }
    }
}
