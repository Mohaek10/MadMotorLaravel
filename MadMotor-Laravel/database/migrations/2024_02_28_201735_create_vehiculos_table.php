<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('vehiculos', function (Blueprint $table) {
            $table->id();
            $table->string('marca');
            $table->string('modelo');
            $table->integer('year');
            $table->decimal('precio', 10,2)->default(0);
            $table->integer('cantidad');
            $table->string('imagen')->default('https://cdn.autobild.es/sites/navi.axelspringer.es/public/bdc/dc/fotos/Ferrari_F8_Tributo_001_.jpg?tf=200x');
            $table->foreignId('categoria_id')->constrained('categorias');
            $table->boolean('isDeleted')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehiculos');
    }
};