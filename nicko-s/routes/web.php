<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FoodCategoryController;

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

Route::get('/', function () {
    return view('welcome');
});

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