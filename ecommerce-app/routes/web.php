<?php

use App\Http\Controllers\auth\AuthenticationController;
use App\Http\Controllers\dashboard\CategoryController;
use App\Http\Controllers\dashboard\DashboardController;
use App\Http\Controllers\dashboard\ProductController;
use App\Http\Controllers\site\AboutController;
use App\Http\Controllers\site\HomeController;
use Illuminate\Support\Facades\Route;


// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/about', function(){
//     return '<h1>Hello from /about route using function call </h1>';
// });

// Auth routes goes here
Route::get('/', [AuthenticationController::class,'ShowLogin']) ->name('ShowLogin');
Route::post('/login',[AuthenticationController::class,'login'])->name('login');
Route::get('/forget-password', [AuthenticationController::class,'ShowForgetPassword']) ->name('forget-password');


//web routes goes here
// Route::get('/', [HomeController::class, 'welcome']);

Route::get('/about', [AboutController::class,'index']) ->name('about');

// Dashboard routes goes here
Route::get('/admin', [DashboardController::class,'home'])->name('admin.home');

// Product routes goes here
Route::get('/admin/products', [ProductController::class,'index'])
 ->name('admin.products');


Route::get('/admin/create-product', [ProductController::class,'create'])
 ->name('create.product');

Route::POST('product/store',[ProductController::class,'store'])->name('product.store');
Route::get('/product/{id}/edit', [ProductController::class,'edit'])-> name('product.edit');
Route::POST('/products/{id}/update',[ProductController::class,'update'])->name('product.update');
Route::delete('/products/{id}/delete',[ProductController::class,'delete'])->name('product.delete');


//product category route
Route::get('admin/product-categories',[
    CategoryController::class,'index'
])->name('category.show');

Route::resource('categories', CategoryController::class);
