<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'phone', 'subject','message','user_id','ip_address'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
