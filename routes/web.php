<?php

use Illuminate\Support\Facades\Route;

Route::any('products/search', 'ProductController@search')->name('products.search');
Route::resource('products', 'ProductController');

Route::get('/', function () {
    return redirect()->route('products.index');
});
