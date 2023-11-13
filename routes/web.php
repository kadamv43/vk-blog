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

use Illuminate\Support\Facades\Route;


Route::get('home','HomeController@index');
Route::get('/','HomeController@index');

Route::get('details', function () {
    return view('blog_detail');
});

Route::get('about-us', function () {
    return view('about_us');
})->name('about');

Route::get('contact-us', function () {
    return view('contact_us');
})->name('contact');


Route::group(['prefix'=>'admin','namespace'=>'Backend','middleware'=>'auth'], function(){
    Route::resource('posts','PostController');
    Route::resource('categories','CategoryController');
    Route::resource('dashboard', 'DashboardController');
});



Auth::routes(['register' => false]);


