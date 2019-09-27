<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.links.qrcode-upper')
<body>
    <div id="app">
        @include('layouts.users.user.navbar')

        <div class="container">
            <div class="row pt-2">
                <div class="col-1 offset-11">
                    <a href="/user/{{ $user->id }}/account/home" class="btn btn-outline-primary">Exit</a>
                </div>
            </div>
            <div class="row">
                <div class="col-4 offset-5" style="margin-top: 23vh">
                    <qr-code user-Password="{{ $user->qr_code->qr_password }}"></qr-code>
                </div>
            </div>
        </div>
        {{-- <main class=""> --}}
        {{-- </main> --}}

    </div>
</body>
</html>
