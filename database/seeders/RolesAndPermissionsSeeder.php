<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Peserta;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'add user']);
        Permission::create(['name' => 'edit user']);
        Permission::create(['name' => 'lock user']);
        Permission::create(['name' => 'unlock user']);
        Permission::create(['name' => 'delete user']);
        Permission::create(['name' => 'edit formulir']);
        // Permission::create(['guard_name' => 'peserta', 'name' => 'edit formulir']);
        Permission::create(['name' => 'verified user']);

        // create roles and assign created permissions

        $role1 = Role::create(['name' => 'admin']);
        $role1->givePermissionTo(Permission::all());

        // or may be done by chaining
        $role2 = Role::create(['name' => 'koordinator'])
            ->givePermissionTo(['verified user', 'add user', 'edit user', 'lock user', 'unlock user']);

        // this can be done as separate statements
        $role3 = Role::create(['name' => 'verifikator']);
        $role3->givePermissionTo('verified user');

        // this can be done as separate statements
        // $role4 = Role::create(['guard_name' => 'web', 'name' => 'peserta']);
        // $role4->givePermissionTo('edit formulir');

        // this can be done as separate statements
        $role4 = Role::create(['guard_name' => 'peserta', 'name' => 'peserta']);
        // $role5->givePermissionTo('edit formulir');

        // $user = User::create([
        //     'name' => 'admin',
        //     'username' => 'admin',
        //     'email' => 'admin@email.com',
        //     'email_verified_at' => now(),
        //     'phone' => fake()->phoneNumber(),
        //     'phone_verified_at' => now(),
        //     'password' => Hash::make('admin'),
        //     'remember_token' => Str::random(10),
        // ]);

        // $user->assignRole($role1);

        // $user = User::create([
        //     'name' => 'koordinator',
        //     'username' => 'koordinator',
        //     'email' => 'koordinator@email.com',
        //     'email_verified_at' => now(),
        //     'phone' => fake()->phoneNumber(),
        //     'phone_verified_at' => now(),
        //     'password' => Hash::make('password'),
        //     'remember_token' => Str::random(10),
        // ]);

        // $user->assignRole($role2);

        // $user = User::create([
        //     'name' => 'roy sesa',
        //     'username' => 'roy.sesa',
        //     'email' => 'roy@email.com',
        //     'email_verified_at' => now(),
        //     'phone' => fake()->phoneNumber(),
        //     'phone_verified_at' => now(),
        //     'password' => Hash::make('password'),
        //     'remember_token' => Str::random(10),
        // ]);

        // $user->assignRole($role3);

        // $user = User::create([
        //     'name' => 'viktor ginuni',
        //     'username' => 'viktor.ginuni',
        //     'email' => 'viktor.ginuni@email.com',
        //     'email_verified_at' => now(),
        //     'phone' => fake()->phoneNumber(),
        //     'phone_verified_at' => now(),
        //     'password' => Hash::make('password'),
        //     'remember_token' => Str::random(10),
        // ]);

        // $user->assignRole($role3);

        // $user = User::create([
        //     'name' => 'dance maran',
        //     'username' => 'dance.maran',
        //     'email' => 'dance.maran@email.com',
        //     'email_verified_at' => now(),
        //     'phone' => fake()->phoneNumber(),
        //     'phone_verified_at' => now(),
        //     'password' => Hash::make('password'),
        //     'remember_token' => Str::random(10),
        // ]);

        // $user->assignRole($role3);


        // $pesertaFactory = Peserta::factory(50)->create();

        // foreach ($pesertaFactory as $peserta) {
        //     $insert = Peserta::find($peserta->id);
        //     $insert->directory = 'peserta/peserta_dengan_id_' . $insert->id;
        //     $insert->file_name = '_peserta_dengan_id_' . $insert->id;
        //     $insert->save();
        //     $insert->assignRole($role4);
        // }

        // Peserta Factory
        // $users = User::factory()->count(100)->create();

        // foreach ($users as $user) {
        //     $peserta = Peserta::create([
        //         'user_id' => $user->id,
        //         'nama' => $user->name,
        //         'email' => $user->email,
        //     ]);

        //     $peserta->directory = 'peserta/peserta_dengan_id_' . $peserta->id;
        //     $peserta->file_name = '_peserta_dengan_id_' . $peserta->id;

        //     $peserta->save();
        //     $user->assignRole($role4);
        // }
    }
}
