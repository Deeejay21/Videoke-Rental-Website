<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.links.qrcode-upper')
<body>
    <div id="app">
        @include('layouts.users.courier.navbar')

        <div class="row">
            <div class="col-2 pt-4">
                @include('layouts.users.courier.sidebar')

            </div>
            <div class="col-10 pt-4">
                @yield('content')
            </div>
        </div>

        {{-- <main class="py-4"> --}}
        {{-- </main> --}}

        <div class="pt-5">
            @include('layouts.users.courier.footer')
        </div>
    </div>
</body>
@include('layouts.links.qrcode-lower')
</html>
