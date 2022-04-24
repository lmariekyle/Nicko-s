<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FoodCategoryController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\CustomerDashboard;
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

Route::get('/',[HomeController::class,'home']);

//Admin Dashboard
Route::get('admin', function () {
    return view('dashboard');
});


//Admin Login
Route::get('admin/login',[AdminController::class,'login']);
Route::post('admin/login',[AdminController::class,'check_login']);
Route::get('admin/logout',[AdminController::class,'logout']);

//Food Category Route
Route::get('admin/foodcategory/{id}/delete',[FoodCategoryController::class,'destroy']);
Route::resource('admin/foodcategory',FoodCategoryController::class);
// Route::get('foodcategory',[FoodCategoryController::class, 'index']);
// Route::post('foodcategory',[FoodCategoryController::class, 'index']);
// Route::put('foodcategory',[FoodCategoryController::class, 'index']);
// Route::delete('foodcategory',[FoodCategoryController::class, 'index']);

//Food Route
Route::get('admin/food/{id}/delete',[FoodController::class,'destroy']);
Route::resource('admin/food',FoodController::class);
Route::resource('admin/customer',CustomerController::class);

//Customer
Route::get('login',[CustomerController::class,'login']);
Route::post('customer/login',[CustomerController::class,'customer_login']);
Route::get('logout',[CustomerController::class,'logout']);
Route::get('register',[CustomerController::class,'register']);
Route::get('forgotpassword',[ForgotPasswordController::class,'forgotpassword']);

Route::get('profile',[CustomerDashboard::class,'customer_profile']);
Route::get('customer/editprofile',[CustomerDashboard::class,'customer_editprofile']);
Route::post('customer/profile',[CustomerDashboard::class,'update']);
Route::post('profile',[CustomerDashboard::class,'update_avatar']);



