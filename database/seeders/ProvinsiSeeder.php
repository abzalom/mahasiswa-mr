<?php

namespace Database\Seeders;

use App\Models\Provinsi;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProvinsiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = Storage::disk('data')->get('provinsi.json');
        $data = json_decode($json, true);

        Provinsi::truncate();
        foreach ($data as $value) {
            Provinsi::create([
                'nama' => $value['nama'],
                'provinsi' => $value['provinsi'],
            ]);
        }
    }
}
