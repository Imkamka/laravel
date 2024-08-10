@extends('Admin.layout.app')
@section('title', 'Products List')
@section('content')
    <div class="container-fluid p-3 products">
        <div class="row mb-3">
            <div class="col-auto me-auto">
                <h1 class="">Products Stock</h1>
            </div>
            <div class="col-auto">
                <a href="{{ route('products.create') }}" class="btn btn-primary product-btn btn-sm"><i
                        class='bx bx-plus-circle'></i>&nbsp;Add new</a>
            </div>
        </div>

        <div class="row p-5 shadow-lg rounded-3">
            <div class="col-lg-10 m-auto">
                <table class="table table-bordered p-4 w-100 product-table" id="products"
                    data-url="{{ route('products.index') }}">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Product name</th>
                            <th>Description</th>
                            <th>Type</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
