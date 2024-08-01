@include('Admin.includes.header')

<div class="wrapper d-flex align-items-stretch">
    @include('Admin.layout.sidebar')
    <!-- Page Content  -->
    <div id="content" class="p-4 p-md-5">
        @include('Admin.layout.navbar')

        @yield('content')
    </div>
</div>

@include('Admin.includes.footer')
