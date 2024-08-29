<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\Building;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $buildings = Building::all(); // Tüm binaları alıyoruz
        return view('admin.index', compact('buildings'));
    }
    public function loadSection($section)
    {
        switch ($section) {
            case 'buildingsAdd':
                return view('admin.sections.buildings-create');
            case 'buildingsList':
                $buildings = Building::all();
                return view('admin.sections.buildings-list', compact('buildings'));
            case 'apartmentsAdd':
                return view('admin.sections.apartments-create');
            case 'apartmentsList':
                $apartments = Apartment::all();
                return view('admin.sections.apartments-list', compact('apartments'));
            // Diğer case'ler aynı yapıda olacak
            // ...
            default:
                return 'Section bulunamadı';
        }
    }
    // Admin kayıt formunu göster
    public function showRegisterForm()
    {
        return view('admin.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            // apartment_id validation gerekmiyor çünkü default vereceğiz
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'apartment_id' => 0, // Burada varsayılan bir apartment_id değeri veriyoruz.
        ]);

        return redirect()->route('admin.panel')->with('success', 'Admin başarıyla kayıt edildi');
    }
    public function editProfile()
    {
        $admin = auth()->user(); // Giriş yapmış admini getir
        return view('admin.edit', compact('admin'));
    }

    public function updateProfile(Request $request)
    {
        $admin = auth()->user();

        // Validation
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $admin->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        // Update admin
        $admin->name = $request->input('name');
        $admin->email = $request->input('email');

        if ($request->filled('password')) {
            $admin->password = bcrypt($request->input('password'));
        }

        $admin->save();

        return redirect()->route('admin.edit')->with('success', 'Profil başarıyla güncellendi.');
    }
}
