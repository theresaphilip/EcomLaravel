<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(["auth"])->group(function(){
Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
Route::resource('roles','RoleController');
Route::resource('users','UserController');
Route::resource('banners','BannerController');
Route::resource('categories','CategoryController');
Route::resource('products','ProductController');
Route::resource('configurations','ConfigurationController');
Route::resource('coupons','CouponController');
Route::resource('contacts','ContactController');
Route::resource('cms','CmsController');
Route::get('/deleteimages/{id}', [App\Http\Controllers\ProductController::class, 'destroyImage']);
});