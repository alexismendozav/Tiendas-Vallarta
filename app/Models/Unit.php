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
}
