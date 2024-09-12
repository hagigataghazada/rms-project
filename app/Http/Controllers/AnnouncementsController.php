<?php

namespace App\Http\Controllers;

use App\Models\Apartment;
use Illuminate\Http\Request;

class AnnouncementsController extends Controller
{
    public function index()
    {
        $forSaleApartments = Apartment::where('status', 'for sale')->get();
        $forRentApartments = Apartment::where('status', 'for rent')->get();
        return view('announcements.announcements', compact('forSaleApartments', 'forRentApartments'));
    }

    public function filter(Request $request)
    {
        $price = $request->input('price');
        $floor = $request->input('floor');
        $rooms = $request->input('rooms');
        $apartments = Apartment::query();

        if ($price) {
            if ($price == 'low_to_high') {
                $apartments->orderBy('price', 'asc');
            } elseif ($price == 'high_to_low') {
                $apartments->orderBy('price', 'desc');
            }
        }

        if ($floor && $floor != 'all') {
            $apartments->where('floor_number', $floor);
        }

        if ($rooms && $rooms != 'all') {
            $apartments->where('room_count', $rooms);
        }

        $filteredApartments = $apartments->get();
        return view('announcements.announcements', ['announcements' => $filteredApartments]);
    }

    public function showForSaleApartments(Request $request)
    {
        $query = Apartment::where('status', 'for sale');

        if ($request->filled('min_price')) {
            $query->where('price', '>=', $request->min_price);
        }

        if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }

        if ($request->filled('room_count')) {
            $query->where('room_count', '=', $request->room_count);
        }

        if ($request->filled('floor_number')) {
            $query->where('floor_number', '=', $request->floor_number);
        }

        $forSaleApartments = $query->get();
        return view('announcements.partials.for-sale', compact('forSaleApartments'));
    }

    public function showForRentApartments(Request $request)
    {
        $query = Apartment::where('status', 'for rent');

        if ($request->filled('min_price')) {
            $query->where('price', '>=', $request->min_price);
        }

        if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }

        if ($request->filled('room_count')) {
            $query->where('room_count', '=', $request->room_count);
        }

        if ($request->filled('floor_number')) {
            $query->where('floor_number', '=', $request->floor_number);
        }

        $forRentApartments = $query->get();
        return view('announcements.partials.for-rent', compact('forRentApartments'));
    }
}
