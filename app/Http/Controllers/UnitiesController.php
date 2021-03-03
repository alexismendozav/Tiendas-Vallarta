<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unit;

class UnitiesController extends Controller
{
    public function index()
    {
        $unities = Unit::all();
        return view('unities.index',[
            'unities' => $unities
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => ['required', 'unique:unidades_de_medida'],
            'status' => ['required']
        ]);
        Unit::create([
            'nombre' => $request->nombre,
            'status' => $request->status,
            'created_by' => 1
        ]);

        return redirect()
            ->route('unities')
            ->with('info', 'Unidad creada correctamente');
    }

    public function edit(Int $id)
    {
        $unit = Unit::find($id);
        return view('unities.edit', [
            'unit' => $unit,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => ['required'],
            'status' => ['required']
        ]);
        $unit = Unit::find($id);
        $unit->nombre = $request->nombre;
        $unit->status = $request->status;
        $unit->save();
        return redirect()
            ->route('unities')
            ->with('info', 'Unidad de medida actualizada correctamente');
    }

    public function destroy(Unit $unity)
    {
        $unity->delete();
        return redirect()
            ->route('unities')
            ->with('info', 'Unidad de medida eliminada correctamente');
    }
}
