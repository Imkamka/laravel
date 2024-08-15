@extends('Admin.layout.app')
@section('title', 'Report')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 mt-4">
                <h3>Payment Report</h3>
            </div>
        </div>


        <div class="row p-5 shadow-lg rounded-4 mt-2">
            <form class="searchFormReport">
                <div class="row">
                    <div class="col-lg-5 mb-3">
                        <input type="date" class="form-control w-100" name="start_date"
                            value="{{ request()->get('start_date') }}">
                    </div>
                    <div class="col-lg-5 mb-3">
                        <input type="date" class="form-control w-100" name="end_date"
                            value="{{ request()->get('end_date') }}">
                    </div>
                    <div class="col-lg-2 mb-3">
                        <button class="btn btn-primary btn-block w-100">Search</button>
                    </div>
                </div>
            </form>
            <hr>
            <div class="col-lg-12">
                <table class="table table-bordered p-4 w-100 report-table" id="paymentReportTable"
                    report-url="{{ route('payments.report') }}">
                    <thead class="text-center">
                        <tr>
                            <th>ID</th>
                            <th>Type</th>
                            <th>Date</th>
                            <th>Amount</th>
                            <th>Balance</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
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
    </div>
@endsection
