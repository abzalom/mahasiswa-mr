<?php

namespace Database\Seeders;

use App\Models\Jenjang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JenjangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nama' => 'Strata 1',
                'singkat' => 'S1',
            ],
            [
                'nama' => 'Strata 2',
                'singkat' => 'S2',
            ],
            [
                'nama' => 'Doktoral',
                'singkat' => 'S3',
            ],
        ];
        Jenjang::truncate();
        foreach ($data as $value) {
            Jenjang::create([
                'nama' => $value['nama'],
                'singkat' => $value['singkat'],
            ]);
        }
    }
}
