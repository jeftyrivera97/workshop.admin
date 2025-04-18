<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ServicioCategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('servicio_categorias')->insert([
            'descripcion' => 'Pintado General',
            'id_estado' => 1,
            'id_usuario' => 1,
        ]);
        DB::table('servicio_categorias')->insert([
            'descripcion' => 'Pintado Parcial',
            'id_estado' => 1,
            'id_usuario' => 1,
        ]);
        DB::table('servicio_categorias')->insert([
            'descripcion' => 'Soldadura',
            'id_estado' => 1,
            'id_usuario' => 1,
        ]);
        DB::table('servicio_categorias')->insert([
            'descripcion' => 'Enderezado',
            'id_estado' => 1,
            'id_usuario' => 1,
        ]);
        DB::table('servicio_categorias')->insert([
            'descripcion' => 'Instalacion de Piezas',
            'id_estado' => 1,
            'id_usuario' => 1,
        ]);
        DB::table('servicio_categorias')->insert([
            'descripcion' => 'Mecanica',
            'id_estado' => 1,
            'id_usuario' => 1,
        ]);
        DB::table('servicio_categorias')->insert([
            'descripcion' => 'Electricidad',
            'id_estado' => 1,
            'id_usuario' => 1,
        ]);
        DB::table('servicio_categorias')->insert([
            'descripcion' => 'Reparacion Automotriz',
            'id_estado' => 1,
            'id_usuario' => 1,
        ]);
    }
}
