@extends('dashboard.layouts.app')
@section('title','Product - Ecommerce Dashboard')

<style>
    .file-uploader {
        background-color: #dbefe9;
        border-radius: 3px;
        color: #242424;
    }

    .file-uploader__message-area {
        font-size: 18px;
        padding: 1em;
        text-align: left;
        color: #377a65;
    }

    .file-list {
        background-color: #fff;
        font-size: 16px;
    }

    .file-list__name {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .file-list li {
        height: 50px;
        line-height: 50px;
        margin-left: 0.5em;
        border: none;
        overflow: hidden;
    }

    .removal-button {
        width: 20%;
        border: none;
        background-color: #d65d38;
        color: white;
    }

    .removal-button::before {
        content: "X";
    }

    .removal-button:focus {
        outline: 0;
    }

    .file-chooser {
        padding: 1em;
        transition: background-color 1s, height 1s;
    }

    .file-chooser p {
        font-size: 18px;
        padding-top: 1em;
    }

    .file-uploader {
        max-width: 400px;
        height: auto;
        margin: 2em auto;
    }

    .file-uploader * {
        display: block;
    }

    .file-uploader input[type="submit"] {
        margin-top: 2em;
        float: right;
    }

    .file-list {
        margin: 0 auto;
        max-width: 90%;
    }

    .file-list__name {
        max-width: 70%;
        float: left;
    }

    .removal-button {
        display: inline-block;
        height: 100%;
        float: right;
    }

    .file-chooser {
        width: 90%;
        margin: 0.5em auto;
    }

    .file-chooser__input {
        margin: 0 auto;
    }

    .file-uploader__submit-button {
        width: 100%;
        border: none;
        font-size: 1.5em;
        padding: 1em;
        background-color: #0d6efd;
        color: white;
    }

    .file-uploader__submit-button:hover {
        background-color: #0249b1;
    }

    .file-list li:after,
    .file-uploader:after {
        content: "";
        display: table;
        clear: both;
    }

    .hidden {
        display: none;
    }

    .hidden input {
        display: none;
    }

    .error {
        background-color: #d65d38;
        color: white;
    }

    *,
    *::before,
    *::after {
        box-sizing: border-box;
    }

    ul,
    li {
        margin: 0;
        padding: 0;
    }
</style>
@section('content')
    <div class="container">

        <div class="page-inner">
            <div class="page-header d-flex justify-content-between ">
                <h3 class="fw-bold mb-0">Manage category</h3>
                <a href="{{ route('category.show') }}" class="btn btn-primary">
                    <i class="bi bi-plus-circle me-1"></i> Product Category
                </a>
                <a href="{{ route('create.product') }}" class="btn btn-primary">
                    <i class="bi bi-plus-circle me-1"></i> Add Product
                </a>
            </div>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Product Lists</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">

                            <table id="student-datatables" class="datatables display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>S.N.</th>
                                        <th>Product</th>
                                        <th>Category</th>
                                        <th> Price</th>
                                        <th> Sale Price</th>
                                        <th>Stock</th>
                                        <th>Is Featured</th>
                                        <th>Status</th>
                                        <th class="no-sorting">Actions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($products as $product)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $product->name }}</td>
                                            <td>{{ $product->category->title }}</td>
                                            <td>{{ $product->price }}</td>
                                            <td>{{ $product->sale_price }}</td>
                                            <td>{{ $product->qty }}</td>
                                            <td>
                                                @if ($product->is_featured == 1)
                                                    <span>Yes</span>
                                                @else
                                                    <span>No</span>
                                                @endif
                                            </td>
                                            <td>
                                                <span></span>
                                                {{ $product->status == 1 ? 'Active' : 'Inactive' }}
                                            </td>

                                            <td>
                                                <a href="#" class="btn btn-primary ">View</a>
                                                <a href="{{ route('product.edit', $product->id) }}"
                                                    class="btn btn-warning">Edit</a>
                                                <form action="{{ route('product.delete', $product->id) }}" method="POST"
                                                    style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger"
                                                        onclick="return confirm('Are you sure you want to delete this product?')">
                                                        Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function(e) {
        $(document).on('click', '.uploadDocuments', function(e) {
            var id = $(this).attr('id');
            $('.studentId').val(id);
        });
    })
</script>
