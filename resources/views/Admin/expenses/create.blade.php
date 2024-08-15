@extends('Admin.layout.app')
@section('title', 'Create Expense')
@section('content')
    <div class="row p-3">
        <h3>Expense/<small class="text-muted">add new</small></h3>
    </div>
    <div class="container product-details p-5 shadow-lg rounded-3">
        <h4 class="product-header p-5 text-center">Add expense details</h4>
        <form action="{{ route('expenses.store') }}" method="POST">
            @method('post')
            @csrf
            <div class="row w-100">
                <form class="row g-3 ">
                    <div class="col-md-7 mb-3">
                        <label for="amount" class="form-label">Amount</label>
                        <input type="number"
                            class="form-control @error('amount')
                            is-invalid
                        @enderror"
                            id="amount" name="amount" placeholder="Enter amount">
                        @error('name')
                            {{ $message }}
                        @enderror
                    </div>
                    <div class="col-md-7 mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea
                            class="form-control @error('description')
                            is-invalid
                        @enderror"
                            name="description" id="inputDescription4" placeholder="Enter description"></textarea>
                        @error('description')
                            {{ $message }}
                        @enderror
                    </div>
                    <div class="col-12 mb-3">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>

        </form>
    </div>
@endsection
