<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'payment_methosd',
        'order_id',
        'payment_date',
        'status'
    ];
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
