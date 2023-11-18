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
Route::post('/upload-image','HomeController@upload')->name('ckeditor.upload');

Route::get('details/{id}/{slug?}','HomeController@details');
Route::get('category/{id}/{slug?}','HomeController@category')->name('category');
Route::get('categories','HomeController@categoryList')->name('categories');

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


