<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/' , [UserController::class , 'home'])->name('user.home');

Route::get('about' , [UserController::class, 'about'])->name('front_about');

Route::get('contact' , [UserController::class, 'contact'])->name('front_contact');

//Route::get('details/{slug}' , [UserController::class, 'product_details'])->name('product_details');

Route::get('details/{slug}' , [UserController::class, 'product_details'])->name('product_details');

Route::post('abc' , [UserController::class, 'company_ajax'])->name('company_ajax');


Route::post('def' , [UserController::class, 'model_ajax'])->name('model_ajax');

Route::get('category_details' , [UserController::class, 'category_details'])->name('category_details');


Route::group(['prefix'=>'admin','as'=>'admin.'],function(){
    require 'admin-login.php';
    Route::group(['middleware' => 'AdminAuth'], function(){
        require 'admin-dash.php';
    });
});