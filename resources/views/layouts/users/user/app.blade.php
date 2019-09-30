<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.users.user.app-write')
<body>
    <div id="app">
        @include('layouts.users.user.navbar')

        <div class="row pt-4 ml-1 mr-1 center">
            <div class="col-md-4">
                @include('layouts.users.user.sidebar')
            </div>
                    
            <div class="col-md-8 center">
                @yield('content')
            </div>
    </div>

        {{-- <main class=""> --}}
        {{-- </main> --}}

        <div class="pt-5">
            @include('layouts.users.guest.footer')
        </div>
    </div>

</body>
</html>
