<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'name',
        'category_id',
        'price',
        'discount',
        'stock',
        'description',
        'descriptiondetail',
        'image',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function discounts()
    {
        return $this->belongsToMany(Discount::class, 'product_discount');
    }
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }
    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }
}
