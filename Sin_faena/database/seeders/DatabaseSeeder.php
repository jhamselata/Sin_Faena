<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

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

            DB::table('tipo_pago')->insert([
                [
                    'id' => 1,
                    'nombre_tipoPago' => 'Efectivo',
                    'descripcion_tipoPago' => 'Pago en efectivo'
                ],
                [
                    'id' => 2,
                    'nombre_tipoPago' => 'Tarjeta',
                    'descripcion_tipoPago' => 'Pago con tarjeta de crédito o débito'
                ],
                // Agrega más registros según sea necesario
            ]);
    
            // Insert data into tipo_informe table
            DB::table('tipo_informe')->insert([
                [
                    'id' => 1,
                    'nombre_tipoInforme' => 'Financiero',
                    'descripcion_tipoInforme' => 'Informe de estado financiero'
                ],
                [
                    'id' => 2,
                    'nombre_tipoInforme' => 'Anual',
                    'descripcion_tipoInforme' => 'Informe anual de actividades'
                ],
                // Agrega más registros según sea necesario
            ]);
    
            // Insert data into tipo_cliente table
            DB::table('tipo_cliente')->insert([
                [
                    'id' => 1,
                    'nombre_tipoCli' => 'Corporativo',
                    'descripcion_tipoCli' => 'Clientes corporativos'
                ],
                [
                    'id' => 2,
                    'nombre_tipoCli' => 'Individual',
                    'descripcion_tipoCli' => 'Clientes individuales'
                ],
                // Agrega más registros según sea necesario
            ]);

            DB::table('tipo_evento')->insert([
                [
                    'id' => 1,
                    'nombre_tipoEvento' => 'Conferencia',
                    'descripcion_tipoEvento' => 'Evento de tipo conferencia'
                ],
                [
                    'id' => 2,
                    'nombre_tipoEvento' => 'Taller',
                    'descripcion_tipoEvento' => 'Evento de tipo taller'
                ],
                // Agrega más registros según sea necesario
            ]);
    
            // Insert data into tipo_equipo table
            DB::table('tipo_equipo')->insert([
                [
                    'id' => 1,
                    'nombre_tipoEquipo' => 'Computadora',
                    'descripcion_tipoEquipo' => 'Equipo de computación'
                ],
                [
                    'id' => 2,
                    'nombre_tipoEquipo' => 'Proyector',
                    'descripcion_tipoEquipo' => 'Equipo de proyección'
                ],
                // Agrega más registros según sea necesario
            ]);
    
            // Insert data into tipo_servicio table
            DB::table('tipo_servicio')->insert([
                [
                    'id' => 1,
                    'nombre_tipoServicio' => 'Mantenimiento',
                    'descripcion_tipoServicio' => 'Servicio de mantenimiento'
                ],
                [
                    'id' => 2,
                    'nombre_tipoServicio' => 'Consultoría',
                    'descripcion_tipoServicio' => 'Servicio de consultoría'
                ],
                // Agrega más registros según sea necesario
            ]);

            DB::table('departamento')->insert([
                [
                    'id' => 1,
                    'nombre_depto' => 'Recursos Humanos',
                    'descripcion_depto' => 'Departamento encargado de la gestión del personal'
                ],
                [
                    'id' => 2,
                    'nombre_depto' => 'Tecnología de la Información',
                    'descripcion_depto' => 'Departamento encargado de la infraestructura tecnológica'
                ],
                // Agrega más registros según sea necesario
            ]);
    
            // Insert data into puesto table
            DB::table('puesto')->insert([
                [
                    'id' => 1,
                    'nombre_puesto' => 'Gerente',
                    'descripcion_puesto' => 'Responsable de la gestión del departamento'
                ],
                [
                    'id' => 2,
                    'nombre_puesto' => 'Analista',
                    'descripcion_puesto' => 'Encargado del análisis y la toma de decisiones'
                ],
                // Agrega más registros según sea necesario
            ]);

            DB::table('servicio')->insert([
                [
                    'id' => 1,
                    'id_tipoServicio' => 1, // Asegúrate de que el tipo de servicio exista en la tabla tipo_servicio
                    'nombre_servicio' => 'Branding, redes sociales y logos',
                    'descripcion_servicio' => 'Administracion y manejo de la imagen corporativa de la empresa',
                    'precio_servicio' => 500.00,
                    'duracion_estimada' => '2 horas'
                ],
                [
                    'id' => 2,
                    'id_tipoServicio' => 2, // Asegúrate de que el tipo de servicio exista en la tabla tipo_servicio
                    'nombre_servicio' => 'Marketing',
                    'descripcion_servicio' => 'Publicidad de buena calidad para su empresa',
                    'precio_servicio' => 150.00,
                    'duracion_estimada' => '4 horas'
                ],
                // Agrega más registros según sea necesario
            ]);
    
    }
}
