<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class PersonalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('personal')->insert([
            [
                'nombre' => 'Ruben',
                'apellidos' => 'Fernandez Perez',
                'fecha_nacimiento' => '01-01-1990',
                'dni' => '12345678A',
                'direccion' => 'Calle Falsa 123',
                'telefono' => 123456789,
                'sueldo' => 1000,
                'iban' => 'ES123456789123456789',
                'email' => 'rubenoide@gmail.com',
                'password' => '$2y$12$Su01nVy36tGMGbFjBhk4HugNrj9MoasmS0IUO5/mzuaq4WwrIkC2q',
                'role' => 'Personal'
            ],
            [
                'nombre' => 'Miguel',
                'apellidos' => 'Vicario Rubio',
                'fecha_nacimiento' => '20-12-1997',
                'dni' => '12345678B',
                'direccion' => 'Calle Falsa 123',
                'telefono' => 123456789,
                'sueldo' => 1000,
                'iban' => 'ES123456789123456789',
                'email' => 'miguel@gmail.com',
                'password' => '$2y$12$Su01nVy36tGMGbFjBhk4HugNrj9MoasmS0IUO5/mzuaq4WwrIkC2q',
                'role' => 'Personal'
            ],
            [
                'nombre' => 'Jose',
                'apellidos' => 'Punto Random',
                'fecha_nacimiento' => '05-03-2001',
                'dni' => '12345678C',
                'direccion' => 'Calle Falsa 123',
                'telefono' => 123456789,
                'sueldo' => 1000,
                'iban' => 'ES123456789123456789',
                'email' => 'josito.random@gmail.com',
                'password' => '$2y$12$Su01nVy36tGMGbFjBhk4HugNrj9MoasmS0IUO5/mzuaq4WwrIkC2q',
                'role' => 'Personal'
            ],
            [
                'nombre' => 'Moha',
                'apellidos' => 'El Kasmi Sanchez',
                'fecha_nacimiento' => '17-10-2000',
                'dni' => '12345678D',
                'direccion' => 'Calle Falsa 123',
                'telefono' => 123456789,
                'sueldo' => 1000,
                'iban' => 'ES123456789123456789',
                'email' => 'moha@gmail.com',
                'password' => '$2y$12$Su01nVy36tGMGbFjBhk4HugNrj9MoasmS0IUO5/mzuaq4WwrIkC2q',
                'role' => 'Admin'
            ],
            [

                'nombre' => 'Luis',
                'apellidos' => 'Robles Garcia',
                'fecha_nacimiento' => '01-11-2001',
                'dni' => '12345678E',
                'direccion' => 'Calle Falsa 123',
                'telefono' => 123456789,
                'sueldo' => 1000,
                'iban' => 'ES123456789123456789',
                'email' => 'luis@gmail.com',
                'password' => '$2y$12$Su01nVy36tGMGbFjBhk4HugNrj9MoasmS0IUO5/mzuaq4WwrIkC2q',
                'role' => 'Personal'
            ]
            ]);
    }
}
