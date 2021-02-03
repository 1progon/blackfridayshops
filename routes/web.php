<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', 'MainController@index')->name('homepage');


//Pages
Route::view('about', 'page.about')->name('page.about');

Route::view('contact', 'page.contact')->name('page.contact');
Route::post('contact', 'MainController@sendContactMessage')->name('page.contact.send');

Route::view('unauthorized', 'unauthorized')->name('unauthorized');

//Front Categories
Route::get('/categories', 'Category\CategoriesController@index')->name('front.categories.index');
Route::get('/shops', 'Shop\ShopsController@index')->name('front.shops.index');

Route::get('/category/{category}/{sub_category?}', 'Category\CategoriesController@show')
    ->name('category');

//Front Shops
Route::get('/{shop}', 'Shop\ShopsController@show')
    ->name('front.shops.show');


//Admin routes
Route::prefix('admin')
    ->middleware(['auth', 'userOnlyActive'])
    ->group(function () {

        Route::get('dashboard', 'HomeController@index')->name('dashboard');
        Route::resource('shops', 'Admin\AdminShopsController');

        Route::post('deactivateShop/{shop}', 'Admin\AdminShopsController@deactivateAdmitadShopStatus')
            ->name('shop.deactivate');

        Route::get('admitad', 'AdmitadController@index')
            ->name('admin.admitad');

        Route::get('admitad/cats', 'AdmitadController@getCategories')
            ->name('admin.admitad.cats');

        Route::get('admitad/saveCats', 'AdmitadController@saveCategoriesToDb')
            ->name('admin.admitad.cats.save');

        Route::get('admitad/saveCamps/{limit}/{offset}', 'AdmitadController@saveCampaigns')
            ->name('admin.admitad.camps.save');
    });









