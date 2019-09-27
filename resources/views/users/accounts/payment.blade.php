@extends('layouts.users.user.app')

@section('title', 'Videoke | Payment')

@section('content')

@if  (($user->is_paid == 'Half Payment') || ($user->is_paid == 'Paid'))
<div class="alert alert-success" role="alert">
    <h4 class="alert-heading"><strong>Payment</strong></h4>
    <hr>
    <h5 class="card-text">Hi {{ $user->first_name }},</h5>
    <p>Your payment via {{ $user->payment->name }} has been successfully completed. Please wait for your <strong><a href="/user/{{ $user->id }}/account/reservation">Reservation Delivery Date</a></strong>. Thank you.</p>
    <hr>
    <p class="mb-0">If you need help, feel free to leave a message in a <strong><a href="/user/{{ $user->id }}/account/writemessage">Write Message</a></strong> Section. Thank you.</p>
</div>
<div class="card">
    <h5 class="card-header">Payment Details</h5>
        <div class="card-body">
            <p class="card-text"><strong>Videoke Package:</strong> {{ $user->videoke->name }}</p>
            @if (($user->is_paid == 'Half Payment') || ($user->is_paid == 'Paid'))
                <p class="card-text"><strong>First Payment:</strong> <span class="badge badge-pill badge-success" style="font-size: .9rem">Paid</span></p>
            @endif
            @if ($user->is_paid == 'Half Payment')
                <p class="card-text"><strong>Second Payment:</strong> <span class="badge badge-pill badge-warning" style="font-size: .9rem">Not Yet Paid</span></p>
            @elseif ($user->is_paid == 'Paid')
                <p class="card-text"><strong>Second Payment:</strong> <span class="badge badge-pill badge-success" style="font-size: .9rem">Paid</span></p>
            @endif
            <p class="card-text"><strong>Total Price:</strong> {{ number_format($user->videoke->price, 2, '.', ',') }} PHP</p>
            <p class="card-text"><strong>Payment:</strong> {{ $user->payment->name }}</p>
        </div>
</div>
@else
<div class="alert alert-danger notice" role="alert">
        <h4 class="alert-heading center"><strong>Notice</strong></h4>
        <hr>
        <h5 class="card-text">Hi {{ $user->first_name }},</h5>
        <p>If you want to pay <strong>{{ number_format($user->videoke->price / 2, 2, '.', ',') }}</strong> pesos on <strong>{{ $user->payment->name }}</strong> in order to operate your reservation. Copy the Account Number <strong>{{ $user->payment->account_number }}</strong> of <strong>{{ $user->payment->name }}</strong> and go to the nearest branch and send the transaction so we can assure that you are willing to reserve a videoke. Once we received your transaction we can now officially operate your order and wait for your reservation delivery date. Thank you.</p>
        <hr>
        <p class="mb-0">If you need help, feel free to leave a message in a <strong><a href="/user/{{ $user->id }}/account/writemessage">Write Message</a></strong> Section. Thank you.</p>
    </div>


@endif

@endsection