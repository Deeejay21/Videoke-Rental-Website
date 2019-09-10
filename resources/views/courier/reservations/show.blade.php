@extends('layouts.users.admin.app')

@section('title', 'Videoke | Admin Customer Details')

@section('content')
    
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Customer Details of {{ $user->first_name }} {{ $user->last_name }}</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                    <div class="card-body">
                            <p class="card-text"><strong>First Name:</strong> {{ $user->first_name }}</p>
                            <p class="card-text"><strong>Last Name:</strong> {{ $user->last_name }}</p>
                            <p class="card-text"><strong>Address:</strong> Null</p>
                            <p class="card-text"><strong>Age:</strong> {{ $user->age }}</p>
                            <p class="card-text"><strong>Gender:</strong> {{ $user->gender }}</p>
                            <p class="card-text"><strong>Email:</strong> {{ $user->email }}</p>
                            <p class="card-text"><strong>Phone Number:</strong> {{ $user->phone }}</p>
                            <p class="card-text"><strong>Payment:</strong> {{ $user->payment->name }}</p>
                            <p class="card-text"><strong>Videoke:</strong> {{ $user->videoke->name }}</p>
                            <a href="/courier/reservations" class="btn btn-outline-secondary">Back</a>
                        </div>
            </div>
        </div>
    </div>

@endsection