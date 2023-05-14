<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            BankSeeder::class,
            JalurMasukSeeder::class,
            JenisPtSeeder::class,
            JenjangSeeder::class,
            JabatanSeeder::class,
            KabKotaSeeder::class,
            KetOrtuSeeder::class,
            PekerjaanSeeder::class,
            PendidikanSeeder::class,
            PenghasilanSeeder::class,
            ProvinsiSeeder::class,
            SemesterSeeder::class,
            StatusAwalMahasiswaSeeder::class,
            StatusMahasiswaSeeder::class,
            StatusOrtuSeeder::class,
            // PesertaSeeder::class,
            VerifyStatusSeeder::class,
            RolesAndPermissionsSeeder::class,
        ]);
    }
}
