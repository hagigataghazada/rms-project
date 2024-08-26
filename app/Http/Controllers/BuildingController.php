<?php

namespace App\Http\Controllers;

use App\Models\Building;
use Illuminate\Http\Request;

class BuildingController extends Controller
{
    public function index()
    {
        return view('buildings.index');
    }
    public function show($id) {
        // Belirli bir binayı göstermek için gerekli işlemleri burada yapın
        $building = Building::find($id);
        return view('buildings.list', compact('building'));
    }

    public function create()
    {
        return view('buildings.create');
    }

    public function list()
    {
        $buildings = Building::all();
        return view('buildings.list', compact('buildings'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'building_number' => 'required',
            'apartment_count' => 'required',
            'apartment_numbers' => 'required',
        ]);

        Building::create($request->all());

        return redirect()->route('buildings.index')->with('success', 'Building created successfully.');
    }
}
