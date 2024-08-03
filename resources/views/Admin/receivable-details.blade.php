<!-- Modal -->
<div class="modal fade p-5" id="amount-details" tabindex="-1" aria-labelledby="amount-details" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-center" id="amount-details">Receivable details</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container p-5">
                    <div class="row client-detail">
                        <div class="col-auto me-auto ">
                            <span>Client Name*</span>
                            <h4>Mark Henry Lupin</h4>
                        </div>
                        <div class="col-auto">
                            <span>Amount receivable*</span>
                            <h4>4,400.00 pkr</h4>
                        </div>
                    </div>
                    <div class="row phone-no">
                        <div class="col-auto me-auto client-detail">
                            <span>Phone no*</span>
                            <h4>+92 345 8973240</h4>
                        </div>
                        <div class="col-auto client-detail">
                            <span>Payment*</span>
                            <h4>Later on</h4>
                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive ">
                                <div class="row p-2 stock-detail">
                                    <div class="col-auto me-auto mb-3">
                                        <h3 class="page-title">
                                            Items purchased
                                        </h3>
                                        <small class="text-muted">Total:2</small>
                                    </div>

                                </div>
                                <table class="table table-responsive ">
                                    <thead>
                                        <tr>
                                            <th scope="col" width="1%">Item</th>
                                            <th scope="col" width="1%">Type</th>
                                            <th scope="col" width="1%">Quantity</th>
                                            <th scope="col" width="1%">Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @for ($i = 0; $i <= 1; $i++)
                                            <tr>
                                                <td>
                                                    <img src="{{ asset('assets/image/bg.jpeg') }}" width="30px"
                                                        height="30px" alt="">
                                                </td>
                                                <td><span>Cow Feed</span></td>

                                                <td>03</td>
                                                <td class="text-danger">26,00.00 PKR</td>


                                            </tr>
                                        @endfor

                                    </tbody>

                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
