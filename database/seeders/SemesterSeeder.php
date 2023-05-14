<?php

namespace Database\Seeders;

use App\Models\Semester;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SemesterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'Semester 1',
            'Semester 2',
            'Semester 3',
            'Semester 4',
            'Semester 5',
            'Semester 6',
            'Semester 7',
            'Semester 8',
        ];
        Semester::truncate();
        foreach ($data as $value) {
            Semester::create([
                'nama' => $value
            ]);
        }
    }
}
