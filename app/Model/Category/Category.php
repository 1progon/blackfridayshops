<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    public function getRouteKeyName()
    {
        return 'slug';
    }


    public function subCategories()
    {
        return $this->hasMany(SubCategory::class);
    }

    public function shops()
    {
        return $this->belongsToMany(Shop::class, 'shop_category', 'category_id', 'shop_id');
    }
}
