@extends('Admin.layout.app')
@section('title', 'Sale info')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-auto me-auto mb-3">
                <h3 class="page-title">
                    Sale details
                </h3>
            </div>

        </div>
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm p-4">
                    <div class="card-body">
                        <h5 class="card-title mb-3"><strong>Sale informations</strong></h5>
                        <div class="d-flex">
                            <h6 class="card-subtitle mb-2 text-body-secondary ">Sale ID:&nbsp;&nbsp;</h6>
                            <h6 class="card-subtitle mb-2 text-primary">{{ $sale->id }}</h6>
                        </div>
                        <div class="d-flex">
                            <h6 class="card-subtitle mb-2 text-body-secondary ">Company:&nbsp;&nbsp;</h6>
                            <h6 class="card-subtitle mb-2 text-primary">{{ $sale->customer->company }}</h6>
                        </div>
                        <div class="d-flex">
                            <h6 class="card-subtitle mb-2 text-body-secondary ">Total price:&nbsp;&nbsp;</h6>
                            <h6 class="card-subtitle mb-2 text-primary ">{{ $sale->total_price }}</h6>
                        </div>

                        <div class="d-flex">

                            <h6 class="card-subtitle mb-2 text-body-secondary">Status:&nbsp;&nbsp;</h6>
                            <h6 class="card-subtitle mb-2 text-primary ">
                                {{ $sale->is_active == 1 ? 'Active' : 'Inactive' }}</h6>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
