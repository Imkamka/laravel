@extends('Admin.layout.app')
@section('title', 'Customer info')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-auto me-auto mb-3">
                <h3 class="page-title">
                    Customer details
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
                        <h4 class="">{{ $customerInvoice ?? 0 }} PKR</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-3">
                <div class="card p-4 shadow rounded-3">
                    <div class="card-header">
                        <h3>Paid amount</h3>
                    </div>
                    <div class="card-body ">
                        <h4 class="">{{ $customerPaidAmount ?? 0 }} PKR</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-3">
                <div class="card p-4 shadow rounded-3">
                    <div class="card-header">
                        <h3>Balance</h3>
                    </div>
                    <div class="card-body ">
                        <h4 class="">{{ $customerBalance ?? 0 }} PKR</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm p-4">
                    <div class="card-body">
                        <h5 class="card-title mb-3"><strong>Customer informations</strong></h5>
                        <div class="d-flex">
                            <h6 class="card-subtitle mb-2 text-body-secondary ">Customer ID:&nbsp;&nbsp;</h6>
                            <h6 class="card-subtitle mb-2 text-primary">{{ $customer->id }}</h6>
                        </div>
                        <div class="d-flex">
                            <h6 class="card-subtitle mb-2 text-body-secondary ">Customer name:&nbsp;&nbsp;</h6>
                            <h6 class="card-subtitle mb-2 text-primary">{{ $customer->full_name }}</h6>
                        </div>
                        <div class="d-flex">
                            <h6 class="card-subtitle mb-2 text-body-secondary ">Email Address:&nbsp;&nbsp;</h6>
                            <h6 class="card-subtitle mb-2 text-primary ">{{ $customer->email }}</h6>
                        </div>
                        <div class="d-flex">
                            <h6 class="card-subtitle mb-2 text-body-secondary ">Phone no:&nbsp;&nbsp;</h6>
                            <h6 class="card-subtitle mb-2 text-primary">{{ $customer->phone }}</h6>
                        </div>
                        <div class="d-flex">

                            <h6 class="card-subtitle mb-2 text-body-secondary">Company name:&nbsp;&nbsp;</h6>
                            <h6 class="card-subtitle mb-2 text-primary ">{{ $customer->company }}</h6>
                        </div>
                        <div class="d-flex">
                            <h6 class="card-subtitle mb-2 text-body-secondary">NTN:&nbsp;&nbsp;</h6>
                            <h6 class="card-subtitle mb-2 text-primary">{{ $customer->ntn }}</h6>
                        </div>
                        <div class="d-flex">

                            <h6 class="card-subtitle mb-2 text-body-secondary">Status:&nbsp;&nbsp;
                            </h6>
                            <h6 class="card-subtitle mb-2 text-primary">
                                {{ $customer->is_active == 1 ? 'Active' : 'Inactive' }}</h6>
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
                <table class="table table-bordered p-4 w-100 report-table" id="customerReports"
                    customerReport-url="{{ route('customers.show', $customer) }}">
                    <thead>
                        <tr>
                            <th>Type</th>
                            <th>Date</th>
                            <th>Sale</th>
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
