<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\Auth\ClientAuthController;
use App\Http\Controllers\front\FrontController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GovernorateController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

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


//admin
Route::group( ['middleware' => ['auth','auto-check']], function () { //

Route::get('/layout', function () { return view('layouts.layout');})->name('layout');
Route::resource('/governorate',GovernorateController::class);
Route::resource('/post',PostController::class);
Route::resource('/donation',DonationController::class);
Route::resource('/client',ClientController::class);
Route::resource('/city',CityController::class);
Route::resource('/role',RoleController::class);
Route::resource('/user',UserController::class);
Route::resource('/setting',SettingController::class);

}) ;


//client
Route::group(['middleware' => 'auth:client'],function(){

    Route::get('/clinet-index', [FrontController::class,'index'])->name('client-index');
    Route::get('/clinet-donation-create', [FrontController::class,'donationCreate'])->name('donation-create');

    Route::post('/clinet-donation-store', [FrontController::class,'donationStore'])->name('donation-store');
    Route::post('/client-toggle',[ClientController::class,'togglePosts'])->name('togglePosts');
    Route::post('/client-logout' , [ClientAuthController::class,'logout'])->name('clientlogout');
    Route::get('/clinet-index-ltr', [FrontController::class,'indexLtr'])->name('client-index-ltr');

});

//client login logout
Route::group(['prefix'=>'c'],function(){

// Route::get('/log', [ClientAuthController::class,'showlog'])->middleware('guest:client')->name('showlog');
Route::post('/clinetlogin', [ClientAuthController::class,'clientLogin'])->name('client-login');
Route::post('/clinetRegister', [ClientAuthController::class,'clientRegister'])->name('client-register');
});


//front
Route::group(['prefix' => 'front'],function(){

Route::get('/index', [FrontController::class,'index'])->name('index');
Route::get('/index-ltr', [FrontController::class,'indexLtr'])->name('index-ltr');
Route::get('/article-details', [FrontController::class,'articleDetails'])->name('article-details');
Route::get('/article-details-ltr', [FrontController::class,'articleDetailsLtr'])->name('article-details-ltr');
Route::get('/contact-us', [FrontController::class,'contactUs'])->name('contact-us');
Route::get('/contact-us-ltr', [FrontController::class,'contactUsLtr'])->name('contact-us-ltr');
Route::get('/donation-requests', [FrontController::class,'donationRequests'])->name('donation-requests');
Route::get('/donation-requests-ltr', [FrontController::class,'donationRequestsLtr'])->name('donation-requests-ltr');
Route::get('/inside-request', [FrontController::class,'insideRequest'])->name('inside-request');
Route::get('/inside-request-ltr', [FrontController::class,'insideRequestLtr'])->name('inside-request-ltr');
Route::get('/signin-account', [FrontController::class,'signinAccount'])->middleware('guest:client')->name('signin-account');
Route::get('/signin-account-ltr', [FrontController::class,'signinAccountLtr'])->middleware('guest:client')->name('signin-account-ltr');
Route::get('/who-are-us', [FrontController::class,'whoAreUs'])->name('who-are-us');
Route::get('/who-are-us-ltr', [FrontController::class,'whoAreUsLtr'])->name('who-are-us-ltr');
Route::get('/create-account', [FrontController::class,'createAccount'])->name('create-account');
Route::get('/create-account-ltr', [FrontController::class,'createAccountLtr'])->name('create-account-ltr');
Route::get('/search', [FrontController::class,'search'])->name('search');

});









Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

