<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.links.qrcode-upper')
<style>
    img {
        display: block;
        margin-left: auto;
        margin-right: auto;
        margin-top: 21vh;
    }
</style>
<body>
    <div id="app">
        @include('layouts.users.user.navbar')

        @if ($user->is_paid == 'Half Payment')
        <div class="container">
            <div class="row justify-content-center pt-4">
                <a href="/user/{{ $user->id }}/account/home" class="btn btn-outline-primary">Exit</a>
            </div>
            
            <qr-code user-Password="{{ $user->qr_code->qr_password }}" class="img"></qr-code>
        </div>
        @endif
        
        @foreach ($anotherHalf as $half)
        @if ($half->is_paid == 'Half Payment')
        <div class="container">
            <div class="row justify-content-center pt-4">
                <a href="/user/{{ $user->id }}/account/home" class="btn btn-outline-primary">Exit</a>
            </div>

                <qr-code user-Password="{{ $half->qr_password }}" class="img"></qr-code>
            </div>
        @endif
        @endforeach

</body>
</html>
