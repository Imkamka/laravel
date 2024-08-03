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
                        <a href="#" class="card-link nav-link">
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
                        <a href="#" class="card-link nav-link">
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
                        <h1 class="pkr">15,400</h1>
                        <a href="#" class="card-link nav-link">
                            <i class='bx bx-group arrow'></i></i>&nbsp;Customers:19 &nbsp;<i
                                class='bx bx-chevrons-right arrow'></i>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
