<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $fillable = [
        "name",
        "slug",
        "adm_id",
        "adm_image",
        "adm_status",
        "adm_connection_status",
        "adm_modified_date",
        "adm_gotolink",
        "description",
        "website",
        "popular",
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }


    public function categories()
    {
        return $this->belongsToMany(Category::class, 'shop_category', 'shop_id', 'category_id');
    }

    public function subCategories()
    {
        return $this->belongsToMany(SubCategory::class, 'shop_subcategory', 'shop_id', 'subcategory_id');
    }
}
