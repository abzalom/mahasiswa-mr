<?php

namespace Database\Seeders;

use App\Models\VerifyStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VerifyStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        VerifyStatus::truncate();
        VerifyStatus::create([
            'name' => 'LENGKAP',
        ]);
        VerifyStatus::create([
            'name' => 'TIDAK LENGKAP',
        ]);
    }
}
