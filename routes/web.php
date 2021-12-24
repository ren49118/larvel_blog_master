<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('about',function(){
// 	return view('about');
// });
// Route::get('/','MainController@home')->name('home');
// Route::get('/home','MainController@home')->name('home');
Route::get('orderhistory','FrontendController@orderhistory')->name('orderhistory');
Route::get('/','FrontendController@home')->name('homepage');
Route::get('checkout','FrontendController@checkout')->name('checkout');
Route::get('detail/{id}','FrontendController@detail')->name('detail');
Route::get('subitem/{id}','FrontendController@subitem')->name('subitem');
Route::get('branditem/{id}','FrontendController@branditem')->name('branditem');
Route::get('bycategory/{id}','FrontendController@bycategory')->name('bycategory');

// Route::get('/about','FrontendController@about')->name('about');
// Route::get('/postdetail/{id}','FrontendController@postdetail')->name('postdetail');
// Route::get('/contact','FrontendController@contact')->name('contact');


// Route::middleware('role:admin')->group(function () {
    // backend
	Route::get('/dashboard','BackendController@dashboard')->name('dashboard');
	//crud
	Route::resource('brands','BrandController'); 
	Route::resource('/categories','CategoryController');
	Route::resource('/subcategories','SubcategoryController'); 
	Route::resource('items','ItemController');
// });
 // orders
Route::resource('orders','OrderController');
Route::get('confirm/{id}','OrderController@confirm')->name('order.confirm');
Auth::routes(['verify'=>true]);

Route::get('/home', 'HomeController@index')->name('home');
