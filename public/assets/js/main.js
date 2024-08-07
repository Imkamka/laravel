
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
            { data: 'is_active', name: 'is_active' },
            { data: 'action', name: 'action', orderable: true, searchable: true },
        ]
    });
    //purchases table
    $('#purchases').DataTable({
        processing: true,
        serverSide: true,
        ajax: purchaseUrl,
        columns: [
            { data: 'id', name: 'id' },
            { data: 'full_name', name: 'full_name' },
            { data: 'name', name: 'name' },
            { data: 'company', name: 'company' },
            { data: 'action', name: 'action', orderable: true, searchable: true },
        ]
    });
});

//Search products
let productSearchInput = document.getElementById('productSearchInput');
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
                            document.getElementById('productSearchInput').value = item.name;
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

//Search vendors by company title
//Search products
let vendorSearchInput = document.getElementById('vendorSearchInput');
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
                            document.getElementById('vendorSearchInput').value = item.company;
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
document.addEventListener('click', function (e) {
    if (!document.getElementById('searchVendorForm').contains(e.target)) {
        document.getElementById('searchVendorResults').style.display = 'none';
    }
});
