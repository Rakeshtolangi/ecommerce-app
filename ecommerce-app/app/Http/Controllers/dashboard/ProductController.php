<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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
                'featured_image' => 'required|image|max:2048',
                'qty' => 'required|numeric'
            ]);

            // Fix checkbox
            $data['is_featured'] = $request->has('is_featured') ? 1 : 0;

            // Handle featured image upload
            if ($request->hasFile('featured_image')) {
                $image = $request->file('featured_image');
                $imageName = time() . '_' . preg_replace('/[^a-zA-Z0-9._-]/', '_', $image->getClientOriginalName());

                $destPath = public_path('uploads/products');
                if (!File::exists($destPath)) {
                    File::makeDirectory($destPath, 0755, true);
                }

                $image->move($destPath, $imageName);
                $data['featured_image'] = $imageName;
            }

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
                'qty' => 'required|numeric',
                'featured_image' => 'nullable|image|max:2048'
            ]);

            // Fix checkbox
            $data['is_featured'] = $request->has('is_featured') ? 1 : 0;

            // Handle featured image replacement if uploaded
            if ($request->hasFile('featured_image')) {
                $product = Product::findOrFail($id);

                $image = $request->file('featured_image');
                $imageName = time() . '_' . preg_replace('/[^a-zA-Z0-9._-]/', '_', $image->getClientOriginalName());

                $destPath = public_path('uploads/products');
                if (!File::exists($destPath)) {
                    File::makeDirectory($destPath, 0755, true);
                }

                // delete old image if exists
                if (!empty($product->featured_image) && File::exists($destPath . '/' . $product->featured_image)) {
                    File::delete($destPath . '/' . $product->featured_image);
                }

                $image->move($destPath, $imageName);
                $data['featured_image'] = $imageName;
            }

            Product::where('id', $id)->update($data);

            return redirect()->route('admin.products')
                ->with('success', 'Product Updated Successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }

    public function delete($id){
        try{
            $product = Product::findOrFail($id);
            // dd($product->toArray());
            $product ->delete();
            return redirect()->route('admin.products')->with('success', 'Product Deleted Successfully');
        }catch(\Exception $e){
            return redirect()->route('admin.products')->with('error',
            'something went wrong:' . $e->getMessage());
        }
    }
}
