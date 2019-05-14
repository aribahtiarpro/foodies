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

Route::group(['middleware' => array('web', 'auth')], function()
{
    Route::get('/', 'HomeController@index')->name('index');
    Route::get('/get-cart', 'HomeController@getCart')->name('get-cart');
    Route::post('/add-cart', 'HomeController@addCart')->name('add-cart');
    Route::get('/delete-cart/{id}', 'HomeController@deleteCart');
    Route::post('/checkout', 'HomeController@checkout')->name('checkout');

    Route::resource('/product', 'ProdukController');
    Route::get('/semua-data-produk', 'ProdukController@semuaProduk');
    Route::post('/edit-produk', 'ProdukController@editProduk')->name("edit-produk");
    Route::post('/deletet-produk', 'ProdukController@deleteProduk')->name("delete-produk");

    Route::resource('/kategori', 'KategoriController');
    Route::post('/edit-kategori', 'KategoriController@edit')->name("edit-kategori");
    Route::post('/delete-kategori', 'KategoriController@destroy')->name("delete-kategori");
    Route::get('/semua-data-kategori', 'KategoriController@semuaDataKategori')->name("semua-data-kategori");
    

    Route::resource('/pesanan', 'TransaksiController');
    Route::get('/semua-data-transaksi', 'TransaksiController@semuaTransaksi');

    Route::group(['prefix' => 'warung'], function()
    {
        Route::get('/', 'AdminController@index')->name('home');

    });
});


// Public URL
Route::get('/search-data/{search}', 'PublicController@searchData')->name("search-data");
Route::get('/kat/{slug}', 'PublicController@kategori');
Route::get('/@{username}', 'PublicController@username');
Route::get('/{slug}', 'PublicController@product');
