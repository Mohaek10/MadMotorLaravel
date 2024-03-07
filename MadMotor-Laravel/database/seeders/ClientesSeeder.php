<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('clientes')->insert([[
            'nombre' => 'Paco',
            'email'=>'paco2@Paco1234.com',
            'password' => '$2y$12$Su01nVy36tGMGbFjBhk4HugNrj9MoasmS0IUO5/mzuaq4WwrIkC2q',
            'role' => 'cliente',
            'apellido' => 'Paco',
            'dni' => '12345679X',
            'imagen' => 'https://via.placeholder.com/150',
            'isDeleted' => false,
            'created_at' => now(),
            'updated_at' => now()
        ],
        [
            'nombre' => 'Maria',
            'email'=>'maria@gmail.com',
            'password' => '$2y$12$SomncRAKA7fceueZoJiWqeXMtjXW/xtqFl.aBPg9p7Dbw.UsSlKZi',
            'role' => 'admin',
            'apellido' => 'Fernanda',
            'dni' => '12345678B',
            'imagen' => 'https://via.placeholder.com/150',
            'isDeleted' => false,
            'created_at' => now(),
            'updated_at' => now()
            ],

        ]);
    }
}
