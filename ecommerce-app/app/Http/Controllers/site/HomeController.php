<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function welcome(){
        return view('home');
    }

    public function home(){
        $categories = ProductCategory::where('status', true)->get();
        $products = Product::where('status', true)->get();
        return view('frontend.home.home', compact('categories', 'products'));
    }
}
