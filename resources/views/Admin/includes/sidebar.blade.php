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
                <a href="{{ route('view.purchase') }}"
                    class="nav_link {{ Route::is('view.purchase') ? 'active' : ' ' }}">
                    <span class="navlink_icon">
                        <i class='bx bxs-dollar-circle'></i>
                    </span>
                    <span class="navlink">Purchases</span>
                </a>


            </li>
            <!-- end -->

            <!-- duplicate these li tag if you want to add or remove navlink only -->
            <!-- Start -->
            <li class="item mb-3 ">
                <a href="{{ route('view.sales') }}" class="nav_link {{ Route::is('view.sales') ? 'active' : ' ' }}">
                    <span class="navlink_icon ">
                        <i class='bx bx-line-chart'></i>
                    </span>
                    <span class="navlink">Sales</span>
                </a>
            </li>


            <li class="item mb-3">
                <a href="#" class="nav_link">
                    <span class="navlink_icon">
                        <i class='bx bx-book'></i>
                    </span>
                    <span class="navlink">Report</span>
                </a>
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
