<!DOCTYPE html>
<html lang="en" class="material-style layout-fixed">
@include('layouts.links.courier.upper-links')
<body>
    <!-- [ Preloader ] Start -->
    <div class="page-loader">
        <div class="bg-primary"></div>
    </div>
    <!-- [ Preloader ] End -->

    <div class="layout-wrapper layout-2">
        <div class="layout-inner">

            @yield('sidebar')

            <div class="layout-container">
                @include('layouts.users.courier.navbar')

                <div class="layout-content">

                    <div class="container-fluid flex-grow-1 container-p-y">
                        @yield('content')
                    </div>

                    @include('layouts.users.admin.footer')
                </div>
            </div>
        </div>
        <div class="layout-overlay layout-sidenav-toggle"></div>
    </div>

@include('layouts.links.admin.lower-links')
</body>

</html>
