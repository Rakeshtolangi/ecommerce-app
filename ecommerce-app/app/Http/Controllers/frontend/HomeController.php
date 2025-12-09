<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        // $products = Product::all();
        $featuredProducts = Product::orderBy('created_at', 'desc')->where('is_featured',1)->orderBy->take(4)->get();
        //dd($products->toArray());
        return view('frontend.home.index', compact('featuredProducts'));
    }
}
