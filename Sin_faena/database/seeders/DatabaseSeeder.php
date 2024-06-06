<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        Role::create(['name' => 'admin']);
        Role::create(['name' => 'cliente']);
        Role::create(['name' => 'supervisor']);
        Role::create(['name' => 'empleado']);

            // Crea el usuario administrador
            $admin = User::create([
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('admin1235'), // Cambia 'password' por la contraseña que desees
            ]);
    
            // Asigna el rol de administrador al usuario
            $adminRole = Role::where('name', 'admin')->first();
            $admin->assignRole($adminRole);
    
    }
}
