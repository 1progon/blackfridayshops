<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Shop\Shop;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class AdminShopsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param Request|null $request
     * @return Application|Factory|Response|View
     */
    public function index(Request $request)
    {
        $admStatus = $request->input('admStatus', 0);
        $filterBy = $request->input('findBy', '');

        if (!empty($filterBy)) {
            $shops = Shop::where('slug', 'like', '%' . $filterBy . '%')
                ->orWhere('id', '=', $filterBy)
                ->orWhere('name', 'like', '%' . $filterBy . '%')
                ->paginate();

            return view('user.shops.index', compact('shops', 'admStatus', 'filterBy'));
        }

        if ($admStatus == 1) {
            $shops = Shop::where('adm_status', '=', 'active')->orderBy('created_at', 'desc')->paginate();
        } else {
            $shops = Shop::orderBy('created_at', 'desc')->paginate();
        }

        return view('user.shops.index', compact('shops', 'admStatus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|Response|View
     */
    public function create()
    {
        return view('user.shops.add-shop');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {

        $shop = new Shop();

        $shop->fill($request->except('_token'));
        $shop->save();

        return redirect()->route('shops.index');


    }

    /**
     * Display the specified resource.
     *
     * @param Shop $shop
     * @return Response
     */
    public function show(Shop $shop)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Shop $shop
     * @return Application|Factory|Response|View
     */
    public function edit(Shop $shop)
    {
        return view('user.shops.edit-shop', compact('shop'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Shop $shop
     * @return RedirectResponse
     */
    public function update(Request $request, Shop $shop)
    {
        $shop->fill($request->except('_token'));

        $shop->update();

        return redirect()->route('shops.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Shop $shop
     * @return RedirectResponse|string|true
     */
    public function destroy(Shop $shop)
    {

        try {
            $shop->delete();
        } catch (\Exception $e) {
            return print_r($e->getMessage());
        }

        return redirect()->route('shops.index');
    }


    /**
     * @param Shop $shop
     * @return RedirectResponse
     */
    public function deactivateAdmitadShopStatus(Shop $shop)
    {
        $shop->adm_status = $shop->adm_status == 'active' ? 'disabled' : 'active';

        $shop->update();

        return redirect()->route('shops.index');
    }
}
