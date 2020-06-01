<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function getRouteKeyName()
    {
        return 'slug';
    }


    public function shops()
    {
        return $this->hasMany(Shop::class);
    }

    public function subcats()
    {
        return $this->hasMany(SubCategory::class);
    }
}
