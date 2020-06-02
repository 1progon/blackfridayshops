<?php

namespace App\Http\Controllers;

use App\Category;
use App\Shop;
use App\SubCategory;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param bool $sidebar
     * @return Category[]|Application|Factory|Collection|View
     */
    public function index($sidebar = false)
    {
        if ($sidebar) {
            return Category::all();
        }

        $cats = Category::paginate();

        return view('category.index', compact('cats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param Category $category
     * @param SubCategory $subCategory
     * @return Application|Factory|View
     */
    public function show(Category $category, SubCategory $subCategory = null)
    {
        if ($subCategory) {
            $shops = $category->subCategories()
                ->firstWhere('slug', '=', $subCategory->slug)
                ->shops()->paginate();
        } else {
            $shops = $category->shops()->paginate();
        }


        return view('category.show', compact('shops', 'category', 'subCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Category $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Category $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
