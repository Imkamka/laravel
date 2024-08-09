<!-- sidebar -->
<nav class="sidebar">
    <div class="menu_content">
        <ul class="menu_items mb-4 mt-3">
            <!-- duplicate or remove this li tag if you want to add or remove navlink with submenu -->
            <!-- start -->
            <li class="item mb-3">
                <a href="{{ route('view.dashboard') }}"
                    class="nav_link {{ Route::is('view.dashboard') ? 'active' : ' ' }}">
                    <span class="navlink_icon">
                        <i class="bx bx-grid-alt"></i>
                    </span>
                    <span class="navlink">Dashboard</span>
                </a>
            </li>
            <!-- end -->
            <!-- duplicate this li tag if you want to add or remove  navlink with submenu -->
            <!-- start -->
            <li class="item mb-3">
                <div href="#" class="nav_link submenu_item {{ Route::is('view.purchase') ? 'active' : ' ' }}">
                    <span class="navlink_icon">
                        <i class='bx bxs-dollar-circle'></i>
                    </span>
                    <span class="navlink">Purchases</span>
                    <i class="bx bx-chevron-right arrow-left"></i>
                </div>
                <ul class="menu_items submenu">
                    <a href="{{ route('products.index') }}" class="nav_link sublink">Products</a>
                    <a href="{{ route('vendors.index') }}" class="nav_link sublink">Vendors</a>
                    <a href="{{ route('purchases.index') }}"
                        class="nav_link sublink {{ Route::is('purchases.index') ? 'active' : ' ' }}">Purchases</a>
                    <a href="#" class="nav_link sublink">Payments</a>
                </ul>

            </li>
            <!-- end -->
            <!-- duplicate these li tag if you want to add or remove navlink only -->
            <!-- Start -->
            <li class="item mb-3 ">
                <div href="" class="nav_link submenu_item {{ Route::is('view.sales') ? 'active' : ' ' }}">
                    <span class="navlink_icon ">
                        <i class='bx bx-line-chart'></i>
                    </span>
                    <i class="bx bx-chevron-right arrow-left"></i>

                    <span class="navlink">Sales</span>
                </div>
                <ul class="menu_items submenu">
                    <a href="{{ route('customers.index') }}" class="nav_link sublink">Customers</a>
                    <a href="{{ route('sales.index') }}" class="nav_link sublink">Sales</a>
                    <a href="#" class="nav_link sublink">Payments</a>
                </ul>
            </li>


            <li class="item mb-3">
                <div href="#" class="nav_link submenu_item">
                    <span class="navlink_icon">
                        <i class='bx bx-book'></i>
                    </span>
                    <span class="navlink">Report</span>
                    <i class="bx bx-chevron-right arrow-left"></i>

                </div>
                <ul class="menu_items submenu">
                    <a href="#" class="nav_link sublink">Overview</a>
                    <a href="#" class="nav_link sublink">Purchases</a>
                    <a href="#" class="nav_link sublink">Sales</a>
                    <a href="#" class="nav_link sublink">Payments</a>
                    <a href="#" class="nav_link sublink">Expenses</a>
                </ul>
            </li>
            <li class="item mb-3">
                <a href="#" class="nav_link">
                    <span class="navlink_icon">
                        <i class='bx bx-border-all'></i>
                    </span>
                    <span class="navlink">Product Stock</span>
                </a>
            </li>
            <li class="item mb-3">
                <a href="#" class="nav_link">
                    <span class="navlink_icon">
                        <i class='bx bx-cart-alt'></i>
                    </span>
                    <span class="navlink">My Cart</span>
                </a>
            </li>
            <li class="item mb-3">
                <a href="#" class="nav_link">
                    <span class="navlink_icon">
                        <i class='bx bx-bar-chart-square'></i>
                    </span>
                    <span class="navlink">Sales History</span>
                </a>
            </li>
        </ul>
        <ul class="menu_items">
            <hr>

            <li class="item mb-3 mt-5">
                @auth
                    <a href="{{ route('auth.logout') }}" class="nav_link">
                        <span class="navlink_icon">
                            <i class='bx bx-log-out-circle'></i>
                        </span>
                        <span class="navlink">Logout</span>

                    </a>
                @endauth
            </li>
        </ul>

        <!-- Sidebar Open / Close -->

    </div>
</nav>
