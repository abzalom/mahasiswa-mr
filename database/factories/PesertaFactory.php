<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Peserta>
 */
class PesertaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'username' => fake()->unique()->userName(),
            'email' => fake()->unique()->email(),
            'email_verified_at' => now(),
            'phone' => fake()->unique()->phoneNumber(),
            'phone_verified_at' => now(),
            'password' => Hash::make('password'),
            'terms' => true,
            'adress' => fake()->address(),
            'provinsi_id' => 32,
            'kab_kota_id' => fake()->numberBetween(474, 502),
            'kode_pos' => fake()->unique()->numberBetween(0, 100000),
            // 'directory' => '',
            // 'file_name' => '',
            'nama' => fake()->name(),
            'tempat_lahir' => fake()->city(),
            'tanggal_lahir' => fake()->unique()->dateTimeBetween('-21 years', 'now')->format('Y-m-d H:i:s'),
            'gender' => fake()->numberBetween(1, 2),
            'nik' => fake()->unique()->numberBetween(0, 10000000000000000),
            'nim' => fake()->unique()->numberBetween(0, 1000000000),
            'nama_pt' => fake()->company(),
            'jenis_pt_id' => fake()->numberBetween(1, 4),
            'fakultas' => fake()->company(),
            'prody' => fake()->company(),
            'semester_id' => fake()->numberBetween(1, 8),
            'jenjang_id' => 1,
            'tanggal_masuk' => fake()->dateTimeBetween('-10 years')->format('Y-m-d H:i:s'),
            'jalur_masuk_id' => fake()->numberBetween(1, 4),
            'status_awal_mahasiswa_id' => fake()->numberBetween(1, 2),
            'status_mahasiswa_id' => fake()->numberBetween(1, 3),

            'nomor_kk' => fake()->numberBetween(0, 10000000000000000),

            'nama_ayah' => fake()->name('male'),
            'pendidikan_ayah' => fake()->numberBetween(1, 5),
            'status_ayah' => fake()->numberBetween(1, 2),
            'pekerjaan_ayah' => fake()->numberBetween(1, 7),
            'penghasilan_ayah' => fake()->numberBetween(1, 4),
            'keterangan_ayah' => fake()->numberBetween(1, 2),

            'nama_ibu' => fake()->name('female'),
            'pendidikan_ibu' => fake()->numberBetween(1, 5),
            'status_ibu' => fake()->numberBetween(1, 2),
            'pekerjaan_ibu' => fake()->numberBetween(1, 7),
            'penghasilan_ibu' => fake()->numberBetween(1, 4),
            'keterangan_ibu' => fake()->numberBetween(1, 2),

            'nama_rekening' => fake()->name(),
            'norek' => fake()->unique()->numberBetween(0, 1000000000000),
            'bank_id' => 49,
            'cabang' => fake()->city(),
            'kirim' => false,
            // 'foto_rekening' => '',
            // 'foto_peserta' => '',
            // 'file_kk' => '',
            // 'file_kpm' => '',
            // 'file_khs' => '',
            // 'file_krs' => '',
            // 'file_surat_aktif' => '',
            // 'foto_kwitansi' => '',
            // 'foto_dikti' => '',
            'keterangan' => fake()->text(100),
        ];
    }
}
