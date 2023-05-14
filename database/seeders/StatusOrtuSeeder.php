<?php

namespace Database\Seeders;

use App\Models\StatusOrtu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusOrtuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        StatusOrtu::truncate();
        StatusOrtu::create(
            [
                'nama' => 'Orang Tua Kandung',
            ],
        );
        StatusOrtu::create(
            [
                'nama' => 'Orang Tua Asuh / Angkat',
            ],
        );
    }
}
