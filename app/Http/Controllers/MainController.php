<?php

namespace App\Http\Controllers;

use App\Category;
use App\Shop;

class MainController extends Controller
{
    public function index()
    {

        $mainCats = Category::all();
        $topShops = Shop::active()->where('popular', 1)->paginate(30);


        if (request()->query('page') > $topShops->lastPage()) {
            abort(404);
        }


        return view('home', compact('topShops', 'mainCats'));
    }
}
