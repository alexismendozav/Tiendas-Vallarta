<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Department;

class Category extends Model
{
    use HasFactory;
 
    protected $table = 'categorias';
    protected $fillable = ['nombre', 'departamento', 'status', 'created_by', 'created_at', 'updated_at'];
    
    public function department()
    {
         return $this->belongsTo(Department::class,'departamento');
    }
}
