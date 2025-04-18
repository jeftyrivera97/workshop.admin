<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class EmpleadoCategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('empleado_categorias')->insert([
            'descripcion' => 'Gerente Propietario',
            'area' => 'Gerencia',
            'rango' => 1,
            'id_estado' => 1,
            'created_at' => '2025-04-14 18:12:56',
            'updated_at' => '2025-04-14 18:12:56',
        ]);
        DB::table('empleado_categorias')->insert([
            'descripcion' => 'Administrador',
            'area' => 'Administracion',
            'rango' => 2,
            'id_estado' => 1,
            'created_at' => '2025-04-14 18:12:56',
            'updated_at' => '2025-04-14 18:12:56',
        ]);
        DB::table('empleado_categorias')->insert([
            'descripcion' => 'Secretario/a',
            'area' => 'Administracion',
            'rango' => 3,
            'id_estado' => 1,
            'created_at' => '2025-04-14 18:12:56',
            'updated_at' => '2025-04-14 18:12:56',
        ]);
        DB::table('empleado_categorias')->insert([
            'descripcion' => 'Cocinera',
            'area' => 'Cocina',
            'rango' => 3,
            'id_estado' => 1,
            'created_at' => '2025-04-14 18:12:56',
            'updated_at' => '2025-04-14 18:12:56',
        ]);
        DB::table('empleado_categorias')->insert([
            'descripcion' => 'Pintor',
            'area' => 'Pintura Automotriz',
            'rango' => 3,
            'id_estado' => 1,
            'created_at' => '2025-04-14 18:12:56',
            'updated_at' => '2025-04-14 18:12:56',
        ]);
        DB::table('empleado_categorias')->insert([
            'descripcion' => 'Auxiliar de Pintura',
            'area' => 'Pintura Automotriz',
            'rango' => 4,
            'id_estado' => 1,
            'created_at' => '2025-04-14 18:12:56',
            'updated_at' => '2025-04-14 18:12:56',
        ]);
        DB::table('empleado_categorias')->insert([
            'descripcion' => 'Preparador',
            'area' => 'Pintura Automotriz',
            'rango' => 4,
            'id_estado' => 1,
            'created_at' => '2025-04-14 18:12:56',
            'updated_at' => '2025-04-14 18:12:56',
        ]);

        DB::table('empleado_categorias')->insert([
            'descripcion' => 'Pulidor',
            'area' => 'Pintura Automotriz',
            'rango' => 4,
            'id_estado' => 1,
            'created_at' => '2025-04-14 18:12:56',
            'updated_at' => '2025-04-14 18:12:56',
        ]);

        DB::table('empleado_categorias')->insert([
            'descripcion' => 'Mecanico',
            'area' => 'Mecanica Automotriz',
            'rango' => 3,
            'id_estado' => 1,
            'created_at' => '2025-04-14 18:12:56',
            'updated_at' => '2025-04-14 18:12:56',
        ]);
        DB::table('empleado_categorias')->insert([
            'descripcion' => 'Auxiliar de Mecanico',
            'area' => 'Mecanica Automotriz',
            'rango' => 3,
            'id_estado' => 1,
            'created_at' => '2025-04-14 18:12:56',
            'updated_at' => '2025-04-14 18:12:56',
        ]);
        DB::table('empleado_categorias')->insert([
            'descripcion' => 'Enderezador',
            'area' => 'Reparaciones Automotriz',
            'rango' => 3,
            'id_estado' => 1,
            'created_at' => '2025-04-14 18:12:56',
            'updated_at' => '2025-04-14 18:12:56',
        ]);
        DB::table('empleado_categorias')->insert([
            'descripcion' => 'Soldador',
            'area' => 'Reparaciones Automotriz',
            'rango' => 3,
            'id_estado' => 1,
            'created_at' => '2025-04-14 18:12:56',
            'updated_at' => '2025-04-14 18:12:56',
        ]);
        DB::table('empleado_categorias')->insert([
            'descripcion' => 'Electricista',
            'area' => 'Reparaciones Automotriz',
            'rango' => 3,
            'id_estado' => 1,
            'created_at' => '2025-04-14 18:12:56',
            'updated_at' => '2025-04-14 18:12:56',
        ]);
    }
}
