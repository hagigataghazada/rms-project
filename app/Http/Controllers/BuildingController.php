<?php

namespace App\Http\Controllers;

use App\Models\Building;
use Illuminate\Http\Request;

class BuildingController extends Controller
{
    public function index()
    {
        $buildings = Building::all();
        return view('buildings.list', compact('buildings'));
    }

    public function show($id)
    {
        $building = Building::findOrFail($id);
        return view('buildings.show', compact('building'));
    }

    public function create()
    {
        return view('buildings.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'building_id' => 'required|unique:buildings,building_id',
            'apartment_count' => 'required|integer',
        ]);

        Building::create($request->all());

        return redirect()->route('buildings.index')->with('success', 'Bina başarıyla oluşturuldu.');
    }

    public function edit($id)
    {
        $building = Building::findOrFail($id);
        return view('buildings.edit', compact('building'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'apartment_count' => 'required|integer',
            'building_id' => 'required|unique:buildings,building_id,'.$id,
        ]);

        $building = Building::findOrFail($id);
        $building->update($request->all());

        return redirect()->route('buildings.index')->with('success', 'Bina başarıyla güncellendi.');
    }

    public function destroy($id)
    {
        $building = Building::findOrFail($id);
        $building->delete();

        return redirect()->route('buildings.index')->with('success', 'Bina başarıyla silindi.');
    }
}
