<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('clientes')->insert([
            'codigo_cliente' => '0000000000000',
            'descripcion' => 'Particular',
            'telefono' => '99999999',
            'id_estado' => 1,
            'id_usuario' => 3,
        ]);
    }
}
