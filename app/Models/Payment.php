<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'apartment_number',
        'type',
        'amount',
        'status',
        'invoice_image',
    ];

    public function apartment()
    {
        return $this->belongsTo(Apartment::class, 'apartment_number');
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
