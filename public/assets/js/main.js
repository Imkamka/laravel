
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

    $('#products').DataTable({
        processing: true,
        serverSide: true,
        ajax: url,
        columns: [
            { data: 'id', name: 'id' },
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
            { data: 'id', name: 'id' },
            { data: 'full_name', name: 'full_name' },
            { data: 'email', name: 'email' },
            { data: 'phone', name: 'phone' },
            { data: 'address', name: 'address' },
            { data: 'company', name: 'company' },
            { data: 'ntn', name: 'ntn' },
            {
                data: 'is_active',
                name: 'is_active',
                render: function (data) {
                    return data == 1 ? 'Active' : 'Inactive'
                }
            },
            { data: 'action', name: 'action', orderable: true, searchable: true },
        ]
    });
    //purchases table
    $('#purchases').DataTable({
        processing: true,
        serverSide: true,
        ajax: purchaseUrl,
        columns: [
            {
                data: 'company',
                name: 'company',

            },
            { data: 'total_price', name: 'total_price' },
            {
                data: 'is_active',
                name: 'is_active',
                render: function (data) {
                    return data == 1 ? 'Active' : 'Inactive'
                }
            },
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
            { data: 'id', name: 'id' },
            { data: 'full_name', name: 'full_name' },
            { data: 'email', name: 'email' },
            { data: 'phone', name: 'phone' },
            { data: 'address', name: 'address' },
            { data: 'company', name: 'company' },
            { data: 'ntn', name: 'ntn' },
            {
                data: 'is_active',
                name: 'is_active',
                render: function (data) {
                    return data == 1 ? 'Active' : 'Inactive'
                }
            },
            { data: 'action', name: 'action', orderable: true, searchable: true },
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
                data: 'company',
                name: 'company',

            },
            { data: 'total_price', name: 'total_price' },
            {
                data: 'is_active',
                name: 'is_active',
                render: function (data) {
                    return data == 1 ? 'Active' : 'Inactive'
                }
            },
            { data: 'action', name: 'action', orderable: true, searchable: true },
        ]
    });

    const purchasePaymentURL = $('#purchasePayments').attr('payments-url');
    //sales table
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
    //sales table
    $('#salePayments').DataTable({
        processing: true,
        serverSide: true,
        ajax: salePaymentURL,
        columns: [
            {
                data: 'company',
                name: 'company',

            },
            { data: 'amount', name: 'amount' },

            { data: 'action', name: 'action', orderable: true, searchable: true },
        ]
    });

});



//Search filter for purchase queries product

let purchaseSearchProduct = document.getElementById('purchaseSearchProduct');
if (purchaseSearchProduct) {
    purchaseSearchProduct.addEventListener('input', function () {
        let query = this.value.trim();
        console.log(query);
        if (query.length > 0) {
            fetch(`/purchase-search?purchaseQuery=${query}`)
                .then(response => response.json())
                .then(data => {
                    let resultsDiv = document.getElementById('searchResults');
                    resultsDiv.innerHTML = '';
                    if (data.length > 0) {
                        resultsDiv.style.display = 'block';
                        data.forEach(item => {
                            console.log(item.product['name']);
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
                        resultsDiv.style.display = 'none';
                    }
                });
        } else {
            document.getElementById('searchResults').style.display = 'none';
        }
        //adding Purchased product into carts
        function addToCartPurchase(item) {
            console.log(item);
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
                                document.getElementById('selectedCustomer').textContent = item.company; // Update selected customer in summary
                                document.getElementById('customer_id').value = item.id;
                                resultsDiv.style.display = 'none';
                            });
                            resultsDiv.appendChild(divItem);
                        });
                    } else {
                        resultsDiv.style.display = 'none';
                    }
                });
        } else {
            document.getElementById('searchResults').style.display = 'none';
        }
    });
    //customer search form
    // document.addEventListener('click', function (e) {
    //     if (!document.getElementById('searchCustomerForm').contains(e.target)) {
    //         document.getElementById('searchCustomerResults').style.display = 'none';
    //     }
    // });
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
                            resultsDiv.style.display = 'none';
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
                            resultsDiv.style.display = 'none';
                        }
                    });
            } else {
                document.getElementById('searchVendorResults').style.display = 'none';
            }
        });
    }

})

//Sweet alert message
document.addEventListener('DOMContentLoaded', function () {
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
});
