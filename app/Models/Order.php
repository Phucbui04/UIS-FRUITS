<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'phone',
        'address',
        'status',
        'payment_method',
        'user_id',
        'totel_amount',
        'order_date'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
    public function shipment()
    {
        return $this->hasOne(Shipment::class);
    }
}
