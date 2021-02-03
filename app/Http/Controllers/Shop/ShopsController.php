<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Model\Shop\Shop;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class ShopsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $shops = Shop::active()->paginate();

        return view('shop.index', compact('shops'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param Shop $shop
     * @return Application|Factory|RedirectResponse|View
     */
    public function show(Shop $shop)
    {
        if($shop->adm_status !== 'active' || $shop->adm_connection_status !== 'active') {
                return redirect()->route('unauthorized');

        }

        $cats = $shop->categories;
        $subCats = $shop->subCategories;


        return view('shop.show', compact('shop', 'cats', 'subCats'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Shop $shop
     * @return Response
     */
    public function edit(Shop $shop)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Shop $shop
     * @return Response
     */
    public function update(Request $request, Shop $shop)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Shop $shop
     * @return Response
     */
    public function destroy(Shop $shop)
    {
        //
    }
}
