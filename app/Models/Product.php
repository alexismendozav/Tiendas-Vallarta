<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Unit;
use App\Models\Location;

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
        'locacion',
        'created_by'
    ];
    protected $table = 'productos';

    public function getGetDisponibilityAttribute()
    {
        if ($this->status == 1) {
            return '<spam class="green">Disponible</spam>';
        } else {
            return '<spam class="red">No disponible</spam>';
        }
    }

    public function unity()
    {
        return $this->belongsTo(Unit::class, 'unidad_medida');
    }

    public function location()
    {
        return $this->belongsTo(Location::class, 'locacion');
    }

    public function scopeOrderby($query, $order_by)
    {
        if (($order_by)) {
            switch ($order_by) {
                case '1':
                    return $query->latest();
                    break;

                case '2':
                    return $query->orderByDesc('precio_menudeo');
                    break;

                case '3':
                    return $query->orderBy('precio_menudeo');
                    break;

                case '4':
                    return $query->where('status',0);
                    break;

                default:
                    # code...
                    break;
            }
        }
    }
}
