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
        Schema::create('piezas', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nombre');
            $table->double('precio');
            $table->string('descripcion');
            $table->integer('cantidad');
            $table->string('imagen')->default('https://th.bing.com/th/id/OIP.KfJHc987dlOGUVkAhwwcGAHaE8?rs=1&pid=ImgDetMain');
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
        Schema::dropIfExists('piezas');
    }
};
