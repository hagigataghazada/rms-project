<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'resident_id', 'message'];

    // Bildirimi gönderen kullanıcı (admin)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Bildirimi alan sakin
    public function resident()
    {
        return $this->belongsTo(User::class, 'resident_id');
    }
}
