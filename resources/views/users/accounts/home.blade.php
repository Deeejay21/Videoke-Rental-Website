@extends('layouts.users.user.app')

@section('title', 'Videoke | Home')

@section('content')

@if ( $user->is_paid == 'Paid')
<div class="alert alert-success paid" role="alert">
    <h4 class="alert-heading center"><strong>Welcome to Videoke Rental Website</strong></h4>
    <hr>
    <h5 class="card-text">Hi {{ $user->first_name }},</h5>
    <p>I hope we accompanied you to your reservation. Please wait for your reservation delivery date. Thank you.</p>
    <hr>
    <p class="mb-0">If you need help, feel free to leave a message in a <strong><a href="/user/{{ $user->id }}/account/writemessage">Write Message</a></strong> Section. Thank you.</p>
</div>
            <h1 class="im">IMPORTANT MESSAGE:</h1>
            <h3 class="ins">Please take a picture of this QR Code. This will serve as receipt as we deliver the videoke. Thank You.</h3>
            <div class="text-center">
                        <div class="card qr mt-4">
                                <div class="card-body">
                                    <h4 class="card-title"><strong>QR Code:</strong></h4>
                                    <p class="card-text">
                                        @php
                                            echo $qrCode->writeString();
                                        @endphp
                                </p>
                            </div>
                        </div>
            </div>
@else
<div class="alert alert-danger notice" role="alert">
    <h4 class="alert-heading center"><strong>Notice</strong></h4>
    <hr>
    <h5 class="card-text">Hi {{ $user->first_name }},</h5>
    <p>If you want your reservation to officially reserved, you can now pay atleast <strong>{{ ($user->videoke->price) / 2 }} pesos </strong>on <strong>{{ $user->payment->name }}</strong> in order to operate your reservation. You only have 1 day for you to pay the first payment and if you will not be going to pay within 1 Day your reservation will not be operated anymore. Thank you.</p>
    <hr>
    <p class="mb-0">If you need help, feel free to leave a message in a <strong><a href="/user/{{ $user->id }}/account/writemessage">Write Message</a></strong> Section. Thank you.</p>
</div>
@endif

@endsection