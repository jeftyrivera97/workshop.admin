<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IngresoTipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ingreso_tipos')->insert([
            'descripcion' => 'Ingresos Fijos',
            'id_estado' => 1,
            'id_usuario' => 1,
        ]);
        DB::table('ingreso_tipos')->insert([
            'descripcion' => 'Ingresos Operacionales',
            'id_estado' => 1,
            'id_usuario' => 1,
        ]);
        DB::table('ingreso_tipos')->insert([
            'descripcion' => 'Ingresos Pasivos',
            'id_estado' => 1,
            'id_usuario' => 1,
        ]);
        DB::table('ingreso_tipos')->insert([
            'descripcion' => 'Ingresos por Intereses',
            'id_estado' => 1,
            'id_usuario' => 1,
        ]);
        DB::table('ingreso_tipos')->insert([
            'descripcion' => 'Ingresos por Alquileres',
            'id_estado' => 1,
            'id_usuario' => 1,
        ]);
    }
}
