<?php

use App\Http\Controllers\CustomerOrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopgridsController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\UnitController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\CustomerAuthController;
use App\Http\Controllers\SslCommerzPaymentController;
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
Route::get('/',[ShopgridsController::class,'index'])->name('home');
Route::get('/product-category/{id}',[ShopgridsController::class,'category'])->name('product-category');
Route::get('/Product-details/{id}',[ShopgridsController::class,'details'])->name('Product-details');
Route::post('/add-to-cart/{id}',[CartController::class,'index'])->name('add-to-cart');
Route::get('/show-cart',[CartController::class,'show'])->name('show-cart');
Route::post('/update-cart-product/{id}',[CartController::class,'update'])->name('update-cart-product');
Route::get('/remove-cart-product/{id}',[CartController::class,'remove'])->name('remove-cart-product');
Route::get('/checkout-page',[CheckoutController::class,'index'])->name('checkout-page');
Route::post('/new-cash-order',[CheckoutController::class,'newCashOrder'])->name('new-cash-order');
Route::get('/complete-order',[CheckoutController::class,'completeOrder'])->name('complete-order');


Route::get('/customer-login', [CustomerAuthController::class, 'index'])->name('customer.index');
Route::post('/customer-login', [CustomerAuthController::class, 'login'])->name('customer.login');
Route::post('/customer-register', [CustomerAuthController::class, 'register'])->name('customer.register');
Route::get('/customer-logout', [CustomerAuthController::class, 'logout'])->name('customer.logout');
Route::get('/customer-dashboard', [CustomerAuthController::class, 'dashboard'])->name('customer.dashboard');
Route::get('/customer-profile', [CustomerAuthController::class, 'profile'])->name('customer.profile');
Route::get('/customer-order', [CustomerOrderController::class, 'allOrder'])->name('customer.order');


// SSLCOMMERZ Start
Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END
//Route::get('/', function () {
//    return view('welcome');
//});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard',[DashboardController::class,'dashboard'])->name('dashboard');
//    category
    Route::get('/category/add',[CategoryController::class,'index'])->name('category.add');
    Route::get('/category/manage',[CategoryController::class,'manage'])->name('category.manage');
    Route::post('/category/store',[CategoryController::class,'store'])->name('category.store');
    Route::get('/category/edit/{id}',[CategoryController::class,'edit'])->name('category.edit');
    Route::post('/category/update/{id}',[CategoryController::class,'update'])->name('category.update');
    Route::get('/category/delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');


//    subcategory
    Route::get('subcategory/add',[SubCategoryController::class,'index'])->name('subcategory.add');
    Route::get('subcategory/manage',[SubCategoryController::class,'manage'])->name('subcategory.manage');
    Route::post('subcategory/store',[SubCategoryController::class,'store'])->name('subcategory.store');
    Route::get('subcategory/edit/{id}',[SubCategoryController::class,'edit'])->name('subcategory.edit');
    Route::post('subcategory/update/{id}',[SubCategoryController::class,'update'])->name('subcategory.update');
    Route::get('subcategory/delete/{id}',[SubCategoryController::class,'delete'])->name('subcategory.delete');
//     brand
    Route::get('brand/add',[BrandController::class,'index'])->name('brand.add');
    Route::get('brand/manage',[BrandController::class,'manage'])->name('brand.manage');
    Route::post('brand/store',[BrandController::class,'store'])->name('brand.store');
    Route::get('brand/edit/{id}',[BrandController::class,'edit'])->name('brand.edit');
    Route::post('brand/update/{id}',[BrandController::class,'update'])->name('brand.update');
    Route::get('brand/delete/{id}',[BrandController::class,'delete'])->name('brand.delete');

//    unit
    Route::get('unit/add',[UnitController::class,'index'])->name('unit.add');
    Route::get('unit/manage',[UnitController::class,'manage'])->name('unit.manage');
    Route::post('unit/store',[UnitController::class,'store'])->name('unit.store');
    Route::get('unit/edit/{id}',[UnitController::class,'edit'])->name('unit.edit');
    Route::post('unit/update/{id}',[UnitController::class,'update'])->name('unit.update');
    Route::get('unit/delete/{id}',[UnitController::class,'delete'])->name('unit.delete');

//    product
    Route::get('product/add',[ProductController::class,'index'])->name('product.add');
    Route::get('/product/get-subcategory-by-category', [ProductController::class, 'getSubCategoryByCategory'])->name('product.get-subcategory-by-category');
    Route::get('product/manage',[ProductController::class,'manage'])->name('product.manage');
    Route::post('product/store',[ProductController::class,'store'])->name('product.store');
    Route::get('/product/detail/{id}', [ProductController::class, 'detail'])->name('product.detail');
    Route::get('product/edit/{id}',[ProductController::class,'edit'])->name('product.edit');
    Route::post('product/update/{id}',[ProductController::class,'update'])->name('product.update');
    Route::get('product/delete/{id}',[ProductController::class,'delete'])->name('product.delete');

});
