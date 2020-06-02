<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{

    protected $table = 'sub_categories';

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function shops()
    {
        return $this->belongsToMany(Shop::class, 'shop_subcategory', 'subcategory_id', 'shop_id', 'id', 'id');
    }
}
