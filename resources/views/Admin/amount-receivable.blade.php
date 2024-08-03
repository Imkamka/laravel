@extends('Admin.layout.app')
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
            <div class="col-lg-4 mb-3">
                <div class="card shadow d-card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-auto me-auto">
                                <h5 class="card-title">Balance</h5>
                            </div>
                            <div class="col-auto"><i class='bx bx-wallet-alt wallet'></i></div>
                        </div>
                        <h1 class="pkr">45,00,75 PKR</h1>
                        <a href="{{ route('view.dashboard') }}" class="card-link nav-link">
                            <i class='bx bx-bar-chart-square arrow'></i>&nbsp;Sales:120 &nbsp;<i
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
                                <h5 class="card-title">Available Stock</h5>
                            </div>
                            <div class="col-auto"><i class='bx bx-line-chart wallet'></i></div>
                        </div>
                        <h1 class="pkr">15,400</h1>
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
                        <h1 class="pkr">7,50,000 PKR</h1>
                        <a href="{{ route('view.amount') }}" class="card-link nav-link">
                            <i class='bx bx-group arrow'></i></i>&nbsp;Customers:19 &nbsp;<i
                                class='bx bx-chevrons-right arrow'></i>
                        </a>
                    </div>
                </div>
            </div>

        </div>
        {{-- Sales tables layout  --}}
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive shadow">
                    <div class="row p-2 stock-detail">
                        <div class="col-auto me-auto mb-3">
                            <h3 class="page-title">
                                Amount receivable
                            </h3>
                        </div>

                    </div>
                    <table class="table table-responsive table-responsive-xl w-100">
                        <thead>
                            <tr>
                                <th scope="col" width="2%">Customer</th>
                                <th scope="col" width="2%">Phone no.</th>
                                <th scope="col" width="2%">Amount</th>
                                <th scope="col" width="2%">Payment</th>
                                <th scope="col" width="2%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for ($i = 0; $i <= 7; $i++)
                                <tr>
                                    <td>Moin Khan</td>
                                    <td><span>+92 3706767071</span></td>

                                    <td>2600.00 PKR</td>
                                    <td class="text-danger">Later on</td>
                                    <td>
                                        <button class="btn btn-outline-primary btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#amount-details">View more</button>
                                    </td>

                                </tr>
                            @endfor

                        </tbody>

                    </table>

                </div>
            </div>
        </div>
    </div>
    @include('Admin.receivable-details')
@endsection
