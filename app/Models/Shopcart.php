<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Shopcart extends Model
{
    use HasFactory;
    use Notifiable;

    protected $fillable = ['user_id', 'product_id','quantity'];


    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
