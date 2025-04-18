<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Sistema ',
            'email' => 'sistema@tallerh.site',
            'password' => Hash::make('Jriver@1997'),
        ]);
        DB::table('users')->insert([
            'name' => 'Lester Hernandez',
            'email' => 'gerencia@tallerh.site',
            'password' => Hash::make('G3r3nc1@.2025'),
        ]);
        DB::table('users')->insert([
            'name' => 'Leda Hernandez',
            'email' => 'admin@tallerh.site',
            'password' => Hash::make('@dm1n.2025'),
        ]);
        DB::table('users')->insert([
            'name' => 'Cecilia Hernandez',
            'email' => 'contaduria@tallerh.site',
            'password' => Hash::make('c0nt@dur1@.2025'),
        ]);
        DB::table('users')->insert([
            'name' => 'Tetsing user',
            'email' => 'test@test.com',
            'password' => Hash::make('ABCD1234'),
        ]);

    }
}
