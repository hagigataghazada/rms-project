<?php

namespace App\Http\Controllers;

use App\Models\Apartment;
use Illuminate\Http\Request;

class AnnouncementsController extends Controller
{
    public function index()
    {
        // Satılık ve kiralık apartmanları veri tabanından alalım
        $forSaleApartments = Apartment::where('status', 'for sale')->get();
        $forRentApartments = Apartment::where('status', 'for rent')->get();

        // Bu menzilleri blade'e gönderiyoruz
        return view('announcements.index', compact('forSaleApartments', 'forRentApartments'));
    }
    public function filter(Request $request)
    {
        // Burada gelen filtreleme kriterlerini işleyeceksiniz.
        $price = $request->input('price');
        $floor = $request->input('floor');
        $rooms = $request->input('rooms');

        // Bu kriterlere göre apartmanları filtrelemek için gerekli sorguyu burada yapabilirsiniz.
        // Örneğin:
        $announcements = Apartment::query();

        if ($price) {
            if ($price == 'low_to_high') {
                $announcements->orderBy('price', 'asc');
            } elseif ($price == 'high_to_low') {
                $announcements->orderBy('price', 'desc');
            }
        }

        if ($floor) {
            $announcements->where('floor', $floor);
        }

        if ($rooms) {
            $announcements->where('rooms', $rooms);
        }

        $announcements = $announcements->get();

        // Filtrelenmiş sonuçları ilgili blade dosyasına gönderiyoruz.
        return view('announcements.announcements', ['announcements' => $announcements]);
    }
    public function showForSaleApartments()
    {
        $forSaleApartments = Apartment::where('status', 'for sale')->get(); // Satılık apartmanları alın
        return view('announcements.for-sale', compact('forSaleApartments'));
    }
}
