<?php

namespace App\Http\Controllers;

use App\Shop;

class MainController extends Controller
{
    public function index()
    {
        $topShops = Shop::where('popular', 1)->paginate();


        return view('home', compact('topShops'));
    }
}
