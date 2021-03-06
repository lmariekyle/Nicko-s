<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FoodCategoryController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\CustomerDashboard;
use App\Http\Controllers\CateringController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\AdminHomePageController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\FoodOrderController;
use App\Http\Controllers\AdminCateringController;
use App\Http\Controllers\AdminCustomerController;


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

Route::get('aboutus',[HomeController::class,'aboutus']);

//Food Menu Routes
Route::get('menu',[HomeController::class,'menu']);
Route::get('viewcategory/{CategoryName}',[HomeController::class, 'viewcategory']);
Route::get('viewcategory/{CategoryName}/{Name}',[HomeController::class, 'foodview']);
Route::get('viewfood/{Name}',[HomeController::class, 'viewfood']);
Route::middleware(['auth'])->group(function (){
});
Route::post('add-to-basket',[BasketController::class,'addFood']);
Route::get('basket',[BasketController::class,'viewbasket']);
Route::post('delete-basket-item',[BasketController::class,'deleteItem']);
Route::post('update-basket',[BasketController::class,'updateBasket']);
Route::get('checkout',[CheckoutController::class,'index']);
Route::post('place-order',[CheckoutController::class,'placeorder']);

//Admin Dashboard
Route::get('admin', function () {
    return view('dashboard');
});

//Admin Login
Route::get('admin/login',[AdminController::class,'login']);
Route::post('admin/login',[AdminController::class,'check_login']);
Route::get('admin/logout',[AdminController::class,'logout']);

//Forgot password routes
Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

//To get view
Route::get('forgotpassword',[ForgotPasswordController::class,'forgotpassword']);


//Food Category Route
Route::get('admin/foodcategory/{id}/delete',[FoodCategoryController::class,'destroy']);
Route::resource('admin/foodcategory',FoodCategoryController::class);
// Route::get('foodcategory',[FoodCategoryController::class, 'index']);
// Route::post('foodcategory',[FoodCategoryController::class, 'index']);
// Route::put('foodcategory',[FoodCategoryController::class, 'index']);
// Route::delete('foodcategory',[FoodCategoryController::class, 'index']);

//Admin Food Route
Route::get('admin/food/{id}/delete',[FoodController::class,'destroy']);
Route::resource('admin/food',FoodController::class);
Route::resource('admin/customer',CustomerController::class);

//Admin Food Order Route
Route::get('orders',[FoodOrderController::class,'index']);
Route::get('admin/view-order/{id}',[FoodOrderController::class,'view']);
Route::put('update-order/{id}',[FoodOrderController::class,'updateorder']);
Route::get('order-history',[FoodOrderController::class,'orderhistory']);

//Customer
Route::get('login',[CustomerController::class,'login']);
Route::post('customer/login',[CustomerController::class,'customer_login']);
Route::get('logout',[CustomerController::class,'logout']);
Route::get('register',[CustomerController::class,'register']);

Route::get('profile',[CustomerDashboard::class,'customer_profile']);
Route::get('customer/editprofile',[CustomerDashboard::class,'customer_editprofile']);
Route::post('customer/profile',[CustomerDashboard::class,'update']);
Route::post('profile',[CustomerDashboard::class,'update_avatar']);

Route::get('admin/foods/{id}/delete',[FoodController::class,'destroy']);
Route::resource('admin/foods',FoodController::class);

//Package Route
Route::get('admin/package/{id}/delete',[PackageController::class,'destroy']);
Route::resource('admin/package',PackageController::class);

//Admin HomePageCRUD Route
Route::get('admin/homepage/{id}/delete',[AdminHomePageController::class,'destroy']);
Route::resource('admin/homepage',AdminHomePageController::class);


// Catering
Route::get('catering', [CateringController::class, 'landing']);

Route::post('catering/event_form_post', [CateringController::class, 'event_form_post']);
Route::get('catering/event_form', [CateringController::class, 'event_form']);

Route::post('catering/package_post', [CateringController::class, 'package_post']);
Route::get('catering/package', [CateringController::class, 'package']);

Route::post('catering/package_detail_post', [CateringController::class, 'package_detail_post']);
Route::get('catering/package_detail', [CateringController::class, 'package_detail']);
Route::get('catering/summary', [CateringController::class, 'summary']);
Route::get('catering/catering_done', [CateringController::class, 'catering_done']);

Route::get('catering/payment', [CateringController::class, 'payment']);
Route::get('catering/reservation', [CateringController::class, 'reservation']);

// Admin Catering
Route::get('admin/catering/history',[ AdminCateringController::class, 'history']);
Route::put('admin/catering/payment/{id}',[ AdminCateringController::class, 'payment_put']);
Route::get('admin/catering/payment/{id}',[ AdminCateringController::class, 'payment_get']);
Route::get('admin/catering/complete/{id}',[ AdminCateringController::class, 'complete']);
Route::get('admin/catering/cancel/{id}',[ AdminCateringController::class, 'cancel']);
Route::get('admin/catering/approve/{id}',[ AdminCateringController::class, 'approve']);
Route::resource('admin/catering', AdminCateringController::class);

// Admin Customer
Route::get('admin/customers/testimonials',[AdminCustomerController::class, 'testimonials']);
Route::put('admin/customers/feature/{id}',[AdminCustomerController::class, 'feature']);
Route::put('admin/customers/unfeature/{id}',[AdminCustomerController::class, 'unfeature']);
Route::get('admin/customers/{id}/delete', [AdminCustomerController::class, 'destroy']);
Route::resource('admin/customers', AdminCustomerController::class);
