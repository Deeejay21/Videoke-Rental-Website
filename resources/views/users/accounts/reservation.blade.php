@extends('layouts.users.user.app')

@section('title', 'Videoke | Reservation')

@section('content')

@include('layouts.users.admin.session')

@foreach ($user->another_reservation->reverse() as $another)
<div class="card mb-3">
    <div class="card-header d-flex bd-highlight">
        <h5 class="pt-1 flex-grow-1">Reservation Details</h5>
        @if ($another->is_paid == 'Paying' && $another->is_return == 'Operating')
            <div class=""><a href="/user/{{ $user->id }}/account/reserve-updates" class="btn btn-outline-primary btn-sm">Edit</a></div>
        @endif
    </div>
    <div class="card-body">
        <p class="card-text"><strong>Videoke Package:</strong> {{ $another->videoke->name }}</p>
        <p class="card-text"><strong>Total Price:</strong> {{ number_format($another->videoke->price, 2, '.', ',') }} PHP</p>
        <p class="card-text"><strong>Number of Rental:</strong> {{ $another->videoke->number }}</p>
        <p class="card-text"><strong>Videoke Delivery Date:</strong> {{ $another->reserve_format() }}</p>
        <p class="card-text"><strong>Videoke Return Date:</strong> {{ $another->reserve_return_format() }}</p>
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
        <h5 class="pt-1 flex-grow-1">Reservation Details</h5>
        @if ($user->is_paid == 'Paying')
            <div class=""><a href="/user/{{ $user->id }}/account/reserve-update" class="btn btn-outline-primary btn-sm">Edit</a></div>
        @endif
    </div>
    <div class="card-body">
        <p class="card-text"><strong>Videoke Package:</strong> {{ $user->videoke->name }}</p>
        <p class="card-text"><strong>Total Price:</strong> {{ number_format($user->videoke->price, 2, '.', ',') }} PHP</p>
        <p class="card-text"><strong>Number of Rental:</strong> {{ $user->videoke->number }}</p>
        <p class="card-text"><strong>Videoke Delivery Date:</strong> {{ $user->check_format() }}</p>
        <p class="card-text"><strong>Videoke Return Date:</strong> {{ $user->date_return_format() }}</p>
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