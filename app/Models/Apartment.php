<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->hasMany(User::class, 'apartment_number');
    }

    protected $table = 'apartments';
    protected $fillable = ['apartment_number', 'room_count', 'floor_number', 'status', 'price', 'building_number', 'image_path'];

    public function building()
    {
        return $this->belongsTo(Building::class);
    }
    public function notifications()
    {
        return $this->hasMany(Notification::class, 'apartment_number');
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }


    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
