@extends('dashboard.layouts.app')

@section('content')
<div class="container mt-4">
    <h3>Create Category</h3>

    <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Image</label>
            <input type="file" name="image" class="form-control">
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="1" selected>Active</option>
                <option value="0">Inactive</option>
            </select>
        </div>

        <button class="btn btn-success">Save Category</button>
    </form>
</div>
@endsection
