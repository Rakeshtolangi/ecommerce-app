@extends('dashboard.layouts.app')

@section('content')
<div class="container mt-4">
    <h3>Edit Category</h3>

    <form action="{{ route('categories.update', $category->id) }}"
          method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" class="form-control"
                   value="{{ $category->title }}" required>
        </div>

        <div class="mb-3">
            <label>Image</label><br>
            @if($category->image)
                <img src="{{ asset('uploads/categories/'.$category->image) }}" width="80" class="mb-2">
            @endif
            <input type="file" name="image" class="form-control">
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="1" @if($category->status) selected @endif>Active</option>
                <option value="0" @if(!$category->status) selected @endif>Inactive</option>
            </select>
        </div>

        <button class="btn btn-primary">Update Category</button>
    </form>
</div>
@endsection
