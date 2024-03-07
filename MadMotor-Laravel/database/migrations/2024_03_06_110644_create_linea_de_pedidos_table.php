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
        Schema::create('linea_de_pedidos', function (Blueprint $table) {
            $table->id();
            $table->uuid('idPedido');
            $table->foreign('idPedido')->references('id')->on('pedidos');
            $table->unsignedBigInteger('idVehiculo')->nullable();
            $table->foreign('idVehiculo')->references('id')->on('vehiculos');
            $table->uuid('idPieza')->nullable();
            $table->foreign('idPieza')->references('id')->on('piezas');
            $table->decimal('precioVehiculo', 10, 2)->nullable();
            $table->decimal('precioPieza', 10, 2)->nullable();
            $table->integer('cantidadVehi')->nullable();
            $table->integer('cantidadPieza')->nullable();
            $table->decimal('totalLinea', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('linea_de_pedidos');
    }
};
