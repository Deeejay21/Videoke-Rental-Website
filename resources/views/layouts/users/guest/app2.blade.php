<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.links.upper-links')
<body id="page-top">
    @yield('content')
    {{-- <div id="app"> --}}
        @include('layouts.users.guest.navbar2')

       {{--  <main class="py-4">
            @yield('content')
        </main>

        @include('layouts.links.lower-links')
    </div> --}}

    {{-- @include('layouts.users.guest.footer') --}}
    {{-- @include('layouts.links.js') --}}
</body>
</html>
