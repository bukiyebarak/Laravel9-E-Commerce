<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreditCard extends Model
{
    use HasFactory;
    protected $fillable = [
        'cart_name',
        'cart_no',
        'expire_month',
        'expire_year',
        'cvc',
        'name',
        'surname',
        'address',
        'email',
        'phone',
        'zipcode',
        ];
}
