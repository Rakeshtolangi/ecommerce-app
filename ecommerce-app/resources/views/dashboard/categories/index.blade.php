@extends('dashboard.layouts.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between">
        <h3>Product Categories</h3>
        <a href="{{ route('categories.create') }}" class="btn btn-primary">Add New Category</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success mt-3">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped mt-3">
        <thead>
            <tr>
                <th>S.N.</th>
                <th>Title</th>
                <th>Image</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach($categories as $cat)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $cat->title }}</td>
                    <td>
                        @if($cat->image)
                            <img src="{{ asset('uploads/categories/'.$cat->image) }}" width="60">
                        @else
                            No Image
                        @endif
                    </td>
                    <td>
                        <span class="badge bg-{{ $cat->status ? 'success' : 'danger' }}">
                            {{ $cat->status ? 'Active' : 'Inactive' }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('categories.edit', $cat->id) }}" class="btn btn-sm btn-warning">Edit</a>

                        <form action="{{ route('categories.destroy', $cat->id) }}"
                              method="POST" class="d-inline-block">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>
</div>
@endsection
