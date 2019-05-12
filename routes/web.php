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

Route::get('/', function () {
    return redirect("/login");
});

Auth::routes();

Route::get('auth/{provider}', 'AuthController@redirectToProvider');
Route::get('auth/{provider}/callback', 'AuthController@handleProviderCallback');

Route::get('/', 'HomeController@index')->name('index');

Route::resource('/product', 'ProdukController');

Route::group(['middleware' => array('web', 'auth'), 'prefix' => 'shop'], function()
{
    Route::get('/', 'AdminController@index')->name('home');

});
