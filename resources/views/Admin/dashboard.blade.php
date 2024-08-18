@extends('Admin.layout.app')
@section('title', 'Dashboard')
@section('content')
    <div class="container-fluid">
        <div class="row p-2">
            <div class="col-sm-12">
                <h3 class="page-title text-muted">
                    Dashboard
                </h3>
            </div>

        </div>
        <div class="row">

            <div class="col-lg-4 mb-3">
                <div class="card shadow d-card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-auto me-auto">
                                <h5 class="card-title">Payable</h5>
                            </div>
                            <div class="col-auto"><i class='bx bx-line-chart wallet'></i></div>
                        </div>
                        <h1 class="pkr">{{ $purchase->remaining ?? 0 }} PKR</h1>
                        <a href="{{ route('view.stock-details') }}" class="card-link nav-link">
                            <i class='bx bx-shopping-bag arrow'></i>&nbsp;Types:15 &nbsp;<i
                                class='bx bx-chevrons-right arrow'></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-3">
                <div class="card shadow d-card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-auto me-auto">
                                <h5 class="card-title">Amount receivable</h5>
                            </div>
                            <div class="col-auto"><i class='bx bx-dollar wallet'></i></div>
                        </div>
                        <h1 class="pkr">{{ $sale->remaining_recieved ?? 0 }} PKR</h1>
                        <a href="{{ route('view.amount') }}" class="card-link nav-link">
                            <i class='bx bx-group arrow'></i></i>&nbsp;Customers:19 &nbsp;<i
                                class='bx bx-chevrons-right arrow'></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-3">
                <div class="card shadow d-card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-auto me-auto">
                                <h5 class="card-title">Balance</h5>
                            </div>
                            <div class="col-auto"><i class='bx bx-wallet-alt wallet'></i></div>
                        </div>
                        <h1 class="pkr">{{ $total_balance }} PKR</h1>
                        <a href="{{ route('view.dashboard') }}" class="card-link nav-link">
                            <i class='bx bx-bar-chart-square arrow'></i>&nbsp;Sales:120 &nbsp;<i
                                class='bx bx-chevrons-right arrow'></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 mb-3">
                <div class="card shadow d-card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-auto me-auto">
                                <h5 class="card-title">Product stock</h5>
                            </div>
                            <div class="col-auto"><i class='bx bx-collection wallet'></i></div>
                        </div>
                        <h1 class="pkr"> {{ $total_product_count }}</h1>
                        <a href="{{ route('purchases.create') }}" class="card-link nav-link">
                            &nbsp;Add new product &nbsp;<i class='bx bx-chevrons-right arrow'></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-3">
                <div class="card shadow d-card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-auto me-auto">
                                <h5 class="card-title">Vendors</h5>
                            </div>
                            <div class="col-auto"><i class='bx bx-purchase-tag wallet'></i></div>
                        </div>
                        <h1 class="pkr">{{ $vendorCount ?? 0 }}</h1>
                        <a href="{{ route('vendors.create') }}" class="card-link nav-link">
                            &nbsp;Add new vendor&nbsp;<i class='bx bx-chevrons-right arrow'></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-3">
                <div class="card shadow d-card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-auto me-auto">
                                <h5 class="card-title">Customers</h5>
                            </div>
                            <div class="col-auto"><i class='bx bx-universal-access wallet'></i></div>
                        </div>
                        <h1 class="pkr">{{ $customerCount ?? 0 }}</h1>
                        <a href="{{ route('customers.create') }}" class="card-link nav-link">
                            &nbsp;Add new customer &nbsp;<i class='bx bx-chevrons-right arrow'></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid mt-5 p-5 shadow rounded-3">
        <div class="row mb-3">
            <h3>Stock details</h3>
        </div>
        <div class="row">
            <div class="col-lg-12 ">
                <table class="table table-light table-bordered">
                    <thead>
                        <tr>
                            <th>Product Image</th>
                            <th>Product</th>
                            <th>Type</th>
                            <th>Stock</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($stockProducts->isNotEmpty())
                            @foreach ($stockProducts as $product)
                                <tr>
                                    <td>Product</td>
                                    <td>{{ $product->product->name }}</td>
                                    <td>{{ $product->product->type }}</td>
                                    <td>{{ $product->quantity }}</td>
                                    <td>{{ $product->total_price }} PKR</td>
                                </tr>
                            @endforeach
                        @else
                            <p class="alert alert-info text-center">No stock found</p>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
