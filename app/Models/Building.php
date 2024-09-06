<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
use HasFactory;

protected $fillable = ['name', 'building_number', 'apartment_count'];

    public function apartments()
    {
        return $this->hasMany(Apartment::class);
    }

    public function users()
    {
        return $this->hasMany(User::class, 'building_number');
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class, 'building_number');
    }


}
