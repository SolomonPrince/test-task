<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'payments';

    protected $fillable = [
        'merchant_id',
        'payment_id',
        'status',
        'amount',
        'amount_paid',
        'timestamp',
        'sign',
        'rand'
    ];
}
