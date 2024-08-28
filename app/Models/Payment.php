<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'apartment_id',
        'type',
        'amount',
        'status',
        'invoice_image',
    ];

    // İlişkileri tanımlama
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function apartment()
    {
        return $this->belongsTo(Apartment::class);
    }

    // Eğer tablo adını açıkça belirtmeniz gerekiyorsa
    // protected $table = 'payments';

    // Varsayılan değerleri tanımlama
    protected $attributes = [
        'status' => 'pending',
    ];

    // Cast işlemleri
    protected $casts = [
        'amount' => 'decimal:2',
        'status' => 'string',
    ];
}
