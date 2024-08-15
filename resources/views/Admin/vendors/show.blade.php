@extends('Admin.layout.app')
@section('title', 'Vendor info')
@section('content')
    <div class="container-fluid shadow p-5 rounded-4">
        <div class="row">
            <div class="col-auto me-auto mb-3">
                <h3 class="page-title">
                    Vendor details
                </h3>
            </div>

        </div>
        <div class="row">
            <div class="col-lg-4 mb-3">
                <div class="card p-4 shadow rounded-3">
                    <div class="card-header">
                        <h3>Invoice</h3>
                    </div>
                    <div class="card-body ">
                        <h4 class="">{{ $vendorInvoice ?? 0 }} PKR</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-3">
                <div class="card p-4 shadow rounded-3">
                    <div class="card-header">
                        <h3>Paid amount</h3>
                    </div>
                    <div class="card-body ">
                        <h4 class="">{{ $vendorPaidAmount ?? 0 }} PKR</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-3">
                <div class="card p-4 shadow rounded-3">
                    <div class="card-header">
                        <h3>Balance</h3>
                    </div>
                    <div class="card-body ">
                        <h4 class="">{{ $vendorBalance ?? 0 }} PKR</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card p-4">
                    <div class="card-body">
                        <h5 class="card-title mb-3"><strong>Vendor informations</strong></h5>
                        <div class="d-flex">
                            <h6 class="card-subtitle mb-2 text-body-secondary ">Vendor ID:&nbsp;&nbsp;</h6>
                            <h6 class="card-subtitle mb-2 text-primary">{{ $vendor->id }}</h6>
                        </div>
                        <div class="d-flex">
                            <h6 class="card-subtitle mb-2 text-body-secondary ">Vendor name:&nbsp;&nbsp;</h6>
                            <h6 class="card-subtitle mb-2 text-primary">{{ $vendor->full_name }}</h6>
                        </div>
                        <div class="d-flex">
                            <h6 class="card-subtitle mb-2 text-body-secondary ">Email Address:&nbsp;&nbsp;</h6>
                            <h6 class="card-subtitle mb-2 text-primary ">{{ $vendor->email }}</h6>
                        </div>
                        <div class="d-flex">
                            <h6 class="card-subtitle mb-2 text-body-secondary ">Phone no:&nbsp;&nbsp;</h6>
                            <h6 class="card-subtitle mb-2 text-primary">{{ $vendor->phone }}</h6>
                        </div>
                        <div class="d-flex">

                            <h6 class="card-subtitle mb-2 text-body-secondary">Company name:&nbsp;&nbsp;</h6>
                            <h6 class="card-subtitle mb-2 text-primary ">{{ $vendor->company }}</h6>
                        </div>
                        <div class="d-flex">
                            <h6 class="card-subtitle mb-2 text-body-secondary">NTN:&nbsp;&nbsp;</h6>
                            <h6 class="card-subtitle mb-2 text-primary">{{ $vendor->ntn }}</h6>
                        </div>
                        <div class="d-flex">

                            <h6 class="card-subtitle mb-2 text-body-secondary">Status:&nbsp;&nbsp;
                            </h6>
                            <h6 class="card-subtitle mb-2 text-primary">
                                {{ $vendor->is_active == 1 ? 'Active' : 'Inactive' }}</h6>
                        </div>
                        <div class="d-flex">

                            <h6 class="card-subtitle mb-2 text-body-secondary">Time:&nbsp;&nbsp;
                            </h6>
                            <h6 class="card-subtitle mb-2 text-primary">
                                {{ $vendor->created_at }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mt-4">
                <h3>Reports</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <table class="table table-bordered p-4 w-100 report-table" id="vendorReports"
                    vendorReport-url="{{ route('vendors.show', $vendor) }}">
                    <thead>
                        <tr>
                            <th>Type</th>
                            <th>Date</th>
                            <th>Purchase</th>
                            <th>Payment</th>
                            <th>Balance</th>
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
        <div class="row">
            <div class="col-12 mt-4 text-end">
                <a href="{{ url()->previous() }}" class="btn btn-primary"><i class="bx bx-arrow-back"></i></a>
            </div>
        </div>
    </div>
@endsection
