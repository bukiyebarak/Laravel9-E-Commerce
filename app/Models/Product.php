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

    //One to Many (Inverse)/ Belongs to
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

    public function orderitem()
    {
        return $this->hasMany(Orderitem::class);
    }
}
