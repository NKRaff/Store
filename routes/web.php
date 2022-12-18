<?php

use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CupomController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\UserController;

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


//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', [FrontendController::class, 'index']);

Auth::routes();

Route::get('category', [FrontendController::class, 'category']);
Route::get('view-category/{slug}', [FrontendController::class, 'viewcategory']);
Route::get('category/{cate_slug}/{prod_id}', [FrontendController::class, 'productview']);

Route::get('product', [FrontendController::class, 'product']);
Route::get('product-list', [FrontendController::class, 'productListAjax']);
Route::post('searchProduct', [FrontendController::class, 'searchProduct']);

Route::post('add-to-cart', [CartController::class, 'addProduct']);
Route::post('update-cart', [CartController::class, 'updateCart']);
Route::post('delete-cart-item', [CartController::class, 'deleteProduct']);

Route::middleware(['auth'])->group(function (){
    Route::get('cart', [CartController::class, 'viewCart']);
    Route::get('checkout', [CheckoutController::class, 'index']);
    Route::post('place-order', [CheckoutController::class, 'placeorder']);

    Route::get('my-orders', [UserController::class, 'index']);
    Route::get('view-order/{id}', [UserController::class, 'view']);
});

Route::middleware(['auth', 'isAdmin'])->group(function (){
    Route::get('/dashboard', [App\Http\Controllers\Admin\FrontendController::class, 'index']);

    Route::get('categories', [CategoryController::class, 'index']);
    Route::get('add-category', [CategoryController::class, 'add']);
    Route::post('insert-category', [CategoryController::class, 'insert']);
    Route::get('edit-category/{id}', [CategoryController::class, 'edit']);
    Route::put('updade-category/{id}', [CategoryController::class, 'update']);
    Route::get('delete-category/{id}', [CategoryController::class, 'destroy']);

    Route::get('products', [ProductController::class, 'index']);
    Route::get('add-products', [ProductController::class, 'add']);
    Route::post('insert-products', [ProductController::class, 'insert']);
    Route::get('edit-product/{id}', [ProductController::class, 'edit']);
    Route::put('update-product/{id}', [ProductController::class, 'update']);
    Route::get('delete-product/{id}', [ProductController::class, 'destroy']);

    Route::get('cupons', [CupomController::class, 'index']);
    Route::get('add-cupons', [CupomController::class, 'add']);
    Route::post('insert-cupons', [CupomController::class, 'insert']);
    Route::get('edit-cupons/{id}', [CupomController::class, 'edit']);
    Route::put('updade-cupons/{id}', [CupomController::class, 'update']);
    Route::get('delete-cupons/{id}', [CupomController::class, 'destroy']);

    Route::get('orders', [OrderController::class, 'index']);
    Route::get('admin/view-order/{id}', [OrderController::class, 'view']);
    Route::put('updade-order/{id}', [OrderController::class, 'updadeOrder']);
    Route::get('order-history', [OrderController::class, 'orderHistory']);
    
    Route::get('users', [DashboardController::class, 'users']);
    Route::get('view-user/{id}', [DashboardController::class, 'viewUser']);
    

});
