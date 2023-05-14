<?php

namespace Database\Seeders;

use App\Models\JenisPt;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JenisPtSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'Universitas', 'Institut', 'Akademi', 'Politeknik'
        ];
        JenisPt::truncate();
        foreach ($data as $value) {
            JenisPt::create([
                'nama' => $value
            ]);
        }
    }
}
