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
        $apartments = Apartment::all(); // Bu, tüm apartmanları listeler
        return view('apartments.list', compact('apartments'));
    }
    public function announcements(Request $request)
    {
        // Filtreleme işlemi
        $status = $request->input('status'); // "for_sale" veya "for_rent"

        $query = Apartment::query();

        if ($status) {
            $query->where('status', $status);
        }

        $apartments = $query->get();

        return view('announcements', compact('apartments'));
    }
}
