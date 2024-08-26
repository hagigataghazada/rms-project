<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    use HasFactory;

    // Apartment ile Building arasındaki ilişki
    public function building()
    {
        return $this->belongsTo(Building::class);
    }

    // Apartment ile Resident arasındaki ilişki
    public function residents()
    {
        return $this->hasMany(Resident::class);
    }

    // Apartment ile Payment arasındaki ilişki
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
