<?php

namespace App\Http\Controllers;

use App\Shop;

class MainController extends Controller
{
    public function index()
    {
        $topShops = Shop::active()->where('popular', 1)->paginate(30);


        return view('home', compact('topShops'));
    }
}
