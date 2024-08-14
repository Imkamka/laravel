@extends('Admin.layout.app')
@section('title', 'Create Payment')
@section('content')
    <div class="row p-3">
        <h3>Purchases Payment</h3>
    </div>
    <div class="container product-details shadow-lg rounded-3 p-5">
        <h4 class="product-header p-5 text-center">Add payment details</h4>
        <form action="{{ route('purchase-payments.store') }}" method="POST">
            @method('post')
            @csrf
            <div class="row w-100">
                <form class="row g-3">
                    <div class="col-md-6 mb-3">
                        <label for="inputType" class="form-label">Vendor</label>
                        <select id="inputState"
                            class="form-select @error('vendor')
                            is-invalid
                        @enderror"
                            name="vendor">
                            <option selected disabled>Select Vendor</option>
                            @foreach ($vendors as $vendor)
                                <option value="{{ $vendor->id }}"> {{ $vendor->company }} </option>
                            @endforeach

                        </select>
                        @error('vendor')
                            {{ $message }}
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="amount" class="form-label">Amount</label>
                        <input type="number"
                            class="form-control @error('amount')
                            is-invalid
                        @enderror"
                            id="amount" name="amount" placeholder="Enter amount">
                        @error('amount')
                            {{ $message }}
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="inputDescription4" class="form-label">Description</label>
                        <textarea type="Description"
                            class="form-control @error('description')
                            is-invalid
                        @enderror"
                            name="description" id="inputDescription4" placeholder="Enter description"></textarea>
                        @error('description')
                            {{ $message }}
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
