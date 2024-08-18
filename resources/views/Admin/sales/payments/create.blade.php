@extends('Admin.layout.app')
@section('title', 'Create sale payment')
@section('content')
    <div class="row p-3">
        <h3>Sale Payment</h3>
    </div>
    <div class="container product-details shadow-lg rounded-3 p-5">
        <h4 class="product-header p-5 text-center">Add payment details</h4>
        <form action="{{ route('sale-payments.store') }}" method="POST">
            @method('post')
            @csrf
            <div class="row w-100">
                <form class="row g-3">
                    <div class="col-md-6 mb-3">
                        <label for="inputType" class="form-label">Customer vendor</label>
                        <select id="inputState"
                            class="form-select @error('customer_id')
                            is-invalid
                        @enderror"
                            name="customer_id">
                            <option selected disabled>Select Customer</option>
                            @foreach ($customers as $customer)
                                <option value="{{ $customer->id }}"> {{ $customer->company }} </option>
                            @endforeach

                        </select>
                        @error('customer_id')
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="amount" class="form-label">Amount</label>
                        <input type="number"
                            class="form-control @error('amount')
                            is-invalid
                        @enderror"
                            id="amount" name="amount" placeholder="Enter amount" value="{{ old('amount') }}">
                        @error('amount')
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="inputDescription4" class="form-label">Description</label>
                        <textarea type="Description"
                            class="form-control @error('description')
                            is-invalid
                        @enderror"
                            name="description" id="inputDescription4" placeholder="Enter description">{{ old('description') }}</textarea>
                        @error('description')
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>


                    <div class="col-12 mb-3">
                        <button type="submit" class="btn btn-primary">Proceed</button>
                    </div>
                </form>
            </div>

        </form>
    </div>
@endsection
