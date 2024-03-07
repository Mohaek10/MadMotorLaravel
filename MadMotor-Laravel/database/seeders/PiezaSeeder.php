<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class PiezaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('piezas')->insert([
            ['id' => Uuid::uuid4(),
                'nombre' => 'Filtro de aire',
                'precio' => 20.50,
                'descripcion' => 'Filtro de aire de alta calidad para motores de gasolina.',
                'cantidad' => 100,
                'categoria_id' => Categoria::where('nombre', 'Bujias')->first()->id,
                'isDeleted' => false,
                'created_at' => now(),
                'updated_at' => now()
            ],
            ['id' => Uuid::uuid4(),

                'nombre' => 'Pastillas de freno',
                'precio' => 35.75,
                'descripcion' => 'Pastillas de freno cerámicas para un frenado suave y eficiente.',
                'cantidad' => 80,
                'categoria_id' => Categoria::where('nombre', 'Bujias')->first()->id,
                'isDeleted' => false,
                'created_at' => now(),
                'updated_at' => now()
            ],
            ['id' => Uuid::uuid4(),
                'nombre' => 'Bujías de encendido',
                'precio' => 8.99,
                'descripcion' => 'Bujías de encendido de platino para una chispa más potente y duradera.',
                'cantidad' => 120,
                'categoria_id' => Categoria::where('nombre', 'Bujias')->first()->id,
                'categoria_id' => 11,
                'isDeleted' => false,
                'created_at' => now(),
                'updated_at' => now()
            ],
            ['id' => Uuid::uuid4(),
                'nombre' => 'Amortiguadores traseros',
                'precio' => 89.99,
                'descripcion' => 'Amortiguadores traseros de alta calidad para una conducción suave y segura.',
                'cantidad' => 50,
                'categoria_id' => Categoria::where('nombre', 'Bujias')->first()->id,
                'categoria_id' => 11,
                'isDeleted' => false,
                'created_at' => now(),
                'updated_at' => now()
            ],
            ['id' => Uuid::uuid4(),
                'nombre' => 'Radiador de aluminio',
                'precio' => 120.25,
                'descripcion' => 'Radiador de aluminio de alta eficiencia para mantener el motor fresco.',
                'cantidad' => 40,
                'categoria_id' => Categoria::where('nombre', 'Bujias')->first()->id,
                'isDeleted' => false,
                'created_at' => now(),
                'updated_at' => now()
            ],
            ['id' => Uuid::uuid4(),
                'nombre' => 'Batería AGM',
                'precio' => 150.00,
                'descripcion' => 'Batería AGM de alta calidad para un arranque en frío potente y una mayor vida útil.',
                'cantidad' => 60,
                'categoria_id' => 11,
                'isDeleted' => false,
                'created_at' => now(),
                'updated_at' => now()
            ],
            ['id' => Uuid::uuid4(),
                'nombre' => 'Aceite de motor sintético 5W-30',
                'precio' => 25.99,
                'descripcion' => 'Aceite de motor sintético de alta calidad para una mejor protección y rendimiento del motor.',
                'cantidad' => 150,
                'categoria_id' => 11,
                'isDeleted' => false,
                'created_at' => now(),
                'updated_at' => now()
            ],
            ['id' => Uuid::uuid4(),
                'nombre' => 'Escobillas limpiaparabrisas híbridas',
                'precio' => 18.50,
                'descripcion' => 'Escobillas limpiaparabrisas híbridas para una limpieza suave y eficiente en todas las condiciones climáticas.',
                'cantidad' => 100,
                'categoria_id' => 11,
                'isDeleted' => false,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
