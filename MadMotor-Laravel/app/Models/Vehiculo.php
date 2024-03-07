<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    use HasFactory;

    public static string $IMAGEN_DEFAULT = 'https://img.freepik.com/foto-gratis/conduccion-automoviles-deportivos-carretera-asfaltada-noche-ia-generativa_188544-8052.jpg?w=900&t=st=1709483786~exp=1709484386~hmac=578131e5425057fbb577ed5de832c13972b80d9dc5e371dafccacbe6c5ce23a6';
    protected $table = 'vehiculos';

    protected $fillable = [
        'marca',
        'modelo',
        'year',
        'km',
        'precio',
        'cantidad',
        'imagen',
        'categoria_id',
        'isDeleted',
    ];

    public $timestamps = true;

    protected $hidden = [
        'isDeleted',
    ];

    protected $casts = [
        'isDeleted' => 'boolean',
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    //Busquedas avanzadas

    public function scopeMarca($query, $marca)
    {
        return $query->whereRaw('LOWER(marca) LIKE ? ', ['%' . strtolower($marca) . '%']);

    }

    public function scopeModelo($query, $modelo)
    {
        return $query->whereRaw('LOWER(modelo) LIKE ? ', ['%' . strtolower($modelo) . '%']);

    }

    public function scopeYearMin($query, $yearMin)
    {
        if ($yearMin) {
            return $query->where('year', '>=', $yearMin);
        }
    }

    public function scopeYearMax($query, $yearMax)
    {
        if ($yearMax) {
            return $query->where('year', '<=', $yearMax);
        }
    }

    public function scopeKmMin($query, $kmMin)
    {
        if ($kmMin) {
            return $query->where('km', '>=', $kmMin);
        }
    }

    public function scopeKmMax($query, $kmMax)
    {
        if ($kmMax) {
            return $query->where('km', '<=', $kmMax);
        }
    }

    public function scopePrecioMin($query, $precioMin)
    {
        if ($precioMin) {
            return $query->where('precio', '>=', $precioMin);
        }
    }

    public function scopePrecioMax($query, $precioMax)
    {
        if ($precioMax) {
            return $query->where('precio', '<=', $precioMax);
        }
    }

    public function scopeIsDeleted($query)
    {
        return $query->where('isDeleted', false);
    }

    public function scopeOrderByPrecioAsc($query)
    {
        return $query->orderBy('precio', 'asc');
    }

    public function scopeOrderByPrecioDesc($query)
    {
        return $query->orderBy('precio', 'desc');
    }

    public function scopeOrderByYearAcs($query)
    {
        return $query->orderBy('year', 'asc');
    }

    public function scopeOrderByYearDesc($query)
    {
        return $query->orderBy('year', 'desc');
    }

    public function scopeOrderByKmAcs($query)
    {
        return $query->orderBy('km', 'asc');
    }

    public function scopeOrderByKmDesc($query)
    {
        return $query->orderBy('km', 'desc');
    }
}
