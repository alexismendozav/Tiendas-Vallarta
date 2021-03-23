<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Unit extends Model
{
    use HasFactory;
    protected $fillable = ['nombre','status','created_by'];
    protected $table = 'unidades_de_medida';


    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function getGetDisponibilityAttribute()
    {
        if ($this->status == 1) {
            return '<spam class="text-success"><strong>Activo</strong></spam>';
        } else {
            return '<spam class="text-danger"><strong>Inactivo</strong></spam>';
        }
    }
}
