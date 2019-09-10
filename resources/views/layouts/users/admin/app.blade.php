<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.links.upper-links')
<body>
    <div id="app">
        @include('layouts.users.admin.navbar')

        <div class="row">
            <div class="col-2 pt-4">
                @include('layouts.users.admin.sidebar')

            </div>
            <div class="col-10 pt-4">
                @yield('content')
            </div>
        </div>

        {{-- <main class="py-4"> --}}
        {{-- </main> --}}

        <div class="pt-5">
            @include('layouts.users.admin.footer')
        </div>
    </div>
</body>
@include('layouts.links.lower-links')
</html>
