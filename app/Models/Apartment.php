<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->hasMany(User::class, 'apartment_id');
    }

    // Apartment modelinde
    protected $table = 'apartments';
    protected $fillable = ['apartment_id', 'room_count', 'floor_number', 'status', 'price', 'building_id'];

    public function building()
    {
        return $this->belongsTo(Building::class);
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }



    // Apartment ile Payment arasındaki ilişki
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
