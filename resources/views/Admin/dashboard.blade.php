@extends('Admin.layout.app')
@section('title', 'Dashboard')
@section('content')
    <div class="container-fluid">
        <div class="row p-2">
            <div class="col-sm-12">
                <h3 class="page-title">
                    Dashboard
                </h3>
            </div>

        </div>
        <div class="row">
            <div class="col-lg-3 mb-3">
                <div class="card shadow d-card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-auto me-auto">
                                <h5 class="card-title">Balance</h5>
                            </div>
                            <div class="col-auto"><i class='bx bx-wallet-alt wallet'></i></div>
                        </div>
                        <h1 class="pkr">{{ $sale->total_recieved }} PKR</h1>
                        <a href="{{ route('view.dashboard') }}" class="card-link nav-link">
                            <i class='bx bx-bar-chart-square arrow'></i>&nbsp;Sales:120 &nbsp;<i
                                class='bx bx-chevrons-right arrow'></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 mb-3">
                <div class="card shadow d-card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-auto me-auto">
                                <h5 class="card-title">Payable</h5>
                            </div>
                            <div class="col-auto"><i class='bx bx-line-chart wallet'></i></div>
                        </div>
                        <h1 class="pkr">{{ $purchase->remaining }} PKR</h1>
                        <a href="{{ route('view.stock-details') }}" class="card-link nav-link">
                            <i class='bx bx-shopping-bag arrow'></i>&nbsp;Types:15 &nbsp;<i
                                class='bx bx-chevrons-right arrow'></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 mb-3">
                <div class="card shadow d-card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-auto me-auto">
                                <h5 class="card-title">Amount receivable</h5>
                            </div>
                            <div class="col-auto"><i class='bx bx-dollar wallet'></i></div>
                        </div>
                        <h1 class="pkr">{{ $sale->remaining_recieved }} PKR</h1>
                        <a href="{{ route('view.amount') }}" class="card-link nav-link">
                            <i class='bx bx-group arrow'></i></i>&nbsp;Customers:19 &nbsp;<i
                                class='bx bx-chevrons-right arrow'></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 mb-3">
                <div class="card shadow d-card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-auto me-auto">
                                <h5 class="card-title">Product stock</h5>
                            </div>
                            <div class="col-auto"><i class='bx bx-collection wallet'></i></div>
                        </div>
                        <h1 class="pkr"> {{ $productCount }}</h1>
                        <a href="{{ route('view.amount') }}" class="card-link nav-link">
                            <i class='bx bxl-product-hunt arrow'></i>&nbsp;Pending:19 &nbsp;<i
                                class='bx bx-chevrons-right arrow'></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="container-fluid mt-5 p-5 shadow-lg rounded-3">
        <div class="row mb-3">
            <h3>Product Stock</h3>
        </div>
        <div class="row">
            <div class="col-lg-12 ">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Items</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Product 1</td>
                            <td>3</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div> --}}
@endsection
