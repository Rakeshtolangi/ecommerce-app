<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->get();
        return view('dashboard.product.products', compact('products'));
    }

    public function create()
    {
        $categories = ProductCategory::all();
        return view('dashboard.product.create-product', compact('categories'));
    }

    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'name' => 'required|string|max:255',
                'category_id' => 'required|integer',
                'description' => 'nullable|string',
                'is_featured' => 'nullable',
                'price' => 'required|numeric',
                'sale_price' => 'nullable|numeric',
                'qty' => 'required|numeric'
            ]);

            // Fix checkbox
            $data['is_featured'] = $request->has('is_featured') ? 1 : 0;

            Product::create($data);

            return redirect()->route('admin.products')->with('success', 'Product Created Successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $categories = ProductCategory::all();
        $product = Product::findOrFail($id);

        return view('dashboard.product.edit-product', compact('categories', 'product'));
    }

    public function update(Request $request, $id)
    {
        try {
            $data = $request->validate([
                'name' => 'required|string|max:255',
                'category_id' => 'required|integer',
                'description' => 'nullable|string',
                'is_featured' => 'nullable',
                'price' => 'required|numeric',
                'sale_price' => 'nullable|numeric',
                'qty' => 'required|numeric'
            ]);

            // Fix checkbox
            $data['is_featured'] = $request->has('is_featured') ? 1 : 0;

            Product::where('id', $id)->update($data);

            return redirect()->route('admin.products')
                ->with('success', 'Product Updated Successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }
}
