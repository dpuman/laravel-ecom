<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController;

Route::get('/',[HomeController::class,'index'] )->name('home');
Route::get('/products/category/{id}',[HomeController::class,'categoryProducts'] )->name('categoryProducts');
Route::get('/products/brand/{id}',[HomeController::class,'brandProducts'] )->name('brandProducts');
Route::get('/product/details/{id}',[HomeController::class,'productDetails'] )->name('product.details');

Route::resource('/category',CategoryController::class);
Route::resource('/brand',BrandController::class);
Route::resource('/product',ProductController::class);
