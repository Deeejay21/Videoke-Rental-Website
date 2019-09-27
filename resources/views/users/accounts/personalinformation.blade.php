@extends('layouts.users.user.app')

@section('title', 'Videoke | Personal Information')

@section('content')

    <div class="card">
        <h5 class="card-header">Personal Information</h5>
                    <div class="card-body">
                        <p class="card-text"><strong>First Name:</strong> {{ $user->first_name }}</p>
                        <p class="card-text"><strong>Last Name:</strong> {{ $user->last_name }}</p>
                        <p class="card-text"><strong>Address:</strong> Null</p>
                        <p class="card-text"><strong>Age:</strong> {{ $user->age }}</p>
                        <p class="card-text"><strong>Gender:</strong> {{ $user->gender }}</p>
                        <p class="card-text"><strong>Email:</strong> {{ $user->email }}</p>
                        <p class="card-text"><strong>Phone Number:</strong> {{ $user->phone }}</p>
            </div>
    </div>

@endsection