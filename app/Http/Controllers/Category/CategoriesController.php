<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Model\Category\Category;
use App\Model\Category\SubCategory;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
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
     * @param Category $category
     * @param SubCategory|null $subCategory
     * @return Application|Factory|RedirectResponse|View
     */
    public function show(Category $category, SubCategory $subCategory = null)
    {
        if ($subCategory) {
            $shops = $category->subCategories()
                ->firstWhere('slug', '=', $subCategory->slug)
                ->shops()->active()->paginate();
        } else {
            $shops = $category->shops()->active()->paginate();
        }

        if (request()->query('page') > $shops->lastPage()) {
            abort('404');
        }


        return view('category.show', compact('shops', 'category', 'subCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Category $category
     * @return Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Category $category
     * @return Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
