<?php

namespace Database\Seeders;

use App\Models\KabKota;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KabKotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = Storage::disk('data')->get('kab_kota.json');
        $data = json_decode($json, true);

        KabKota::truncate();
        foreach ($data as $value) {
            KabKota::create([
                'provinsi_id' => $value['id_provinsi'],
                'nama' => $value['nama'],
                'kab_kota' => $value['kab_kota'],
            ]);
        }
    }
}
