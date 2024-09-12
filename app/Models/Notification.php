<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = ['admin_id', 'user_id', 'building_number', 'apartment_number', 'message'];

    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function apartment()
    {
        return $this->belongsTo(Apartment::class, 'apartment_number', 'apartment_number');
    }

    public function building()
    {
        return $this->belongsTo(Building::class, 'building_number', 'building_number');
    }
}
