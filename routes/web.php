<?php

use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CupomController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Frontend\CarrinhoController;
use App\Http\Controllers\Frontend\FrontendController;

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
Route::get('profile', [FrontendController::class, 'profile']);
Route::get('edit-profile', [FrontendController::class, 'editprofile']);
Route::put('update-profile', [FrontendController::class, 'updateprofile']);
Route::get('category', [FrontendController::class, 'category']);
Route::get('view-category/{slug}', [FrontendController::class, 'viewcategory']);
Route::get('category/{cate_slug}/{prod_slug}', [FrontendController::class, 'productview']);

Route::middleware(['auth'])->group(function (){
    Route::get('cart', [CarrinhoController::class, 'index']);
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

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
    
});
