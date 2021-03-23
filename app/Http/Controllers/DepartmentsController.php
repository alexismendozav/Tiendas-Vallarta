<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentsController extends Controller
{
    public function index()
    {
        $departments = Department::all();
        return view('departments.index', [
            'departments' => $departments
        ]);
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'nombre' => ['required', 'unique:departamentos'],
                'status' => ['required']
            ]
        );
        Department::create([
            'nombre' => $request->nombre,
            'status' => $request->status,
            'created_by' => '1'
        ]);
        return redirect()->route('departments')
        ->with('info', 'Departamento creado correctamente');
    }

    public function edit(Int $id)
    {
        $department = Department::find($id);
        return view('departments.edit',[
            'department' => $department
        ]);

    }

    public function update(Request $request, Int $id)
    {
        $request->validate(
            [
                'nombre' => ['required'],
                'status' => ['required']
            ]
        );
        $department = Department::find($id);
        $department->nombre = $request -> nombre;
        $department->status = $request -> status;
        $department->save();
        return redirect()->route('departments')
        ->with('info', 'Departamento actualizado correctamente');
    }

    public function destroy(Department $department)
    {
        $department->delete();
        return  redirect()
            ->route('departments')
            ->with('info', 'Departamento eliminado correctamente');
    }
}
