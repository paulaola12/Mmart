<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    use HasFactory;

    protected $fillable = [
        'payment_id',
        'first_name',
        'last_name',
        'product_name',
        'quantity',
        'amount',
        'payment_status',
        'reference'
    ];

}
