<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request){
        $term = $request->get('term');	
        $querys = Product::where('nombre','LIKE',"%$term%")->orderBy('nombre','ASC')
        ->select('nombre AS label')->get();
       
        return $querys;
    }

    public function main(Request $request){
        $product = $request->product;
        $id_department = $request->id_department;
        $departments = Department::all();
        $products = Product::where('departamento',$id_department)->where('nombre','LIKE',"%$product%")->orWhere('codigo','LIKE',"%$product%")->orderBy('nombre','ASC')->get();
        return view('search.index',[
             'departments' => $departments,
             'products' => $products,
             'id_department' =>$id_department,
        ]);
    }
}
