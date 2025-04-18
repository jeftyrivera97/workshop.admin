<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PagoCategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pago_categorias')->insert([
            'descripcion' => 'Efectivo',
            'id_estado' => '1',
        ]);
        DB::table('pago_categorias')->insert([
            'descripcion' => 'POS',
            'id_estado' => '1',
        ]);
        DB::table('pago_categorias')->insert([
            'descripcion' => 'Deposito',
            'id_estado' => '1',
        ]);

    }
}
