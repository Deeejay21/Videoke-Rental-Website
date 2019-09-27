@extends('layouts.users.user.app')

@section('title', 'Videoke | Reservation')

@section('content')

<div class="card">
        <h5 class="card-header">Reservation Details</h5>
                    <div class="card-body">
                        <p class="card-text"><strong>Videoke Package:</strong> {{ $user->videoke->name }}</p>
                        <p class="card-text"><strong>Total Price:</strong> {{ number_format($user->videoke->price, 2, '.', ',') }} PHP</p>
                        <p class="card-text"><strong>Number of Rental:</strong> {{ $user->videoke->number }}</p>
                        <p class="card-text"><strong>Videoke Delivery Date:</strong> {{ $user->check_format() }}</p>
                        <p class="card-text"><strong>Videoke Return Date:</strong> {{ $user->date_return_format() }}</p>
                    </div>
    </div>

@endsection