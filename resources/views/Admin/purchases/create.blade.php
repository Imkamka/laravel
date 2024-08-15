@extends('Admin.layout.app')
@section('title', 'Create purchase')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-auto me-auto mb-3">
                <h3 class="page-title">
                    Purchase Cart
                </h3>
            </div>

        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-3">
                <form action="{{ route('purchases.store') }}" method="POST" id="checkoutForm">
                    @method('POST')
                    @csrf

                    {{-- Product id  --}}

                    <div class="card shadow" id="productCard">
                        <div class="card-body p-4">
                            <!-- Product search and cart section -->
                            <!-- Product Search -->
                            <div class="row mb-3">
                                <div id="searchForm" autocomplete="off">
                                    <div class="col-sm-12">
                                        <input type="text" placeholder="Search Product" id="productSearchInput"
                                            class="form-control w-100">
                                        <div id="searchResults"></div>
                                    </div>
                                </div>
                            </div>

                            <!-- Shopping Cart -->
                            <h5 class="card-title"><strong>Shopping Cart</strong></h5>
                            <h6 class="card-subtitle mb-2 text-body-secondary text-end" id="itemsCount">0 items</h6>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col">Name</th>
                                                <th scope="col">Quantity</th>
                                                <th scope="col">Price</th>
                                                <th scope="col">Total</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="cartTableBody">
                                            <!-- Dynamic rows will be appended here -->

                                        </tbody>
                                    </table>
                                    <div class="text-end">
                                        {{-- <input type="hidden" id="total_price" name="total_price"> --}}
                                        <strong>Total Price: Rs. </strong><span id="totalPrice">0.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>

            <!-- Vendor and Summary Section -->
            <div class="col-lg-4 mb-3">
                <div class="card shadow" id="summaryCard">
                    <div class="card-body p-4">
                        <!-- Vendor Search -->
                        <div id="searchVendorForm" autocomplete="off">
                            <input type="text" placeholder="Search vendor" id="vendorSearchInput"
                                class="form-control w-100 mb-3">
                            <div id="searchVendorResults"></div>
                        </div>

                        <!-- Summary -->
                        <h5 class="card-title"><strong>Summary</strong></h5>
                        <hr>

                        <div class="text-left">
                            <input type="hidden" id="vendor_id" name="vendor_id">
                            <strong>Company </strong><span id="selectedVendor" name="company">None</span>
                        </div>
                        <hr>
                        <div class="text-left">
                            <strong>Total price </strong><span id="summaryTotalPrice">0.00</span>
                            {{-- <input type="hidden" id="total_price" name="total"> --}}
                        </div>
                        <button type="submit" class="btn btn-primary w-100 mt-3" id="checkoutButton">Checkout</button>
                        </form>
                    </div>
                </div>
            </div>
            {{-- </form> --}}

        </div>



    @endsection
