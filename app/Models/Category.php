<?php

namespace App\Models;

use App\Http\Controllers\Admin\PaketProductController;
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
        'detail',
    ];

    protected $appends=[
        'parent',
    ];

    //One to Many
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function paket_products()
    {
        return $this->hasMany(PaketProductController::class);
    }
    //One to Many Inverse
    public function parent()
    {
        return $this->belongsTo(Category::class,'parent_id');
    }

    public function paket()
    {
        return $this->belongsTo(PaketCategory::class,'paket_parent_id');
    }
    //One To Many
    public function children()
    {
        return $this->hasMany(Category::class,'parent_id');
    }

}
