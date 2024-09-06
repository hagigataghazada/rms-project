<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{

    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'building_number',
        'apartment_number',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    // Bildirimlerle ilişki
    public function notifications()
    {
        return $this->hasMany(Notification::class, 'user_id');
    }

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // User.php

    public function apartment()
    {
        return $this->belongsTo(Apartment::class, 'apartment_number');
    }

    public function building()
    {
        return $this->belongsTo(Building::class, 'building_number');
    }
    // Kullanıcının rolünü kontrol etmek için yardımcı metodlar
    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    public function isResident()
    {
        return $this->role === 'resident';
    }

}
