@extends('Admin.layout.app')
@section('title', 'Payment info')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-auto me-auto mb-3">
                <h3 class="page-title">
                    Purchase payment details
                </h3>
            </div>

        </div>
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm p-4">
                    <div class="card-body">
                        <h5 class="card-title mb-3"><strong>Payment informations</strong></h5>
                        <div class="d-flex">
                            <h6 class="card-subtitle mb-2 text-body-secondary ">Payment ID:&nbsp;&nbsp;</h6>
                            <h6 class="card-subtitle mb-2 text-primary">{{ $purchasePayment->id }}</h6>
                        </div>
                        <div class="d-flex">
                            <h6 class="card-subtitle mb-2 text-body-secondary ">Vendor:&nbsp;&nbsp;</h6>
                            <h6 class="card-subtitle mb-2 text-primary">{{ $purchasePayment->vendor->company }}</h6>
                        </div>
                        <div class="d-flex">
                            <h6 class="card-subtitle mb-2 text-body-secondary ">Total amount:&nbsp;&nbsp;</h6>
                            <h6 class="card-subtitle mb-2 text-primary ">{{ $purchasePayment->amount }}</h6>
                        </div>
                        <div class="d-flex">
                            <h6 class="card-subtitle mb-2 text-body-secondary ">Description:&nbsp;&nbsp;</h6>
                            <h6 class="card-subtitle mb-2 text-primary ">{{ $purchasePayment->description }}</h6>
                        </div>
                        <div class="d-flex">

                            <h6 class="card-subtitle mb-2 text-body-secondary">Status:&nbsp;&nbsp;</h6>
                            <h6 class="card-subtitle mb-2 text-primary ">
                                {{ $purchasePayment->is_active == 1 ? 'Active' : 'Inactive' }}</h6>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
