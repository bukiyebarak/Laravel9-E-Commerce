<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'surname',
        'address',
        'email',
        'phone',
        'total',
        'note',
        'city',
        'neighbourhood',
        'district',
        'zipcode',
        'user_id',
        'IP',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function orderitem()
    {
        return $this->hasMany(Orderitem::class, 'order_id');
    }

}
