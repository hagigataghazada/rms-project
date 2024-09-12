<?php

namespace App\Http\Controllers;

use App\Models\Apartment;
use Illuminate\Http\Request;

class ApartmentController extends Controller
{
    public function create()
    {
        return view('apartments.create');
    }

    public function index()
    {
        $apartments = Apartment::all();
        return view('apartments.list', compact('apartments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'apartment_number' => 'required|unique:apartments,apartment_number',
            'room_count' => 'required|integer',
            'floor_number' => 'required|integer',
            'status' => 'required|in:occupied,for rent,for sale,repair',
            'price' => 'nullable|numeric',
            'building_number' => 'required|exists:buildings,building_number',
            'apartment_images' => 'nullable',
            'apartment_images.*' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $imagePaths = [];

        if ($request->hasFile('apartment_images')) {
            foreach ($request->file('apartment_images') as $image) {
                $imagePath = $image->store('apartments', 'public');
                \Log::info('Yüklənən şəkil: ' . $imagePath);
                $imagePaths[] = $imagePath;
            }
        }

        if ($request->hasFile('apartment_images') && count($request->file('apartment_images')) < 2) {
            return back()->withErrors(['apartment_images' => 'You must upload at least 2 images.'])->withInput();
        }
        \Log::info('Image paths to save: ' . json_encode($imagePaths));

        $apartment = Apartment::create([
            'apartment_number' => $request->apartment_number,
            'price' => $request->price,
            'room_count' => $request->room_count,
            'floor_number' => $request->floor_number,
            'status' => $request->status,
            'building_number' => $request->building_number,
            'image_path' => !empty($imagePaths) ? json_encode($imagePaths) : null,
        ]);
        \Log::info('Saved apartment: ' . json_encode($apartment));

        return redirect()->route('apartments.list')->with('success', 'Apartment created.');
    }

    public function edit($id)
    {
        $apartment = Apartment::findOrFail($id);
        return view('apartments.edit', compact('apartment'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'apartment_number' => 'required|unique:apartments,apartment_number,'.$id,
            'room_count' => 'required|integer',
            'floor_number' => 'required|integer',
            'status' => 'required|in:occupied,for rent,for sale,repair',
            'price' => 'nullable|numeric',
            'building_number' => 'required|exists:buildings,building_number',
            'apartment_images' => 'nullable',
            'apartment_images.*' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $apartment = Apartment::findOrFail($id);

        $imagePaths = [];
        if ($request->hasFile('apartment_images')) {
            foreach ($request->file('apartment_images') as $image) {
                $imagePath = $image->store('apartments', 'public');
                $imagePaths[] = $imagePath;
            }
            $apartment->image_path = json_encode($imagePaths);
        }

        $apartment->update([
            'apartment_number' => $request->apartment_number,
            'price' => $request->price,
            'room_count' => $request->room_count,
            'floor_number' => $request->floor_number,
            'status' => $request->status,
            'building_number' => $request->building_number,
        ]);

        return redirect()->route('apartments.list')->with('success', 'Apartment updated.');
    }

    public function destroy($id)
    {
        $apartment = Apartment::findOrFail($id);
        $apartment->delete();

        return redirect()->route('apartments.list')->with('success', 'Apartment removed successfully.');
    }

    public function announcements(Request $request)
    {
        $status = $request->input('status');

        $apartments = Apartment::when($status, function($query) use ($status) {
            return $query->where('status', $status);
        })->get();

        return view('announcements', compact('apartments'));
    }
}
