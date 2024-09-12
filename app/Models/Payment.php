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



    protected $attributes = [
        'status' => 'pending',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'status' => 'string',
    ];
}
