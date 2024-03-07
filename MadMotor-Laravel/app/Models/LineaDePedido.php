<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LineaDePedido extends Model
{
    use HasFactory;

    protected $table = 'linea_de_pedidos';

    protected $fillable = [
        'idPedido',
        'idVehiculo',
        'idPieza',
        'precioVehiculo',
        'precioPieza',
        'cantidadVehi',
        'cantidadPieza',
        'totalLinea',
    ];

    protected $casts = [
        'IdPedido' => 'uuid',
    ];

    public function vehiculo()
    {
        return $this->belongsTo(Vehiculo::class, 'idVehiculo');
    }

    public function pieza()
    {
        return $this->belongsTo(Pieza::class, 'idPieza');
    }
    public function pedido()
    {
        return $this->belongsTo(Pedido::class, 'idPedido');
    }
}
