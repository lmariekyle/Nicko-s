<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FoodCategoryController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CateringController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\AdminHomePageController;

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
//Website Routes
Route::get('/',[HomeController::class,'home']);
Route::get('menu',[HomeController::class,'menu']);
Route::get('viewcategory/{CategoryName}',[HomeController::class, 'viewcategory']);
Route::get('viewcategory/{CategoryName}/{Name}',[HomeController::class, 'foodview']);
Route::get('viewfood/{Name}',[HomeController::class, 'viewfood']);

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
Route::get('admin/foods/{id}/delete',[FoodController::class,'destroy']);
Route::resource('admin/foods',FoodController::class);

//Package Route
Route::get('admin/package/{id}/delete',[PackageController::class,'destroy']);
Route::resource('admin/package',PackageController::class);

//Admin HomePageCRUD Route
Route::get('admin/homepage/{id}/delete',[AdminHomePageController::class,'destroy']);
Route::resource('admin/homepage',AdminHomePageController::class);

Route::get('catering', [CateringController::class, 'landing']);
Route::get('catering/event_form', [CateringController::class, 'event_form']);
Route::get('catering/package', [CateringController::class, 'package']);
Route::get('catering/package_detail', [CateringController::class, 'package_detail']);
Route::get('catering/summary', [CateringController::class, 'summary']);
