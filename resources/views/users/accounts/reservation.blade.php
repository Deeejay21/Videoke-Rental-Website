@extends('layouts.users.user.app')

@section('title', 'Videoke | Reservation')

@section('content')

<div class="card">
        <h5 class="card-header">Reservation</h5>
                    <div class="card-body">
                        <p class="card-text"><strong>Videoke Package:</strong> {{ $user->videoke->name }}</p>
                        <p class="card-text"><strong>Price:</strong> {{ $user->videoke->price }}.00 PHP</p>
                        <p class="card-text"><strong>Payment:</strong> {{ $user->payment->name }}</p>
                        <p class="card-text"><strong>Delivery Date:</strong> {{ $user->checked_in_at->format('F d, Y g:i A') }}</p>
                        <p class="card-text"><strong>Number of Rental:</strong> {{ $user->videoke->number }}</p>
            </div>
    </div>

@endsection