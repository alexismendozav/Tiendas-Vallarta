<?php

namespace App\Http\Controllers;


use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Department;
use Illuminate\Support\Facades\Storage;

class CategoriesController extends Controller
{
    public function index()
    {
        $departments = Department::all()->where('status','1');
        $categories = Category::with('department')->get();
        
        return view('categories.index', [
            'categories'  => $categories,
            'departments' => $departments
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre'     => ['required', 'unique:categorias'],
            'department' => ['required']
        ]);
        Category::create([
            'nombre'        => $request->nombre,
            'departamento'  => $request->department,
            'status'        => $request->status,
            'created_by'    => 3, //pendiente
        ]);
        return redirect()->route('categories')
            ->with('info', 'La categoría fue creada correctamente');
    }

    public function edit(Int $id)
    {
        $category = Category::find($id);
        $departments = Department::all()->where('status','1');
        return view('categories.edit', [
            'category'    => $category,
            'departments' => $departments
        ]);
    }

    public function update(Request $request, Int $id)
    {
        $category = Category::find($id);
        $request->validate([
            'nombre'     => ['required'],
            'department' => ['required']
        ]);
        $category->nombre       = $request->nombre;
        $category->departamento = $request->department;
        $category->status       = $request->status;
        $category->save();
        return redirect()->route('categories')
            ->with('info', 'La categoría fue actualizada correctamente');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories')
            ->with('info', 'La categoría fue eliminada correctamente');
    }
}
