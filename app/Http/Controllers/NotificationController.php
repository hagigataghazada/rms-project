<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\User;
use App\Models\Building;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function create()
    {
        $buildings = Building::all();
        $residents = User::where('role', 'resident')->get();
        return view('admin.notifications.create', compact('buildings', 'residents'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:255',
            'send_to' => 'required'
        ]);

        $adminId = Auth::id();

        if ($request->send_to === 'all') {
            $residents = User::where('role', 'resident')->get();
            foreach ($residents as $resident) {
                Notification::create([
                    'admin_id' => $adminId,
                    'user_id' => $resident->id,
                    'message' => $request->message
                ]);
            }
        } elseif (str_contains($request->send_to, 'building_')) {
            $buildingId = explode('_', $request->send_to)[1];
            $residents = User::where('building_number', $buildingId)->get();
            foreach ($residents as $resident) {
                Notification::create([
                    'admin_id' => $adminId,
                    'user_id' => $resident->id,
                    'message' => $request->message
                ]);
            }
        } elseif (str_contains($request->send_to, 'resident_')) {
            $residentId = explode('_', $request->send_to)[1];
            Notification::create([
                'admin_id' => $adminId,
                'user_id' => $residentId,
                'message' => $request->message
            ]);
        }

        return redirect()->route('admin.notifications.index')->with('success', 'Bildirim(ler) uğurla göndərildi.');
    }

    public function index()
    {
        if (auth()->user()->role == 'admin') {
            $notifications = Notification::paginate(10);
            return view('admin.notifications.index', compact('notifications'));
        } else {
            $notifications = Notification::where('user_id', auth()->user()->id)->paginate(10);
            return view('user.notifications.index', compact('notifications'));
        }
    }

    public function destroy($id)
    {
        $notification = Notification::findOrFail($id);
        $notification->delete();
        return redirect()->route('admin.notifications.index')->with('success', 'Bildirim uğurla silindi.');
    }
}
