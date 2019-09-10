@extends('layouts.users.courier.app')

@section('title', 'Videoke | Courier Notification')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8">
            <h1>Notification For Videoke Return</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            @if (session()->has('success'))
            <a class="nav-link" href="">
                <div class="alert alert-success text-center" role="alert">
                    <strong>Success!</strong> {{ session()->get('success') }}
                </div>
            </a>
            @elseif (session()->has('update'))
            <a class="nav-link" href="">
                <div class="alert alert-primary text-center" role="alert">
                    <strong>Updated!</strong> {{ session()->get('update') }}
                </div>
            </a>
            @elseif (session()->has('delete'))
            <strong class="nav-link" href="">
                <div class="alert alert-danger text-center" role="alert">
                    <strong>Deleted!</strong> {{ session()->get('delete') }}
                </div>
            </a>
            @endif
        </div>
        <div class="col-2"></div>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Phone Number</th>
                    <th>Reservation Delivery Date</th>
                    <th>Videoke Return Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                {{-- ($paymentDate >= $contractDateBegin) && ($paymentDate <= $contractDateEnd) --}}
                    @if (($user->is_paid == 'Paid') && ($user->date_return_notification() == $currentTime))
                        
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                        <td>{{ $user->address }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->checked_in_at->format('F d, Y g:i A') }}</td>
                        <td>{{ $user->date_return() }}</td>
                        <td>{{ $user->created_at->diffForHumans() }}</td>
                        <td width="10">
                            <div class="btn-group">
                            {{-- <a href="/admin/payments/{{ $payment->id }}/edit" class="btn btn-outline-primary" style="margin: 4px;">Edit</a>
                                <form action="/admin/payments/{{ $payment->id }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    
                                    <button type="submit" class="btn btn-outline-danger" style="margin: 4px;">Delete</button>
                                </form> --}}
                            </div>
                        </td>
                    </tr>
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

<div class="container">
        <div class="row">
            <div class="col-8">
                <h1>Notification For Delivery</h1>
            </div>
        </div>
    
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
                @if (session()->has('success'))
                <a class="nav-link" href="">
                    <div class="alert alert-success text-center" role="alert">
                        <strong>Success!</strong> {{ session()->get('success') }}
                    </div>
                </a>
                @elseif (session()->has('update'))
                <a class="nav-link" href="">
                    <div class="alert alert-primary text-center" role="alert">
                        <strong>Updated!</strong> {{ session()->get('update') }}
                    </div>
                </a>
                @elseif (session()->has('delete'))
                <strong class="nav-link" href="">
                    <div class="alert alert-danger text-center" role="alert">
                        <strong>Deleted!</strong> {{ session()->get('delete') }}
                    </div>
                </a>
                @endif
            </div>
            <div class="col-2"></div>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Phone Number</th>
                        <th>Reservation Delivery Date</th>
                        <th>Videoke Return Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    {{-- ($paymentDate >= $contractDateBegin) && ($paymentDate <= $contractDateEnd) --}}
                        @if (($user->is_paid == 'Paid') && ($user->checked_in_at->format('F d, Y') == $currentTime))
                            
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                            <td>{{ $user->address }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>{{ $user->checked_in_at->format('F d, Y g:i A') }}</td>
                            <td>{{ $user->date_return() }}</td>
                            <td>{{ $user->created_at->diffForHumans() }}</td>
                            <td width="10">
                                <div class="btn-group">
                                {{-- <a href="/admin/payments/{{ $payment->id }}/edit" class="btn btn-outline-primary" style="margin: 4px;">Edit</a>
                                    <form action="/admin/payments/{{ $payment->id }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        
                                        <button type="submit" class="btn btn-outline-danger" style="margin: 4px;">Delete</button>
                                    </form> --}}
                                </div>
                            </td>
                        </tr>
                        @endif
                        @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection