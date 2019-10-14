@extends('layouts.users.user.app')

@section('title', 'Videoke | Payment')

@section('content')

@include('layouts.users.admin.session')

@if (($user->is_paid == 'Paid' && $user->is_return == 'Return'))
@if ($anotherPaying->count() == 1)
<div class="alert alert-danger notice" role="alert">
    <h4 class="alert-heading center"><strong>Notice</strong></h4>
    <hr>
    <h5 class="card-text">Hi {{ $user->first_name }}! It's nice to see you again,</h5>
    @foreach ($anotherPaying as $paying)
        
    <p>If you want your reservation to officially reserved, you can now pay atleast <strong>{{ number_format($paying->videoke->price / 2, 2, '.', ',') }} pesos </strong>on <strong>{{ $paying->payment->name }}</strong> in order to operate your reservation. You only have 1 day for you to pay the first payment and if you will not be going to pay within 1 Day your reservation will not be operated anymore. Thank you.</p>
    @endforeach
    <hr>
    <p class="mb-0">If you need help, feel free to leave a message in a <strong><a href="/user/{{ $user->id }}/account/writemessage">Write Message</a></strong> Section. Thank you.</p>
</div>
@endif
@endif

@if (($user->is_paid == 'Paid' && $user->is_return == 'Return'))
@if ($anotherHalf->count() == 1)
<div class="alert alert-success paid" role="alert">
        <h4 class="alert-heading center"><strong>Videoke Rental</strong></h4>
        <hr>
        <h5 class="card-text">Hi {{ $user->first_name }},</h5>
    <p>I hope we accompany you to your reservation. Please wait for your <a href="/user/{{ $user->id }}/account/reservation"><strong>reservation delivery date</strong></a>. Thank you.</p>
        <hr>
        <p class="mb-0">If you need help, feel free to leave a message in a <strong><a href="/user/{{ $user->id }}/account/writemessage">Write Message</a></strong> Section. Thank you.</p>
    </div>
@endif
@endif

@if (($user->is_paid == 'Paid' && $user->is_return == 'Return'))
@if ($anotherPaid->count() == 1)
<div class="alert alert-success notice" role="alert">
    <h4 class="alert-heading center"><strong>Videoke Rental</strong></h4>
    <hr>
    <h5 class="card-text">Hi {{ $user->first_name }},</h5>
    <p>Thank you for your payment. Your transaction has been completed. Please enjoy your videoke.</p>
    <hr>
    <p class="mb-0">If you need help, feel free to leave a message in a <strong><a href="/user/{{ $user->id }}/account/writemessage">Write Message</a></strong> Section. Thank you.</p>
</div>
@endif
@endif

@if (($user->is_paid == 'Paid' && $user->is_return == 'Return'))
@if (($anotherPaidReturn->count() == $anotherPaidReturnCount) && ($anotherPaying->count() == 0) && ($anotherHalf->count() == 0) && ($anotherPaid->count() == 0))
<div class="alert alert-success notice" role="alert">
    <h4 class="alert-heading center"><strong>Videoke Rental Website</strong></h4>
    <hr>
    <h5 class="card-text">Hi {{ $user->first_name }},</h5>
    <p>Thank you for giving us the opportunity to serve you. We appreciate your business and the confidence you have placed in us. Please <a href="/user/{{ $user->id }}/account/writemessage"><strong>message us</strong></a> if we can be of further assistance or if you want to rent again just click <a href="/reserve/register"><strong>here</strong></a>.</p>
</div>
<div class="text-center">
    <h1><a href="/reserve/register">Reserve Again</a></h1>
</div>
@endif
@endif


@if ($user->is_paid == 'Paying' && $user->is_return == 'Operating')
<div class="alert alert-danger notice" role="alert">
    <h4 class="alert-heading center"><strong>Notice</strong></h4>
    <hr>
    <h5 class="card-text">Hi {{ $user->first_name }},</h5>
    <p>If you want your reservation to officially reserved, you can now pay atleast <strong>{{ number_format($user->videoke->price / 2, 2, '.', ',') }} pesos </strong>on <strong>{{ $user->payment->name }}</strong> in order to operate your reservation. You only have 1 day for you to pay the first payment and if you will not be going to pay within 1 Day your reservation will not be operated anymore. Thank you.</p>
    <hr>
    <p class="mb-0">If you need help, feel free to leave a message in a <strong><a href="/user/{{ $user->id }}/account/writemessage">Write Message</a></strong> Section. Thank you.</p>
</div>
@endif

@if (($user->is_paid == 'Half Payment') && ($user->is_return == 'Operating'))
<div class="alert alert-success paid" role="alert">
    <h4 class="alert-heading center"><strong>Welcome to Videoke Rental Website</strong></h4>
    <hr>
    <h5 class="card-text">Hi {{ $user->first_name }},</h5>
    <p>I hope we accompanied you to your reservation. Please wait for your reservation delivery date. Thank you.</p>
    <hr>
    <p class="mb-0">If you need help, feel free to leave a message in a <strong><a href="/user/{{ $user->id }}/account/writemessage">Write Message</a></strong> Section. Thank you.</p>
</div>
@endif

@if (($user->is_paid == 'Paid') && ($user->is_return == 'Operating'))
<div class="alert alert-success notice" role="alert">
    <h4 class="alert-heading center"><strong>Videoke Rental Website</strong></h4>
    <hr>
    <h5 class="card-text">Hi {{ $user->first_name }},</h5>
    <p>Thank you for your payment. Your transaction has been completed. Please enjoy your videoke.</p>
    <hr>
    <p class="mb-0">If you need help, feel free to leave a message in a <strong><a href="/user/{{ $user->id }}/account/writemessage">Write Message</a></strong> Section. Thank you.</p>
</div>
@endif

{{-- @foreach ($user->another_reservation->reverse() as $another) --}}
@foreach ($user->another_reservation as $another)
<div class="card mb-3">
        <div class="card-header d-flex bd-highlight">
            <h5 class="pt-1 flex-grow-1">Payment Details</h5>
            @if ($another->is_paid == 'Paying' && $another->is_return == 'Operating')
                <div class=""><a href="/user/{{ $user->id }}/account/payment-updates" class="btn btn-outline-primary btn-sm">Edit</a></div>
            @endif
        </div>
        <div class="card-body">
            <p class="card-text"><strong>Videoke Package:</strong> {{ $another->videoke->name }}</p>
            @if (($another->is_paid == 'Half Payment') || ($another->is_paid == 'Paid'))
                <p class="card-text"><strong>First Payment:</strong> <span class="badge badge-pill badge-success" style="font-size: .8rem">Paid</span></p>
            @endif
            @if ($another->is_paid == 'Half Payment')
                <p class="card-text"><strong>Second Payment:</strong> <span class="badge badge-pill badge-warning" style="font-size: .8rem">Not Yet Paid</span></p>
            @elseif ($another->is_paid == 'Paid')
                <p class="card-text"><strong>Second Payment:</strong> <span class="badge badge-pill badge-success" style="font-size: .8rem">Paid</span></p>
            @endif
            <p class="card-text"><strong>Total Price:</strong> {{ number_format($another->videoke->price, 2, '.', ',') }} PHP</p>
            <p class="card-text"><strong>Payment:</strong> {{ $another->payment->name }}</p>
            @if (($another->is_paid == 'Paid') && ($another->is_return == 'Return'))
                <p class="card-text"><strong>Reservation Status:</strong> <span class="badge badge-pill badge-success" style="font-size: .8rem">Completed</span></p>
            @elseif (($another->is_paid == 'Half Payment') && ($another->is_return == 'Operating'))
                <p class="card-text"><strong>Reservation Status:</strong> <span class="badge badge-pill badge-warning" style="font-size: .8rem">Incomplete</span></p>
            @elseif (($another->is_paid == 'Paid') && ($another->is_return == 'Operating'))
                <p class="card-text"><strong>Reservation Status:</strong> <span class="badge badge-pill badge-info" style="font-size: .8rem">Videoke Not Yet Return</span></p>
            @else
                <p class="card-text"><strong>Reservation Status:</strong> <span class="badge badge-pill badge-danger" style="font-size: .8rem">Paying</span></p>
            @endif
        </div>
</div>
@endforeach

<div class="card">
    <div class="card-header d-flex bd-highlight">
        <h5 class="pt-1 flex-grow-1">Payment Details</h5>
        @if ($user->is_paid == 'Paying')
            <div class=""><a href="/user/{{ $user->id }}/account/payment-update" class="btn btn-outline-primary btn-sm">Edit</a></div>
        @endif
    </div>
        <div class="card-body">
            <p class="card-text"><strong>Videoke Package:</strong> {{ $user->videoke->name }}</p>
            @if (($user->is_paid == 'Half Payment') || ($user->is_paid == 'Paid'))
                <p class="card-text"><strong>First Payment:</strong> <span class="badge badge-pill badge-success" style="font-size: .8rem">Paid</span></p>
            @endif
            @if ($user->is_paid == 'Half Payment')
                <p class="card-text"><strong>Second Payment:</strong> <span class="badge badge-pill badge-warning" style="font-size: .8rem">Not Yet Paid</span></p>
            @elseif ($user->is_paid == 'Paid')
                <p class="card-text"><strong>Second Payment:</strong> <span class="badge badge-pill badge-success" style="font-size: .8rem">Paid</span></p>
            @endif
            <p class="card-text"><strong>Total Price:</strong> {{ number_format($user->videoke->price, 2, '.', ',') }} PHP</p>
            <p class="card-text"><strong>Payment:</strong> {{ $user->payment->name }}</p>
            @if (($user->is_paid == 'Paid') && ($user->is_return == 'Return'))
                <p class="card-text"><strong>Reservation Status:</strong> <span class="badge badge-pill badge-success" style="font-size: .8rem">Completed</span></p>
            @elseif (($user->is_paid == 'Half Payment') && ($user->is_return == 'Operating'))
                <p class="card-text"><strong>Reservation Status:</strong> <span class="badge badge-pill badge-warning" style="font-size: .8rem">Incomplete</span></p>
            @elseif (($user->is_paid == 'Paid') && ($user->is_return == 'Operating'))
                <p class="card-text"><strong>Reservation Status:</strong> <span class="badge badge-pill badge-info" style="font-size: .8rem">Videoke Not Yet Return</span></p>
            @else
                <p class="card-text"><strong>Reservation Status:</strong> <span class="badge badge-pill badge-danger" style="font-size: .8rem">Paying</span></p>
            @endif
        </div>
</div>

@endsection