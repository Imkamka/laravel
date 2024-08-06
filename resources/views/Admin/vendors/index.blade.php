@extends('Admin.layout.app')

@section('content')
    <div class="container-fluid p-3 products">
        <div class="row mb-3">
            <div class="col-auto me-auto">
                <h1 class="">Vendor</h1>
            </div>
            <div class="col-auto">
                <a href="{{ route('vendors.create') }}" class="btn btn-primary product-btn btn-sm"><i
                        class='bx bx-plus-circle'></i>&nbsp;Add new</a>
            </div>
        </div>
        <div class="row">
            @if (session('success'))
                <div class="alert alert-success shadow ">
                    {{ session('success') }}
                </div>
            @endif
        </div>
        <div class="row">
            <div class="col-lg-10 m-auto">
                <table class="table table-bordered p-4 w-100 vendor-table" id="vendors"
                    vendor-url="{{ route('vendors.index') }}">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email Address</th>
                            <th>Phone no.</th>
                            <th>Address</th>
                            <th>Company</th>
                            <th>NTN</th>
                            <th>Status</th>
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
