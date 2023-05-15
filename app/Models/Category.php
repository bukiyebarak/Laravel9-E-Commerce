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
        'title_en',
        'keywords_en',
        'detail_en',
        'description_en',
        'title_tr',
        'keywords_tr',
        'detail_tr',
        'description_tr',
        'slug',
       'image',
    ];
    protected $appends=[
        'parent','title', 'keywords', 'description','detail'
    ];

    public function getTitleAttribute()
    {
        $language = app()->getLocale();
        $titleColumn = 'title_' . $language; // Doğru dil sütununun adı
        return $this->{$titleColumn};
    }
    public function getKeywordsAttribute()
    {
        $language = app()->getLocale();
        $titleColumn = 'keywords_' . $language; // Doğru dil sütununun adı
        return $this->{$titleColumn};
    }
    public function getDescriptionAttribute()
    {
        $language = app()->getLocale();
        $titleColumn = 'description_' . $language; // Doğru dil sütununun adı
        return $this->{$titleColumn};
    }
    public function getDetailAttribute()
    {
        $language = app()->getLocale();
        $titleColumn = 'detail_' . $language; // Doğru dil sütununun adı
        return $this->{$titleColumn};
    }
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
