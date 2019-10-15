@extends('layouts.users.courier.app-receipt')

@section('content')

<div class="row">
    <div class="col-md-12 text-center">
        <div class="btn-group btn-group-md">
            <a target="_blank" @click.prevent="printme" class="btn btn-outline-primary no-print mb-4" href="">Print</a>
            <a class="btn btn-outline-secondary no-print ml-2 mb-4" href="/courier/notification">Back</a>
        </div>
    </div>
</div>

<h1 align="center">Videoke Rental Website</h1>

<div class="row" style="padding-top: 6rem">
    <div class="col-md-4">
        <h3>Customer Information</h3>
        <span><strong>Name:</strong> {{ $user->first_name }} {{ $user->last_name }}</span> 
        <br>
        <span><strong>Address:</strong> {{ $user->address }}</span>
        <br>
        <span><strong>Gender:</strong> {{ $user->gender }}</span>
        <br>
        <span><strong>Age:</strong> {{ $user->age }}</span>
        <br>
        <span><strong>Email:</strong> {{ $user->email }}</span>
        <br>
        <span><strong>Contact Number:</strong> {{ $user->phone }}</span>
    </div>
    <div class="col-md-5">
        <h3>Reservation Details</h3>
        <span><strong>Videoke Package:</strong> {{ $user->videoke->name }}</span> 
        <br>
        <span><strong>Number of Rental:</strong> {{ $user->videoke->number }}</span>
        <br>
        <span><strong>Videoke Delivery Date:</strong> {{ $user->check_format() }}</span>
        <br>
        <span><strong>Videoke Return Date:</strong> {{ $user->date_return_format() }}</span>
        <br>
        <span><strong>Total Price:</strong> ₱{{ number_format($user->videoke->price, 2, '.', ',') }}</span>
    </div>
    <div class="col-md-3">
        <h3>Payment Method</h3>
        <span><strong>Payment Name:</strong> {{ $user->payment->name }}</span>
    </div>
</div>

@section('lower-extends')
<script src="{{ asset('js/submit.js') }}"></script>
@endsection

@endsection