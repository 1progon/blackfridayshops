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



Route::get('/', 'MainController@index');

Route::view('/unauthorized', 'unauthorized')->name('unauthorized');

Auth::routes();

Route::get('/categories', 'CategoriesController@index');
Route::get('/shops', 'ShopsController@index');


Route::get('/admitad', 'AdmitadController@index')
    ->name('admitad')
    ->middleware('auth');
Route::get('/admitad/cats', 'AdmitadController@getCategories')
    ->name('admitad.cats')
    ->middleware('auth');

Route::get('/admitad/saveCats', 'AdmitadController@saveCategoriesToDb')
    ->name('admitad.cats.save')
    ->middleware('auth');

Route::get('/admitad/saveCamps/{limit}/{offset}', 'AdmitadController@saveCampaigns')
    ->name('admitad.camps.save')
    ->middleware('auth');


Route::get('/category/{category}/{sub_category?}', 'CategoriesController@show')
    ->name('category');


Route::get('/{shop}', 'ShopsController@show')
    ->name('shop');




Route::get('/home', 'HomeController@index')->name('home');


