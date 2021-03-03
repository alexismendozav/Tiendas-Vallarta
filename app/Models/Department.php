<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;


class Department extends Model
{
    use HasFactory;
    
    protected $table = 'departamentos';
    protected $fillable = ['nombre', 'status', 'created_by'];

    public function categories()
    {
        return $this->hasMany(Category::class);
    }
}
