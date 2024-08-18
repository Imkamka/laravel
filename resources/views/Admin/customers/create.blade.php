@extends('Admin.layout.app')
@section('title', 'Create customer')
@section('content')
    <div class="row ">
        <h3>Customer/<small class="text-muted">add new</small></h3>
    </div>
    <div class="container product-details">
        <h4 class="product-header p-5 text-center">Add customer details</h4>
        <form action="{{ route('customers.store') }}" method="POST">
            @csrf
            @method('POST')
            <div class="row w-100">
                <form class="row g-3">
                    <div class="col-md-6 mb-3">
                        <label for="company" class="form-label">Company</label>
                        <input type="text"
                            class="form-control @error('company')
                            is-invalid
                        @enderror"
                            name="company" placeholder="Enter company name" value="{{ old('company') }}">
                        @error('company')
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="full_name" class="form-label">Full name</label>
                        <input type="full_name"
                            class="form-control @error('full_name')
                            is-invalid
                        @enderror"
                            name="full_name" id="full_name" placeholder="Enter full name " value="{{ old('full_name') }}">
                        @error('full_name')
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email"
                            class="form-control @error('email')
                            is-invalid
                        @enderror"
                            name="email" id="email" placeholder="Enter email address" value="{{ old('old') }}">
                        @error('email')
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="number" class="form-label">Phone</label>
                        <input type="number"
                            class="form-control @error('phone')
                            is-invalid
                        @enderror"
                            name="phone" placeholder="Enter phone number" value="{{ old('phone') }}">
                        @error('phone')
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="address">Address</label>
                        <textarea name="address" id="address"
                            class="form-control  @error('address')
                            is-invalid
                        @enderror"
                            placeholder="Enter Address">{{ old('address') }}</textarea>
                        @error('address')
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="ntn">NTN</label>
                        <input type="text" name="ntn" id="ntn"
                            class="form-control  @error('ntn')
                            is-invalid
                        @enderror"
                            value="{{ old('ntn') }}" placeholder="Enter ntn">
                        @error('ntn')
                            <p class="text-danger">
                                {{ $message }}
                            </p>
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
