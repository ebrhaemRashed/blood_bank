<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\MainController;
use App\Http\Controllers\Api\AuthController;
use App\Mail\ResetMail;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/governrates',[MainController::class,'governrates']);
Route::get('/cities',[MainController::class,'cities']);

Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);
Route::post('/forgetpassword',[AuthController::class,'forgetpassword']);
Route::post('/resetpassword',[AuthController::class,'resetpassword']);



Route::group(['middleware' => 'auth:api'],function(){
    Route::get('/posts',[MainController::class,'posts']);
    Route::get('/favposts',[MainController::class,'favposts']);
    Route::post('/editprofile' ,[AuthController::class,'editprofile']);
});


//test
Route::get('/mail', function (){
    return new ResetMail('rashed');
});
