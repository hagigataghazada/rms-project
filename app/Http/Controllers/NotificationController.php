<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    // Bildirim gönderme formunu göster
    public function create()
    {
        $residents = User::where('role', 'resident')->get();
        return view('admin.notifications.create', compact('residents'));
    }

    // Bildirimi gönder
    public function store(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:255',
        ]);

        // Tüm sakinlere bildirim gönderme
        if ($request->has('send_to_all')) {
            $residents = User::where('role', 'resident')->get();
            foreach ($residents as $resident) {
                Notification::create([
                    'user_id' => auth()->id(),
                    'resident_id' => $resident->id,
                    'message' => $request->message,
                ]);
            }
        } else {
            // Belirli bir sakine bildirim gönderme
            Notification::create([
                'user_id' => auth()->id(),
                'resident_id' => $request->resident_id,
                'message' => $request->message,
            ]);
        }

        return redirect()->route('admin.notifications.index')->with('success', 'Bildirim başarıyla gönderildi.');
    }

    // Bildirimleri listele
    public function index()
    {
        $notifications = Notification::with('resident')->get();
        return view('admin.notifications.index', compact('notifications'));
    }
}
