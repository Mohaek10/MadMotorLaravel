<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VehiculoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('vehiculos')->insert([
            [
                'marca' => 'Ferrari',
                'modelo' => 'F8',
                'year' => 2021,
                'km' => 0,
                'precio' => 1000000,
                'cantidad' => 10,
                'categoria_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'marca' => 'Seat',
                'modelo' => 'Ibiza',
                'year' => 2015,
                'km' => 100000,
                'precio' => 10000,
                'cantidad' => 990,
                'categoria_id' => 5,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'marca' => 'Chevrolet',
                'modelo' => 'Camaro',
                'year' => 2020,
                'km' => 80900,
                'precio' => 50000,
                'cantidad' => 100,
                'categoria_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'marca' => 'Ford',
                'modelo' => 'F150',
                'year' => 2021,
                'km' => 0,
                'precio' => 60000,
                'cantidad' => 50,
                'categoria_id' => 6,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'marca' => 'Nissan',
                'modelo' => 'Versa',
                'year' => 2021,
                'km' => 9000,
                'precio' => 20000,
                'cantidad' => 200,
                'categoria_id' => 4,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'marca' => 'Toyota',
                'modelo' => 'Corolla',
                'year' => 2021,
                'km' => 0,
                'precio' => 25000,
                'cantidad' => 100,
                'categoria_id' => 4,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'marca' => 'Chevrolet',
                'modelo' => 'Aveo',
                'year' => 2015,
                'km' => 100000,
                'precio' => 10000,
                'cantidad' => 100,
                'categoria_id' => 4,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'marca' => 'BMW',
                'modelo' => 'Serie 3',
                'year' => 2018,
                'km' => 60000,
                'precio' => 30000,
                'cantidad' => 80,
                'categoria_id' => 4,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'marca' => 'Audi',
                'modelo' => 'A4',
                'year' => 2019,
                'km' => 40000,
                'precio' => 35000,
                'cantidad' => 70,
                'categoria_id' => 4,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'marca' => 'Mercedes-Benz',
                'modelo' => 'Clase C',
                'year' => 2020,
                'km' => 20000,
                'precio' => 40000,
                'cantidad' => 60,
                'categoria_id' => 4,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'marca' => 'Volkswagen',
                'modelo' => 'Golf',
                'year' => 2017,
                'km' => 80000,
                'precio' => 20000,
                'cantidad' => 90,
                'categoria_id' => 5,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'marca' => 'Honda',
                'modelo' => 'Civic',
                'year' => 2016,
                'km' => 70000,
                'precio' => 15000,
                'cantidad' => 100,
                'categoria_id' => 4,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'marca' => 'Hyundai',
                'modelo' => 'Tucson',
                'year' => 2019,
                'km' => 30000,
                'precio' => 25000,
                'cantidad' => 80,
                'categoria_id' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'marca' => 'Kia',
                'modelo' => 'Sportage',
                'year' => 2020,
                'km' => 15000,
                'precio' => 27000,
                'cantidad' => 70,
                'categoria_id' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'marca' => 'Mazda',
                'modelo' => 'CX-5',
                'year' => 2018,
                'km' => 50000,
                'precio' => 22000,
                'cantidad' => 60,
                'categoria_id' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'marca' => 'Subaru',
                'modelo' => 'Forester',
                'year' => 2017,
                'km' => 70000,
                'precio' => 18000,
                'cantidad' => 50,
                'categoria_id' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'marca' => 'Tesla',
                'modelo' => 'Model 3',
                'year' => 2021,
                'km' => 1000,
                'precio' => 45000,
                'cantidad' => 30,
                'categoria_id' => 11,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'marca' => 'Porsche',
                'modelo' => '911',
                'year' => 2020,
                'km' => 5000,
                'precio' => 120000,
                'cantidad' => 20,
                'categoria_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'marca' => 'Lamborghini',
                'modelo' => 'Huracan',
                'year' => 2019,
                'km' => 2000,
                'precio' => 250000,
                'cantidad' => 10,
                'categoria_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'marca' => 'Toyota',
                'modelo' => 'RAV4',
                'year' => 2020,
                'km' => 15000,
                'precio' => 32000,
                'cantidad' => 50,
                'categoria_id' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],

        ]);


    }
}
