<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.links.datetimejs')
<body>
    <div id="app">
        @include('layouts.users.guest.navbar')

        <main class="py-4">
            @yield('content')
        </main>

        @include('layouts.links.lower-links')
    </div>
</body>
</html>
