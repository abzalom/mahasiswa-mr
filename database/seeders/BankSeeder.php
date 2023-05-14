<?php

namespace Database\Seeders;

use App\Models\Bank;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = Storage::disk('data')->get('bank.json');
        $data = json_decode($json, true);

        Bank::truncate();
        foreach ($data as $value) {
            Bank::create([
                'nama' => $value['nama'],
                'kode' => $value['kode'],
            ]);
        }
    }
}
