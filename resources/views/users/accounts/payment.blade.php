@extends('layouts.users.user.app')

@section('title', 'Videoke | Payment')

@section('content')

@if ($user->is_paid == 'Paid')
<div class="alert alert-success" role="alert">
    <h4 class="alert-heading"><strong>Payment</strong></h4>
    <hr>
    <h5 class="card-text">Hi {{ $user->first_name }},</h5>
    <p>Your payment via {{ $user->payment->name }} has been successfully completed. Please wait for your Reservation Delivery Date. Thank you.</p>
    <hr>
    <p class="mb-0">If you need help, feel free to leave a message in a <strong><a href="/user/{{ $user->id }}/account/writemessage">Write Message</a></strong> Section. Thank you.</p>
</div>
@else
<div class="alert alert-danger notice" role="alert">
        <h4 class="alert-heading center"><strong>Notice</strong></h4>
        <hr>
        <h5 class="card-text">Hi {{ $user->first_name }},</h5>
        <p>If you want to pay {{ ($user->videoke->price) / 2 }} pesos on <strong>{{ $user->payment->name }}</strong> in order to operate your reservation. Copy the Account Number <strong>{{ $user->payment->account_number }}</strong> of <strong>{{ $user->payment->name }}</strong> and go to the nearest branch and send the transaction so we can assure that you are willing to reserve a videoke. Once we received your transaction we can now officially operate your order and wait for your reservation delivery date. Thank you.</p>
        <hr>
        <p class="mb-0">If you need help, feel free to leave a message in a <strong><a href="/user/{{ $user->id }}/account/writemessage">Write Message</a></strong> Section. Thank you.</p>
    </div>


@endif

@endsection