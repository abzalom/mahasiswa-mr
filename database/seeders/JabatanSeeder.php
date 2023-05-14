<?php

namespace Database\Seeders;

use App\Models\Jabatan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'jabatan' => 'bupati mamberamo raya',
                'nama' => 'Dr. (HC) John Tabo, M.B.A.',
                'nip' => '',
            ],
            [
                'jabatan' => 'wakil bupati mamberamo raya',
                'nama' => 'Ever Mudumi, S.Sos.',
                'nip' => '',
            ],
            [
                'jabatan' => 'sekretaris daerah',
                'nama' => 'Manogar Sirait, S.Ip',
                'nip' => '19760512 199201 1 003',
            ],
        ];

        Jabatan::truncate();
        foreach ($data as $kolom) {
            Jabatan::create([
                'nama' => $kolom['nama'],
                'jabatan' => $kolom['jabatan'],
                'nip' => $kolom['nip'],
            ]);
        }
    }
}
