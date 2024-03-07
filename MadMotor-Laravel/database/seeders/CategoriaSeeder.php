<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use function Laravel\Prompts\table;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categorias')->insert([
            [
                'nombre' => 'Clásicos',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Deportivos',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'SUV',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Sedán',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Hatchback',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Pickup',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Familiar',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Van',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Convertible',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Coupé',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Eléctricos',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Híbridos',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Freno',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Filtros',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Bujias',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
