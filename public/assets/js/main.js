
const body = document.querySelector("body");
// const darkLight = document.querySelector("#darkLight");

const sidebar = document.querySelector(".sidebar");
const submenuItems = document.querySelectorAll(".submenu_item");
const sidebarOpen = document.querySelector("#sidebarOpen");
const sidebarClose = document.querySelector(".collapse_sidebar");
const sidebarExpand = document.querySelector(".expand_sidebar");
sidebarOpen.addEventListener("click", () => sidebar.classList.toggle("close"));

// sidebarClose.addEventListener("click", () => {
//     sidebar.classList.add("close", "hoverable");
// });
// sidebarExpand.addEventListener("click", () => {
//     sidebar.classList.remove("close", "hoverable");
// });

// sidebar.addEventListener("mouseenter", () => {
//     if (sidebar.classList.contains("hoverable")) {
//         sidebar.classList.remove("close");
//     }
// });
// sidebar.addEventListener("mouseleave", () => {
//     if (sidebar.classList.contains("hoverable")) {
//         sidebar.classList.add("close");
//     }
// });

// darkLight.addEventListener("click", () => {
//     body.classList.toggle("dark");
//     if (body.classList.contains("dark")) {
//         document.setI;
//         darkLight.classList.replace("bx-sun", "bx-moon");
//     } else {
//         darkLight.classList.replace("bx-moon", "bx-sun");
//     }
// });

submenuItems.forEach((item, index) => {
    item.addEventListener("click", () => {
        item.classList.toggle("show_submenu");
        submenuItems.forEach((item2, index2) => {
            if (index !== index2) {
                item2.classList.remove("show_submenu");
            }
        });
    });
});

if (window.innerWidth < 768) {
    sidebar.classList.add("close");
} else {
    sidebar.classList.remove("close");
}

$(document).ready(function () {
    //Products table
    const url = $('#products').attr('data-url');
    const vendorUrl = $('#vendors').attr('vendor-url');
    const purchaseUrl = $('#purchases').attr('purchase-url');

    var baseUrl = $('#products').attr('baseUrl');
    $('#products').DataTable({
        processing: true,
        serverSide: true,
        ajax: url,
        columns: [
            {
                data: null,
                name: 'index',
                orderable: false,
                searchable: false,
                render: function (data, type, full, meta) {
                    return meta.row + 1 + meta.settings._iDisplayStart; // Calculate index based on page start
                }
            },
            {
                data: 'image',
                name: 'image',
                render: function (data, type, row) {
                    if (data) {
                        // Assuming 'data' contains the image path relative to the storage directory
                        return '<img src="' + baseUrl + '/' + data + '" alt="Image" style="max-width: 40px; height: 40;" />';
                    } else {
                        return 'No image';
                    }
                }
            },
            { data: 'name', name: 'name' },
            { data: 'description', name: 'description' },
            { data: 'type', name: 'type' },
            { data: 'action', name: 'action', orderable: true, searchable: true },
        ]
    });
    //vendors table
    $('#vendors').DataTable({
        processing: true,
        serverSide: true,
        ajax: vendorUrl,
        columns: [
            {
                data: null,
                name: 'index',
                orderable: false,
                searchable: false,
                render: function (data, type, full, meta) {
                    return meta.row + 1 + meta.settings._iDisplayStart; // Calculate index based on page start
                }
            },
            { data: 'company', name: 'company' },
            { data: 'address', name: 'address' },

            { data: 'action', name: 'action', orderable: true, searchable: true },
        ]
    });

    const vendorReportURL = $('#vendorReports').attr('vendorReport-url');
    //vendors reports table
    $('#vendorReports').DataTable({
        processing: true,
        serverSide: true,
        ajax: vendorReportURL,
        columns: [
            // { data: 'DT_RowIndex', name: 'DT_RowIndex' },
            { data: 'type', name: 'type' },
            { data: 'created_at', name: 'created_at' },
            { data: 'total_price', name: 'total_price' },
            { data: 'amount', name: 'amount' },
            { data: 'balance', name: 'balance' },
        ]
    });

    //purchases table
    $('#purchases').DataTable({
        processing: true,
        serverSide: true,
        ajax: purchaseUrl,
        columns: [
            {
                data: null,
                name: 'index',
                orderable: false,
                searchable: false,
                render: function (data, type, full, meta) {
                    return meta.row + 1 + meta.settings._iDisplayStart; // Calculate index based on page start
                }
            },
            {
                data: 'company',
                name: 'company',

            },
            { data: 'total_price', name: 'total_price' },
            { data: 'action', name: 'action', orderable: true, searchable: true },
        ]
    });

    const customerUrl = $('#customers').attr('customer-url');
    //Customers table
    $('#customers').DataTable({
        processing: true,
        serverSide: true,
        ajax: customerUrl,
        columns: [
            {
                data: null,
                name: 'index',
                orderable: false,
                searchable: false,
                render: function (data, type, full, meta) {
                    return meta.row + 1 + meta.settings._iDisplayStart; // Calculate index based on page start
                }
            },
            { data: 'company', name: 'company' },
            { data: 'address', name: 'address' },

            { data: 'action', name: 'action', orderable: true, searchable: true },
        ]
    });
    const customerReportURL = $('#customerReports').attr('customerReport-url');
    //vendors reports table
    $('#customerReports').DataTable({
        processing: true,
        serverSide: true,
        ajax: customerReportURL,
        columns: [
            // { data: 'DT_RowIndex', name: 'DT_RowIndex' },
            { data: 'type', name: 'type' },
            { data: 'created_at', name: 'created_at' },
            { data: 'total_price', name: 'total_price' },
            { data: 'amount', name: 'amount' },
            { data: 'balance', name: 'balance' },
        ]
    });

    const saleUrl = $('#sales').attr('sales-url');
    //sales table
    $('#sales').DataTable({
        processing: true,
        serverSide: true,
        ajax: saleUrl,
        columns: [
            {
                data: null,
                name: 'index',
                orderable: false,
                searchable: false,
                render: function (data, type, full, meta) {
                    return meta.row + 1 + meta.settings._iDisplayStart; // Calculate index based on page start
                }
            },
            {
                data: 'company',
                name: 'company',

            },
            { data: 'total_price', name: 'total_price' },

            { data: 'action', name: 'action', orderable: true, searchable: true },
        ]
    });

    const purchasePaymentURL = $('#purchasePayments').attr('payments-url');
    //purchase payments
    $('#purchasePayments').DataTable({
        processing: true,
        serverSide: true,
        ajax: purchasePaymentURL,
        columns: [
            {
                data: 'company',
                name: 'company',

            },
            { data: 'amount', name: 'amount' },

            { data: 'action', name: 'action', orderable: true, searchable: true },
        ]
    });

    const salePaymentURL = $('#salePayments').attr('salePayments-url');
    //sales payment
    $('#salePayments').DataTable({
        processing: true,
        serverSide: true,
        ajax: salePaymentURL,
        columns: [
            {
                data: null,
                name: 'index',
                orderable: false,
                searchable: false,
                render: function (data, type, full, meta) {
                    return meta.row + 1 + meta.settings._iDisplayStart; // Calculate index based on page start
                }
            },
            {
                data: 'company',
                name: 'company',

            },
            { data: 'amount', name: 'amount' },

            { data: 'action', name: 'action', orderable: true, searchable: true },
        ]
    });

    const expenseURL = $('#expenses').attr('expenses-url');
    //sales table
    $('#expenses').DataTable({
        processing: true,
        serverSide: true,
        ajax: expenseURL,
        columns: [
            {
                data: 'amount',
                name: 'amount',

            },
            { data: 'description', name: 'description' },

            { data: 'action', name: 'action', orderable: true, searchable: true },
        ]
    });

    //Reports
    const purchaseReportTableURL = $('#purchaseReportTable').attr('report-url');
    //vendors reports table
    $('#purchaseReportTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: purchaseReportTableURL,
            data: function (data) {
                data.start_date = $('input[name="start_date"]').val();
                data.end_date = $('input[name="end_date"]').val();
            }
        },
        columns: [
            { data: 'id', name: 'id' },
            { data: 'company', name: 'company' },
            { data: 'total_price', name: 'total_price' },
            { data: 'created_at', name: 'created_at' },
        ]
    });

    const saleReportTableURL = $('#saleReportTable').attr('report-surl');
    //sales reports table
    $('#saleReportTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: saleReportTableURL,
            data: function (data) {
                data.start_date = $('input[name="start_date"]').val();
                data.end_date = $('input[name="end_date"]').val();
            }
        },
        columns: [
            { data: 'id', name: 'id' },
            { data: 'company', name: 'company' },
            { data: 'total_price', name: 'total_price' },
            { data: 'created_at', name: 'created_at' },
        ]
    });

    //payments reports table
    const paymentReportTableURL = $('#paymentReportTable').attr('report-url');
    $('#paymentReportTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: paymentReportTableURL,
            data: function (data) {
                data.start_date = $('input[name="start_date"]').val();
                data.end_date = $('input[name="end_date"]').val();
            }
        },
        columns: [
            { data: 'id', name: 'id' },
            { data: 'type', name: 'type' },
            { data: 'created_at', name: 'created_at' },
            { data: 'amount', name: 'amount' },
            { data: 'balance', name: 'balance' },
        ]
    });

    //expenses reports table
    const expenseReportTableURL = $('#expenseReportTable').attr('report-url');
    $('#expenseReportTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: expenseReportTableURL,
            data: function (data) {
                data.start_date = $('input[name="start_date"]').val();
                data.end_date = $('input[name="end_date"]').val();
            }
        },
        columns: [
            { data: 'id', name: 'id' },
            { data: 'amount', name: 'amount' },
            { data: 'created_at', name: 'created_at' },
        ]
    });


    $('.searchFormReport').on('submit', function (e) {
        e.preventDefault();
        $('#purchaseReportTable').DataTable().draw()
        $('#saleReportTable').DataTable().draw()
        $('#paymentReportTable').DataTable().draw()
        $('#expenseReportTable').DataTable().draw()
    })
});



//Search filter for purchase queries product

let purchaseSearchProduct = document.getElementById('purchaseSearchProduct');
if (purchaseSearchProduct) {
    purchaseSearchProduct.addEventListener('input', function () {
        let query = this.value.trim();
        if (query.length > 0) {
            fetch(`/purchase-search?purchaseQuery=${query}`)
                .then(response => response.json())
                .then(data => {
                    let resultsDiv = document.getElementById('searchResults');
                    resultsDiv.innerHTML = '';
                    if (data.length > 0) {
                        resultsDiv.style.display = 'block';
                        data.forEach(item => {
                            let divItem = document.createElement('div');
                            divItem.textContent = item.product['name'];
                            divItem.style.padding = '8px';
                            divItem.style.cursor = 'pointer';
                            divItem.addEventListener('click', function () {
                                addToCartPurchase(item);
                                document.getElementById('purchaseSearchProduct').value = '';
                                resultsDiv.style.display = 'none';
                            });
                            resultsDiv.appendChild(divItem);
                        });
                    } else {
                        resultsDiv.style.display = 'block'; // Show the results div
                        let noDataDiv = document.createElement('div');
                        noDataDiv.textContent = 'No data found';
                        noDataDiv.style.padding = '8px';
                        noDataDiv.style.color = 'red';
                        resultsDiv.appendChild(noDataDiv);
                    }
                });
        } else {
            document.getElementById('searchResults').style.display = 'none';
        }

        document.addEventListener('click', function (e) {
            if (!document.getElementById('checkoutSaleForm').contains(e.target)) {
                document.getElementById('searchResults').style.display = 'none';
            }
        });
        //adding Purchased product into carts
        function addToCartPurchase(item) {
            let cartTableBody = document.getElementById('cartTableBody');
            let rowCount = cartTableBody.getElementsByTagName('tr').length;
            let newRow = document.createElement('tr');

            let customPrice = 0.00; // Default price value
            let quantity = 1;
            let totalPrice = customPrice * quantity;

            newRow.innerHTML = `
        <input type="hidden" name="items[${rowCount}][product_id]" class="product-id" value="${item.product['id']}">
        <td>${item.product['name']}</td>
        <td><input type="number" name="items[${rowCount}][quantity]" class="form-control quantity" value="${quantity}" min="1"></td>
        <td><input type="number" class="form-control price" name="items[${rowCount}][unit_price]" value="${customPrice.toFixed(2)}" min="0"></td>
        <td class="total">${totalPrice.toFixed(2)}</td>
        <input type="hidden" class="total_price" name="items[${rowCount}][total_price]" value="${totalPrice.toFixed(2)}">
        <td><button class="btn btn-danger remove-product"><i class='bx bx-trash-alt'></i></button></td>
    `;

            cartTableBody.appendChild(newRow);
            updateTotalPurchase();

            // Update item count
            document.getElementById('itemsCount').textContent = `${rowCount + 1} items`;

            // Add event listener for quantity change
            newRow.querySelector('.quantity').addEventListener('change', function () {
                updateRowTotalPurchase(newRow);
                updateTotalPurchase();
            });

            // Add event listener for price change
            newRow.querySelector('.price').addEventListener('change', function () {
                updateRowTotalPurchase(newRow);
                updateTotalPurchase();
            });

            // Add event listener for remove button
            newRow.querySelector('.remove-product').addEventListener('click', function () {
                newRow.remove();
                updateTotalPurchase();
                document.getElementById('itemsCount').textContent = `${cartTableBody.getElementsByTagName('tr').length} items`;
            });
        }
        function updateRowTotalPurchase(row) {
            let quantity = row.querySelector('.quantity').value;
            let price = row.querySelector('.price').value;
            let total = quantity * price;
            row.querySelector('.total').textContent = total.toFixed(2);
            row.querySelector('.total_price').value = total.toFixed(2);
        }

        function updateTotalPurchase() {
            let total = 0;
            document.querySelectorAll('.total').forEach(function (element) {
                total += parseFloat(element.textContent);
            });
            document.getElementById('totalPrice').textContent = total.toFixed(2);
            document.getElementById('summaryTotalPrice').textContent = total.toFixed(2); // Update summary card total price
            // document.getElementById('total_id').value = total.toFixed(2);
        }
    });
}

//Customer cart search
let customerSearchInput = document.getElementById('customerSearchInput');
if (customerSearchInput) {
    customerSearchInput.addEventListener('input', function () {
        let query = this.value.trim();
        if (query.length > 0) {
            fetch(`/customer-search?customerQuery=${query}`)
                .then(response => response.json())
                .then(data => {
                    let resultsDiv = document.getElementById('searchCustomerResults');
                    resultsDiv.innerHTML = '';
                    if (data.length > 0) {
                        resultsDiv.style.display = 'block';
                        data.forEach(item => {
                            let divItem = document.createElement('div');
                            divItem.textContent = item.company;
                            divItem.style.padding = '8px';
                            divItem.style.cursor = 'pointer';
                            divItem.addEventListener('click', function () {
                                document.getElementById('customerSearchInput').value = '';
                                resultsDiv.style.display = 'none';
                                document.getElementById('selectedCustomer').textContent = item.company; // Update selected customer in summary
                                document.getElementById('customer_id').value = item.id;
                                document.getElementById('productInput').value = item.product['name'];
                            });
                            resultsDiv.appendChild(divItem);
                        });
                    } else {
                        resultsDiv.style.display = 'block'; // Show the results div
                        let noDataDiv = document.createElement('div');
                        noDataDiv.textContent = 'No data found';
                        noDataDiv.style.padding = '8px';
                        noDataDiv.style.color = 'red';
                        resultsDiv.appendChild(noDataDiv);
                    }
                });
        } else {
            document.getElementById('searchResults').style.display = 'none';
        }
    });
    //customer search form
    document.addEventListener('click', function (e) {
        if (!document.getElementById('searchCustomerForm').contains(e.target)) {
            document.getElementById('searchCustomerResults').style.display = 'none';
        }
    });
}
//sale validation submission
let saleCheckout = document.getElementById('checkoutSaleForm');
if (saleCheckout) {
    saleCheckout.addEventListener('submit', function (event) {

        // Check if there are items in the cart
        let cartTableBody = document.getElementById('cartTableBody');
        let cartItems = cartTableBody.getElementsByTagName('tr');

        // Check if the vendor is selected
        let vendorId = document.getElementById('customer_id').value;

        // Validate cart items
        if (cartItems.length === 0) {
            alert('Please add at least one product to the cart.');
            event.preventDefault(); // Prevent form submission
            return;
        }

        // Validate vendor selection
        if (!vendorId) {
            alert('Please select a company.');
            event.preventDefault(); // Prevent form submission
            return;
        }

        let invalidInput = false;
        cartTableBody.querySelectorAll('tr').forEach(row => {
            let quantity = row.querySelector('.quantity').value;
            let price = row.querySelector('.price').value;

            if (quantity <= 0 || price < 0) {
                alert('Please enter valid quantities and prices for all items.');
                invalidInput = true;
            }
        });

        if (invalidInput) {
            event.preventDefault(); // Prevent form submission
            return;
        }

    });
}
//Vendors and Product cart
document.addEventListener('DOMContentLoaded', function () {
    let productSearchInput = document.getElementById('productSearchInput');
    if (productSearchInput) {
        productSearchInput.addEventListener('input', function () {
            let query = this.value.trim();
            if (query.length > 0) {
                fetch(`/search?query=${query}`)
                    .then(response => response.json())
                    .then(data => {
                        let resultsDiv = document.getElementById('searchResults');
                        resultsDiv.innerHTML = '';
                        if (data.length > 0) {
                            resultsDiv.style.display = 'block';
                            data.forEach(item => {
                                let divItem = document.createElement('div');
                                divItem.textContent = item.name;
                                divItem.style.padding = '8px';
                                divItem.style.cursor = 'pointer';
                                divItem.addEventListener('click', function () {
                                    addToCart(item);
                                    document.getElementById('productSearchInput').value = '';
                                    resultsDiv.style.display = 'none';
                                });
                                resultsDiv.appendChild(divItem);
                            });
                        } else {
                            resultsDiv.style.display = 'block'; // Show the results div
                            let noDataDiv = document.createElement('div');
                            noDataDiv.textContent = 'No data found';
                            noDataDiv.style.padding = '8px';
                            noDataDiv.style.color = 'red';
                            resultsDiv.appendChild(noDataDiv);
                        }
                    });
            } else {
                document.getElementById('searchResults').style.display = 'none';
            }

        });

        document.addEventListener('click', function (e) {
            if (!document.getElementById('searchForm').contains(e.target)) {
                document.getElementById('searchResults').style.display = 'none';
            }
        });


        function addToCart(item) {

            let cartTableBody = document.getElementById('cartTableBody');
            let rowCount = cartTableBody.getElementsByTagName('tr').length;
            let newRow = document.createElement('tr');
            let customPrice = 0.00; // Default price value
            let quantity = 1;
            let totalPrice = customPrice * quantity;

            newRow.innerHTML = `
        <input type="hidden" name="items[${rowCount}][product_id]" class="product-id" value="${item.id}">
        <td>${item.name}</td>
        <td><input type="number" name="items[${rowCount}][quantity]" class="form-control quantity" value="${quantity}" min="1"></td>
        <td><input type="number" class="form-control price" name="items[${rowCount}][unit_price]" value="${customPrice.toFixed(2)}" min="0"></td>
        <td class="total">${totalPrice.toFixed(2)}</td>
        <input type="hidden" class="total_price" name="items[${rowCount}][total_price]" value="${totalPrice.toFixed(2)}">
        <td><button class="btn btn-danger remove-product"><i class='bx bx-trash-alt'></i></button></td>
    `;

            cartTableBody.appendChild(newRow);
            updateTotal();

            // Update item count
            document.getElementById('itemsCount').textContent = `${rowCount + 1} items`;

            // Add event listener for quantity change
            newRow.querySelector('.quantity').addEventListener('change', function () {
                updateRowTotal(newRow);
                updateTotal();
            });

            // Add event listener for price change
            newRow.querySelector('.price').addEventListener('change', function () {
                updateRowTotal(newRow);
                updateTotal();
            });

            // Add event listener for remove button
            newRow.querySelector('.remove-product').addEventListener('click', function () {
                newRow.remove();
                updateTotal();
                document.getElementById('itemsCount').textContent = `${cartTableBody.getElementsByTagName('tr').length} items`;
            });
        }


        function updateRowTotal(row) {
            let quantity = row.querySelector('.quantity').value;
            let price = row.querySelector('.price').value;
            let total = quantity * price;
            row.querySelector('.total').textContent = total.toFixed(2);
            row.querySelector('.total_price').value = total.toFixed(2);
        }

        function updateTotal() {
            let total = 0;
            document.querySelectorAll('.total').forEach(function (element) {
                total += parseFloat(element.textContent);
            });
            document.getElementById('totalPrice').textContent = total.toFixed(2);
            document.getElementById('summaryTotalPrice').textContent = total.toFixed(2); // Update summary card total price
            // document.getElementById('total_id').value = total.toFixed(2);
        }
    }

    // Vendor search and selection
    let vendorSearchInput = document.getElementById('vendorSearchInput');
    if (vendorSearchInput) {
        vendorSearchInput.addEventListener('input', function () {
            let query = this.value.trim();
            if (query.length > 0) {
                fetch(`/vendor-search?vendorQuery=${query}`)
                    .then(response => response.json())
                    .then(data => {
                        let resultsDiv = document.getElementById('searchVendorResults');
                        resultsDiv.innerHTML = '';
                        if (data.length > 0) {
                            resultsDiv.style.display = 'block';
                            data.forEach(item => {
                                let divItem = document.createElement('div');
                                divItem.textContent = item.company;
                                divItem.style.padding = '8px';
                                divItem.style.cursor = 'pointer';
                                divItem.addEventListener('click', function () {
                                    document.getElementById('vendorSearchInput').value = '';
                                    document.getElementById('selectedVendor').textContent = item.company; // Update selected vendor in summary
                                    document.getElementById('vendor_id').value = item.id;
                                    resultsDiv.style.display = 'none';
                                });
                                resultsDiv.appendChild(divItem);
                            });
                        } else {
                            resultsDiv.style.display = 'block'; // Show the results div
                            let noDataDiv = document.createElement('div');
                            noDataDiv.textContent = 'No data found';
                            noDataDiv.style.padding = '8px';
                            noDataDiv.style.color = 'red';
                            resultsDiv.appendChild(noDataDiv);
                        }
                    });
            } else {
                document.getElementById('searchVendorResults').style.display = 'none';
            }
            document.addEventListener('click', function (event) {
                let resultsDiv = document.getElementById('searchVendorResults');
                let searchInput = document.getElementById('vendorSearchInput');

                // Check if the click was outside the results div and the search input
                if (!resultsDiv.contains(event.target) && event.target !== searchInput) {
                    resultsDiv.style.display = 'none';
                }
            });
        });
    }

})
// Add event listener for form submission
let purchaseCheckout = document.getElementById('checkoutForm');
//validate before submission purhcase
if (purchaseCheckout) {
    purchaseCheckout.addEventListener('submit', function (event) {
        // Check if there are items in the cart
        let cartTableBody = document.getElementById('cartTableBody');
        let cartItems = cartTableBody.getElementsByTagName('tr');

        // Check if the vendor is selected
        let vendorId = document.getElementById('vendor_id').value;

        // Validate cart items
        if (cartItems.length === 0) {
            alert('Please add at least one product to the cart.');
            event.preventDefault(); // Prevent form submission
            return;
        }

        // Validate vendor selection
        if (!vendorId) {
            alert('Please select a vendor.');
            event.preventDefault(); // Prevent form submission
            return;
        }

        // Optionally, you can also check if all quantities and prices are valid
        let invalidInput = false;
        cartTableBody.querySelectorAll('tr').forEach(row => {
            let quantity = row.querySelector('.quantity').value;
            let price = row.querySelector('.price').value;

            if (quantity <= 0 || price < 0) {
                alert('Please enter valid quantities and prices for all items.');
                invalidInput = true;
            }
        });

        if (invalidInput) {
            event.preventDefault(); // Prevent form submission
            return;
        }
    });
}



//Sweet alert message
document.body.addEventListener('click', function (event) {
    if (event.target && event.target.classList.contains('delete')) {
        event.preventDefault();

        const form = event.target.closest('form');

        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: "btn btn-success",
                cancelButton: "btn btn-danger"
            },
            buttonsStyling: false
        });

        swalWithBootstrapButtons.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel!",
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                swalWithBootstrapButtons.fire({
                    title: "Cancelled",
                    text: "Your imaginary file is safe :)",
                    icon: "error"
                });
            }
        });
    }
});

$(document).ready(function () {
    // Initialize Dropify
    $('.dropify').dropify();
});
