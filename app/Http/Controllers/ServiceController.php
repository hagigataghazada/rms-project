<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('services.list', compact('services'));
    }

    public function create()
    {
        return view('services.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required',
            'contact_number' => 'required',
        ]);

        // Servis oluşturma işlemi
        Service::create($request->all());

        return redirect()->route('services.list')->with('success', 'Servis başarıyla eklendi.');
    }
    public function edit($id)
    {
        $service = Service::findOrFail($id);
        return view('services.edit', compact('service'));
    }
    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();

        return redirect()->route('services.index')->with('success', 'Servis başarıyla silindi.');
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required',
            'contact_number' => 'required',
        ]);

        $service = Service::findOrFail($id);
        $service->update($request->all());

        return redirect()->route('services.index')->with('success', 'Servis başarıyla güncellendi.');
    }
    public function show($id)
    {
        $service = Service::findOrFail($id);
        return view('services.list', compact('service'));
    }


}
