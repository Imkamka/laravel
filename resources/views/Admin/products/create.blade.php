@extends('Admin.layout.app')
@section('title', 'Store Product')
@section('content')
    <div class="row p-3">
        <h3>Product Stock/<small class="text-muted">add new</small></h3>
    </div>
    <div class="container product-details p-5 shadow-lg rounded-3">
        <h4 class="product-header p-5 text-center">Add product details</h4>
        <form action="{{ route('products.store') }}" method="POST">
            @method('post')
            @csrf
            <div class="row w-100">
                <form class="row g-3">
                    <div class="col-md-6 mb-3">
                        <label for="inputProductName4" class="form-label">Product name</label>
                        <input type="text"
                            class="form-control @error('name')
                            is-invalid
                        @enderror"
                            id="inputProductName4" name="name" placeholder="Enter product name">
                        @error('name')
                            {{ $message }}
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="inputDescription4" class="form-label">Description</label>
                        <input type="Description"
                            class="form-control @error('description')
                            is-invalid
                        @enderror"
                            name="description" id="inputDescription4" placeholder="Enter product description">
                        @error('description')
                            {{ $message }}
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="inputType" class="form-label">Type</label>
                        <select id="inputState"
                            class="form-select @error('type')
                            is-invalid
                        @enderror"
                            name="type">
                            <option selected disabled>Select product type</option>
                            <option value="Milk"> Milk </option>
                            <option value="Protein">Protein</option>
                        </select>
                        @error('type')
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
