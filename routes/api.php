<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JwtController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
// Route::group(['middleware'=>'api'], function ($router) {
//     Route::post('logout',[JwtController::class,'logout']);
//     Route::post('refresh',[JwtController::class,'refresh']);
//     Route::post('profile',[JwtController::class,'profile']);
//     Route::post('login',[JwtController::class,'login']);
//     Route::post('register',[JwtController::class,'register']);
   
//     });

    Route::group(['middleware'=>['jwt']], function ($router) {
        Route::post('logout',[JwtController::class,'logout']);
        Route::post('refresh',[JwtController::class,'refresh']);
        Route::get('profile',[JwtController::class,'profile']);
        Route::post('editprofile',[JwtController::class,'UpdateProfile']);
        Route::post('changepass',[JwtController::class,'changePassword']);
    });
    
    Route::post('login',[JwtController::class,'login']);
    Route::post('register',[JwtController::class,'register']);
    Route::post('contact',[JwtController::class,'contact']);
    Route::get('banner',[JwtController::class,'banner']);
    Route::get('category',[JwtController::class,'category']);
    Route::get('category/{id}',[JwtController::class,'show']);
    Route::get('product',[JwtController::class,'product']);
    Route::get('productdetails/{id}',[JwtController::class,'productdetails']);
    Route::get('coupon',[JwtController::class,'coupon']);
    Route::get('cms',[JwtController::class,'cms']);
    Route::get('cms/{id}',[JwtController::class,'cmsById']);
