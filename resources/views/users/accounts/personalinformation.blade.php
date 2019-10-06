@extends('layouts.users.user.app')

@section('title', 'Videoke | Personal Information')

@section('content')

@include('layouts.users.admin.session')

<div class="card">
    <div class="card-header d-flex bd-highlight">
        <h5 class="pt-1 flex-grow-1">Personal Details</h5>
        @if (($user->is_paid == 'Paying') || ($user->is_paid == 'Paid' && $user->is_return == 'Return'))
            @if (($anotherPaying->count() == 1 && $anotherOperating->count() == 1 && $anotherPaidReturn->count() == $anotherPaidReturn->count()))
                <div class=""><a href="/user/{{ $user->id }}/account/edit" class="btn btn-outline-primary btn-sm">Edit</a></div>
            @endif
            @if ($anotherPaidReturn->count() == $another)
                <div class=""><a href="/user/{{ $user->id }}/account/edit" class="btn btn-outline-primary btn-sm">Edit</a></div>
            @endif
        @endif
    </div>
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