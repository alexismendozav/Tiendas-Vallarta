<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'cantidad',
        'codigo',
        'nombre',
        'precio_adquirido',
        'precio_mayoreo',
        'precio_menudeo',
        'unidad_medida',
        'departamento',
        'categoria',
        'img',
        'img2',
        'img3',
        'status',
        'created_by'
    ];
    protected $table = 'productos';
}
