<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'keywords', 'description', 'image', 'detail', 'price', 'quantity', 'minquantity', 'tax', 'slug',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function shopcart()
    {
        return $this->hasMany(Shopcart::class);
    }
    public function wishlist()
    {
        return $this->hasMany(Wishlist::class);
    }
    public function orderitem()
    {
        return $this->hasMany(Orderitem::class);
    }
}
