@extends('Admin.layout.app')
@section('title', 'Customers')

@section('content')
    <div class="container-fluid p-3 products">
        <div class="row mb-3">
            <div class="col-auto me-auto">
                <h1 class="">Customers</h1>
            </div>
            <div class="col-auto">
                <a href="{{ route('customers.create') }}" class="btn btn-primary product-btn btn-sm"><i
                        class='bx bx-plus-circle'></i>&nbsp;Add new</a>
            </div>
        </div>

        <div class="row shadow-lg rounded-3 p-5">
            <div class="col-lg-10 m-auto">
                <table class="table table-bordered p-4 w-100 customer-table" id="customers"
                    customer-url="{{ route('customers.index') }}">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Company</th>
                            <th>Address</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
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
