<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\User;
use App\Models\Building;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    // Bildirim formunu görüntüleme
    public function create()
    {
        // Bütün binaları ve sakinleri (residents) çekiyoruz.
        $buildings = Building::all();
        $residents = User::where('role', 'resident')->get();

        return view('admin.notifications.create', compact('buildings', 'residents'));
    }

    // Bildirim gönderme
    public function store(Request $request)
    {
        // Form doğrulaması
        $request->validate([
            'message' => 'required|string|max:255',
            'send_to' => 'required'
        ]);

        $adminId = Auth::id(); // Giriş yapmış admin id'si

        // Bildirimi tüm sakinlere (residents) göndermek
        if ($request->send_to === 'all') {
            $residents = User::where('role', 'resident')->get();
            foreach ($residents as $resident) {
                Notification::create([
                    'admin_id' => $adminId,
                    'user_id' => $resident->id,
                    'message' => $request->message
                ]);
            }
        }
        // Belirli bir binadaki sakinlere bildirim gönderme
        elseif (str_contains($request->send_to, 'building_')) {
            $buildingId = explode('_', $request->send_to)[1];
            $residents = User::where('building_number', $buildingId)->get();
            foreach ($residents as $resident) {
                Notification::create([
                    'admin_id' => $adminId,
                    'user_id' => $resident->id,
                    'message' => $request->message
                ]);
            }
        }
        // Belirli bir kullanıcıya bildirim gönderme
        elseif (str_contains($request->send_to, 'resident_')) {
            $residentId = explode('_', $request->send_to)[1];
            Notification::create([
                'admin_id' => $adminId,
                'user_id' => $residentId,
                'message' => $request->message
            ]);
        }

        return redirect()->route('admin.notifications.create')->with('success', 'Notification(s) sent successfully.');
    }

    // Bildirim listesi
    public function index()
    {
        // Eğer kullanıcı admin ise, tüm bildirimleri paginate ile 10'lu şekilde çek
        if (auth()->user()->role == 'admin') {
            $notifications = Notification::paginate(10); // 10'lu sayfalandırma
            return view('admin.notifications.index', compact('notifications'));
        }
        // Eğer kullanıcı resident ise, kendi bildirimlerini paginate ile çek
        else {
            $notifications = Notification::where('user_id', auth()->user()->id)->paginate(10); // 10'lu sayfalandırma
            return view('user.notifications.index', compact('notifications'));
        }
    }

    // Bildirimi silme
    public function destroy($id)
    {
        $notification = Notification::findOrFail($id);
        $notification->delete();

        return redirect()->route('admin.notifications.index')->with('success', 'Notification deleted successfully.');
    }
}
