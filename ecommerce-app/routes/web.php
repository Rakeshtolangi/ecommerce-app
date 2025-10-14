<?php

use App\Http\Controllers\dashboard\DashboardController;
use App\Http\Controllers\site\AboutController;
use App\Http\Controllers\site\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/about', function(){
//     return '<h1>Hello from /about route using function call </h1>';
// });


//web routes goes here
Route::get('/', [HomeController::class, 'welcome']);

Route::get('/about', [AboutController::class,'index']) ->name('about');

// Dashboard routes goes here
Route::get('/admin', [DashboardController::class,'home'])->name('admin.home');

// Product routes goes here
Route::get('/admin/product', function(){
    return view('dashboard.product.products');
}) ->name('admin.products');
