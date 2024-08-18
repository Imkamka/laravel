@extends('Admin.layout.app')
@section('title', 'Purchases')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-auto me-auto mb-3">
                <h3 class="page-title">
                    Purchases
                </h3>
            </div>
            <div class="col-auto mb-4">
                <a href="{{ route('purchases.create') }}" class="btn btn-primary btn-sm active"><i
                        class='bx bx-plus-circle'></i>&nbsp;Add
                    new</a>
            </div>
        </div>
        <div class="row shadow-lg p-5 rounded-4">
            <div class="col-lg-10 m-auto">
                <table class="table table-bordered p-4 w-100 purchase-table" id="purchases"
                    purchase-url="{{ route('purchases.index') }}">
                    <thead>
                        <tr>
                            <td>ID</td>
                            <th>Vendor</th>
                            <th>Total price</th>
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
