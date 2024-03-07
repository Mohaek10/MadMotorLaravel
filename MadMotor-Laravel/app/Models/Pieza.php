<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Pieza extends Model
{
    use HasFactory;

    public static string $IMAGE_DEFAULT = 'https://th.bing.com/th/id/OIP.KfJHc987dlOGUVkAhwwcGAHaE8?rs=1&pid=ImgDetMain';
    protected $fillable = [
        'id',
        'nombre',
        'precio',
        'descripcion',
        'cantidad',
        'imagen',
        'categoria_id',
        'isDeleted'
    ];
    protected $keyType = 'string';
    public $incrementing = false;

    public static function boot()
    {
        parent::boot();
        static::creating(function ($client) {
            $client->id = Str::uuid();
        });
    }

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
    public function scopeSearch($query, $search)
    {
        if ($search) {
            return $query->where('nombre', 'LIKE', "%$search%");
        }
    }
}






