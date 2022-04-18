<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FoodCategoryController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PackageController;

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
Route::get('menu',[HomeController::class,'menu']);

//Admin Dashboard
Route::get('admin', function () {
    return view('dashboard');
});

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
// Route::get('admin/package/{id}/delete',[PackageController::class,'destroy']);
Route::resource('admin/package',PackageController::class);