<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaketCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'keywords',
        'image',
        'description',
        'slug',
    ];
    public function category()
    {
        return $this->hasMany(Category::class,'parent_id');
    }
    public function paket_products()
    {
        return $this->hasMany(PaketProduct::class);
    }

}
