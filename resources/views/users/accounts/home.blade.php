@extends('layouts.users.user.app2')

@section('title', 'Videoke | Home')

@section('content')

@if (($user->is_paid == 'Half Payment') || ($user->is_paid == 'Paid') && ($user->is_return == 'Operating'))
<div class="alert alert-success paid" role="alert">
    <h4 class="alert-heading center"><strong>Welcome to Videoke Rental Website</strong></h4>
    <hr>
    <h5 class="card-text">Hi {{ $user->first_name }},</h5>
    <p>I hope we accompanied you to your reservation. Please wait for your reservation delivery date. Thank you.</p>
    <hr>
    <p class="mb-0">If you need help, feel free to leave a message in a <strong><a href="/user/{{ $user->id }}/account/writemessage">Write Message</a></strong> Section. Thank you.</p>
</div>
            <h1>IMPORTANT MESSAGE:</h1>
            <h5 style="font-weight: 500">Please take a picture of this QR Code or click the download button. This will serve as your receipt of your 2nd payment as we deliver the videoke. Thank You.</h6>
            <div class="text-center">
                        <div class="card qr mt-4">
                                <div class="card-body">
                                    <h4 class="card-title"><strong>QR Code:</strong></h4>
                                    <p class="card-text">

                                        {{-- Should Print --}}
                                        <qr-code user-Password="{{ $user->qr_code->qr_password }}"></qr-code>
                                        <a href="/qrcode/{{ $user->id }}/preview" class="btn btn-outline-primary">Preview</a>
                                        <a href="#" onclick="prepHref(this)" download class="btn btn-outline-secondary">Download QR Code</a>
                                </p>
                            </div>
                        </div>
            </div>
@elseif (($user->is_paid == 'Paid') && ($user->is_return == 'Return'))
            <h1><a href="">Reserve Again</a></h1>
@else
<div class="alert alert-danger notice" role="alert">
    <h4 class="alert-heading center"><strong>Notice</strong></h4>
    <hr>
    <h5 class="card-text">Hi {{ $user->first_name }},</h5>
    <p>If you want your reservation to officially reserved, you can now pay atleast <strong>{{ number_format($user->videoke->price / 2, 2, '.', ',') }} pesos </strong>on <strong>{{ $user->payment->name }}</strong> in order to operate your reservation. You only have 1 day for you to pay the first payment and if you will not be going to pay within 1 Day your reservation will not be operated anymore. Thank you.</p>
    <hr>
    <p class="mb-0">If you need help, feel free to leave a message in a <strong><a href="/user/{{ $user->id }}/account/writemessage">Write Message</a></strong> Section. Thank you.</p>
</div>
@endif

<script type="text/javascript">
    function prepHref(linkElement) {
        var myDiv = document.getElementById('Div_contain_image');
        var myImage = myDiv.children[0];
        linkElement.href = myImage.src;
    }
    </script>

@endsection