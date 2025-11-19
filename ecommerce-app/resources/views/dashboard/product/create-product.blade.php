@extends('dashboard.layouts.app')

@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
                <div>
                    <h3 class="fw-bold mb-3">PRODUCT</h3>
                </div>
                <div class="ms-md-auto py-2 py-md-0">
                    <a href="#" class="btn btn-label-info btn-round me-2">Manage Product</a>
                    <a href="#" class="btn btn-primary btn-round">Add Product</a>
                </div>

            </div>
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">


                <div class="card shadow-sm">
                    @if (@session('success'))
                        <div class="alert alert-success">

                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif


                    <div class="card-body">
                        <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-4 border rounded p-3">
                                <h5 class="bg-primary text-white p-2 rounded">Product Information</h5>

                                <div class="mb-3">
                                    <label class="form-label">Product Name</label>
                                    <input type="text" name="name" class="form-control"
                                        placeholder="Enter product name">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Category</label>
                                    <select name="category_id" class="form-select">
                                        <option value="">Select category</option>
                                        {{-- Example dynamic categories --}}
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">
                                                {{ $category->title }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Description</label>
                                    <textarea name="description" class="form-control" rows="3" placeholder="Enter product description"></textarea>
                                </div>

                                <div class="form-check">
                                    <input type="hidden" name="is_featured" value="0">
                                    <input type="checkbox" class="form-check-input" name="is_featured" id="is_featured"
                                        value="1">
                                    <label class="form-check-label" for="is_featured">Featured Product</label>
                                </div>
                            </div>

                            {{-- =========================
                     Pricing & Inventory
                ========================== --}}
                            <div class="mb-4 border rounded p-3">
                                <h5 class="bg-primary text-white p-2 rounded">Pricing & Inventory</h5>

                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label">Price ($)</label>
                                        <input type="number" step="0.01" name="price" class="form-control"
                                            value="0.00">
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label class="form-label">Sale Price ($) (Optional)</label>
                                        <input type="number" step="0.01" name="sale_price" class="form-control"
                                            value="0.00">
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label class="form-label">Quantity in Stock</label>
                                        <input type="number" name="qty" class="form-control" value="0">
                                    </div>

                                    {{-- <div class="col-md-3 mb-3">
                                        <label class="form-label">SKU</label>
                                        <input type="text" name="sku" class="form-control" placeholder="Enter SKU">
                                    </div> --}}
                                </div>
                            </div>

                            {{-- =========================
                     Media
                ========================== --}}
                            <div class="mb-4 border rounded p-3">
                                <h5 class="bg-primary text-white p-2 rounded">Media</h5>

                                <div class="mb-3">
                                    <label class="form-label">Product Image</label>
                                    <input type="file" name="featured_image" class="form-control">
                                    <small class="text-muted">Preview:</small>
                                    <div class="border p-3 text-center text-muted">No image selected</div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Additional Images (Optional)</label>
                                    <input type="file" name="additional_images[]" class="form-control" multiple>
                                    <small class="text-muted">You can select multiple images for the product
                                        gallery</small>
                                </div>
                            </div>

                            {{-- =========================
                     Buttons
                ========================== --}}
                            <div class="text-end">
                                <button type="reset" class="btn btn-secondary">Clear</button>
                                <button type="submit" class="btn btn-primary">Add Product</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    </div>
@endsection
