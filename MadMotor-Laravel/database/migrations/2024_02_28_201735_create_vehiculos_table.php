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
            $table->integer('km');
            $table->decimal('precio', 10,2)->default(0);
            $table->integer('cantidad');
            $table->string('imagen')->default('https://img.freepik.com/foto-gratis/conduccion-automoviles-deportivos-carretera-asfaltada-noche-ia-generativa_188544-8052.jpg?w=900&t=st=1709483786~exp=1709484386~hmac=578131e5425057fbb577ed5de832c13972b80d9dc5e371dafccacbe6c5ce23a6');
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
