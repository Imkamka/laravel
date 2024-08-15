@extends('Admin.layout.app')
@section('title', 'Expense Info')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-auto me-auto mb-3">
                <h3 class="page-title">
                    Expenses details
                </h3>
            </div>

        </div>
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm p-4">
                    <div class="card-body">
                        <h5 class="card-title mb-3"><strong>Expenses informations</strong></h5>
                        <div class="d-flex">
                            <h6 class="card-subtitle mb-2 text-body-secondary ">Expense ID:&nbsp;&nbsp;</h6>
                            <h6 class="card-subtitle mb-2 text-primary">{{ $expense->id }}</h6>
                        </div>
                        <div class="d-flex">
                            <h6 class="card-subtitle mb-2 text-body-secondary ">Expense amount:&nbsp;&nbsp;</h6>
                            <h6 class="card-subtitle mb-2 text-primary">{{ $expense->amount }}</h6>
                        </div>
                        <div class="d-flex">
                            <h6 class="card-subtitle mb-2 text-body-secondary ">Expense description:&nbsp;&nbsp;</h6>
                            <h6 class="card-subtitle mb-2 text-primary ">{{ $expense->description }}</h6>
                        </div>

                        <div class="d-flex">
                            <h6 class="card-subtitle mb-2 text-body-secondary">Status:&nbsp;&nbsp;</h6>
                            <h6 class="card-subtitle mb-2 text-primary ">
                                {{ $expense->is_active == 1 ? 'Active' : 'Inactive' }}</h6>
                        </div>
                        <div class="d-flex">
                            <h6 class="card-subtitle mb-2 text-body-secondary">Time:&nbsp;&nbsp;</h6>
                            <h6 class="card-subtitle mb-2 text-primary ">
                                {{ \Carbon\Carbon::parse($expense->created_at)->format('d M,Y') }}</h6>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
