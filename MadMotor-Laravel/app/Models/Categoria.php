<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;
    protected $table= 'categorias';
    public static function getIdPorNombre($nombre)
    {
        $categoria = self::where('nombre', $nombre)->first();
        return $categoria ? $categoria->id : null;

    }

    public function scopeIsDeleted($query)
    {
        return $query->where('isDeleted', false);
    }

    public static function getNombrePorId($id)
    {
        $categoria = self::find($id);
        return $categoria ? $categoria->nombre : null;
    }


    public static function getNombres()
    {
        return self::all()->pluck('nombre');
    }

    protected $fillable = ['nombre','idDeleted'];

    public $timestamps = true;

    protected $hidden = ['isDeleted'];

    protected $casts = [
        'isDeleted' => 'boolean',
    ];

    public function vehiculos()
    {
        return $this->hasMany(Vehiculo::class);
    }
    public function piezas()

    {
        return $this->hasMany(Pieza::class);
    }

    public function scopeSearch($query, $search)
    {
        return $query->whereRaw('LOWER(nombre) LIKE ?', ["%" . strtolower($search) . "%"]);
    }
}
