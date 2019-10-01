@extends('layouts.users.courier.app')

@section('title', 'Videoke | Courier Notification')

@section('content')

<div class="container pb-5">
    <div class="row">
        <div class="col-8">
            <h1>Notification For Delivery</h1>
        </div>
    </div>
    
    <div class="row pr-5">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Address</th>
                        <th>Reservation Delivery Date</th>
                        <th>Receipt</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @if ($delivery->count() == 0)
                        <td colspan="6" align="center"><b>No Videoke Delivery For This Moment</b></td>
                    @endif --}}
                    @foreach ($usersDelivery as $user)
                    @if (($user->is_paid == 'Half Payment') && ($user->checked_in_at->format('F d, Y') == $currentTime->format('F d, Y')))
                    <tr>
                        <td>{{ $user->id - 2 }}</td>
                        <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->address }}</td>
                        <td>{{ $user->check_format() }}</td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-8">
            <h1>Notification For Videoke Return</h1>
        </div>
    </div>

    <div class="row pb-5 pr-5">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Address</th>
                        <th>Videoke Return Date</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @if ($return->count() == 0)
                        <td colspan="6" align="center"><b>No Videoke Return For This Moment</b></td>
                    @endif --}}
                    @foreach ($usersReturn as $user)
                        @if (($user->is_paid == 'Paid') && ($user->date_return_notification() == $currentTime->format('F d, Y')))
                        <tr>
                            <td>{{ $user->id - 2 }}</td>
                            <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>{{ $user->address }}</td>
                            <td>{{ $user->date_return_format() }}</td>
                        </tr>
                        @elseif (($user->is_paid == 'Paid') && ($user->is_return == 'Return') && ($user->date_return_notification() == $currentTime->format('F d, Y')))
                        @endif
                        @endforeach
                        {{-- @if (count([$user->is_paid]) == 1)
                            <tr>
                                <td>hahaha</td>
                            </tr>
                        @endif --}}
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection