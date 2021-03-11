<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;

class LocationController extends Controller
{
    public function index()
    {
        $locations = Location::latest()->get();
        return view('locations.index',compact('locations'));
    }

    public function store(Request $request)
    {
        Location::create([
            'created_by' => auth()->user()->id,
        ] + $request->all());
        return back()->with('info','Locación creada correctamente');
    }

    public function edit(Int $id)
    {
        $location = Location::find($id);
        return view('locations.edit', compact('location'));
    }

    public function update(Request $request, Location $location)
    {
        $location->update($request->all());
        return  redirect()
            ->route('locations')
            ->with('info', 'Locación actualizada correctamente');
    }

    public function destroy(Location $location)
    {
        $location->delete();
        return  redirect()
            ->route('locations')
            ->with('info', 'Locación eliminada correctamente');
    }
}
