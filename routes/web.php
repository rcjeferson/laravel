<?php

use Illuminate\Support\Facades\Route;

Route::any('products/search', 'ProductController@search')->name('products.search')->middleware('auth');
Route::resource('products', 'ProductController')->middleware(['auth', 'check.is.admin']);

Route::get('/', function () {
    return redirect()->route('products.index');
});

Auth::routes(['register' => false]);
