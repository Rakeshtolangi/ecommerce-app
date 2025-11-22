<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = ProductCategory::latest()->get();
        return view('dashboard.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('dashboard.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'nullable|image',
            'status' => 'required'
        ]);

        $imageName = null;

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/categories'), $imageName);
        }

        ProductCategory::create([
            'title' => $request->title,
            'image' => $imageName,
            'status' => $request->status,
        ]);

        return redirect()->route('categories.index')->with('success','Category Created Successfully');
    }

    public function edit($id)
    {
        $category = ProductCategory::findOrFail($id);
        return view('dashboard.categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = ProductCategory::findOrFail($id);

        $request->validate([
            'title' => 'required',
            'image' => 'nullable|image',
            'status' => 'required'
        ]);

        $imageName = $category->image;

        if ($request->hasFile('image')) {
            // delete old image
            if ($imageName && File::exists(public_path('uploads/categories/'.$imageName))) {
                File::delete(public_path('uploads/categories/'.$imageName));
            }

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/categories'), $imageName);
        }

        $category->update([
            'title' => $request->title,
            'image' => $imageName,
            'status' => $request->status,
        ]);

        return redirect()->route('categories.index')->with('success','Category Updated Successfully');
    }

    public function destroy($id)
    {
        $category = ProductCategory::findOrFail($id);

        if ($category->image && File::exists(public_path('uploads/categories/'.$category->image))) {
            File::delete(public_path('uploads/categories/'.$category->image));
        }

        $category->delete();

        return redirect()->route('categories.index')->with('success','Category Deleted Successfully');
    }
}
