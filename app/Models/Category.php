<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'parent_id',
        'title',
        'keywords',
        'image',
        'description',
        'slug',
    ];

    protected $appends=[
        'parent',
    ];

    //One to Many
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    //One to Many Inverse
    public function parent()
    {
        return $this->belongsTo(Category::class,'parent_id');
    }

    //One To Many
    public function children()
    {
        return $this->hasMany(Category::class,'parent_id');
    }

}
