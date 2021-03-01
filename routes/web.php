<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;


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


Route::get('/admin', [AdminController::class, 'index'])
    ->name('admin')
    ->middleware('admin.check');

Route::middleware('moderator.check')->group(function (){
    Route::view('/admin/new_product', 'newProduct');
    Route::get('/admin/edit_product/{name}', [AdminController::class, 'editProduct'])
        ->name('admin.edit_product');
    Route::post('/admin/update_product', [AdminController::class, 'updateProduct'])
        ->name('admin.update_product');
    Route::get('/admin/delete_product/{productId}', [AdminController::class, 'deleteProduct'])
        ->name('admin.delete_product');

});


Route::get('/', [ProductController::class, 'getRandomProduct'])
    ->name('home_page');
Route::view("/user/contact", "user");
Route::view("/user/about", "user");
Route::view("/product/all", "product");
Route::view("/product/recent", "product");
Route::get("/user/contact", [UserController::class, "contact"]);
Route::get("/user/about", [UserController::class, "about"]);
Route::get("/product/all", [ProductController::class, "all"]);
Route::get("/product/recent", [ProductController::class, "recent"]);
Route::get("/product/{productName}", [ProductController::class, "issetProduct"]);

Route::post("/api/product/new", [ProductController::class, 'addNewProduct'])
    ->name('api.add_new_product');
Route::get('/category/add', [CategoryController::class, 'showAddCategoryForm'])
    ->name('add_category');
Route::post("/api/category/new", [CategoryController::class, 'addNewCategory'])
    ->name('api.add_new_category');
Route::get('/checkout', [ProductController::class, 'checkout'])
    ->name('checkout');
Route::post('/buy', [ProductController::class, 'buy'])
    ->name('buy');



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
