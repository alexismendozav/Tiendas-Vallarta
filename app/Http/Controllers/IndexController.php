<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Department;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class IndexController extends Controller
{
    public function index(){
        $products = Product::where('departamento',2)->with('unity')->paginate(24);
        $departments = Department::all();
        return view('products.index', [
            'products' => $products,
            'departments' => $departments,
            'id_department' => 2
        ]);
    }
}