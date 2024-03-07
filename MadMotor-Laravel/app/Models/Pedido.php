<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Pedido extends Model
{
    use HasFactory;

    protected $table = 'pedidos';
    protected $fillable = [
        'id',
        'idCliente',
        'datosTarjeta',
        'direccion',
        'total',
        'estado',
        'isDeleted'
    ];
    protected $hidden = [
        'isDeleted',
    ];
    public $incrementing = false;
    protected $keyType = 'string';
    protected $casts = [
        'isDeleted' => 'boolean',
    ];

    public static function  boot()
    {
        parent::boot();
        static::creating(function ($pedido) {
            $pedido->id = Str::uuid();
        });
    }
    public function cliente()
    {
        return $this->belongsTo(Clientes::class, 'idCliente');
    }

    public function lineasDePedido()
    {
        return $this->hasMany(LineaDePedido::class, 'idPedido');
    }

}
