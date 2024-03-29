<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\Auth;

class Product extends Model
{
    use HasFactory,Sluggable;

    protected $appends = ['title', 'keywords', 'description','detail'];
    protected $fillable = [
       'title_tr', 'keywords_tr', 'description_tr', 'title_en', 'keywords_en', 'description_en', 'image', 'detail', 'price', 'quantity', 'minquantity', 'tax', 'slug','category_id','slug','status'
    ];

    public function scopeIsSearch( $query, $search)
    {
        $locale = app()->getLocale();
        return $query->where('title_'.$locale, 'like', '%' . $search . '%');
    }
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

    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Category::class,'category_id');
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
    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title_tr'
            ]
        ];
    }
}
