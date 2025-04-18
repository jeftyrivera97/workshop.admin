<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AutoCategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('auto_categorias')->insert([
            'descripcion' => 'Micro',
            'id_estado' => 1,
            'id_usuario' => 1,
        ]);
        DB::table('auto_categorias')->insert([
            'descripcion' => 'Sedan',
            'id_estado' => 1,
            'id_usuario' => 1,
        ]);
        DB::table('auto_categorias')->insert([
            'descripcion' => 'Hatchback',
            'id_estado' => 1,
            'id_usuario' => 1,
        ]);
        DB::table('auto_categorias')->insert([
            'descripcion' => 'SUV',
            'id_estado' => 1,
            'id_usuario' => 1,
        ]);
        DB::table('auto_categorias')->insert([
            'descripcion' => 'Pickup',
            'id_estado' => 1,
            'id_usuario' => 1,
        ]);
        DB::table('auto_categorias')->insert([
            'descripcion' => 'Mini Van',
            'id_estado' => 1,
            'id_usuario' => 1,
        ]);
        DB::table('auto_categorias')->insert([
            'descripcion' => 'Van',
            'id_estado' => 1,
            'id_usuario' => 1,
        ]);
        DB::table('auto_categorias')->insert([
            'descripcion' => 'Coupe',
            'id_estado' => 1,
            'id_usuario' => 1,
        ]);
        DB::table('auto_categorias')->insert([
            'descripcion' => 'Deportivo',
            'id_estado' => 1,
            'id_usuario' => 1,
        ]);
        DB::table('auto_categorias')->insert([
            'descripcion' => 'Mini Truck',
            'id_estado' => 1,
            'id_usuario' => 1,
        ]);
        DB::table('auto_categorias')->insert([
            'descripcion' => 'Camion',
            'id_estado' => 1,
            'id_usuario' => 1,
        ]);
        DB::table('auto_categorias')->insert([
            'descripcion' => 'Rastra',
            'id_estado' => 1,
            'id_usuario' => 1,
        ]);
        DB::table('auto_categorias')->insert([
            'descripcion' => 'Furgoneta',
            'id_estado' => 1,
            'id_usuario' => 1,
        ]);


    }
}
