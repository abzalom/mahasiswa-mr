<?php

namespace Database\Seeders;

use App\Models\Peserta;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PesertaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = Storage::disk('data')->get('absalom.json');
        $data = json_decode($json, true);

        Peserta::truncate();
        $peserta = Peserta::create($data);

        $peserta->assignRole('peserta');
        // foreach ($data as $value) {
        // }
    }
}
