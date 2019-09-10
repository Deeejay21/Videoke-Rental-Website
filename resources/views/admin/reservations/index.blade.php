@extends('layouts.users.admin.app')

@section('title', 'Videoke | Admin Reservation')

@section('content')
    
    <div class="row">
        <div class="col-12">
            <h1>Reservation List</h1>
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

    <div class="row pr-5">
        <div class="col-12">
                <div class="table-responsive">
                        <table class="table table-bordered" id="table1">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Customer Name</th>
                                    <th>Payment</th>
                                    <th>Videoke Order</th>
                                    <th>Reservation Delivery Date</th>
                                    <th>Reservation Return Date</th>
                                    <th>Videoke Status</th>
                                    <th>Reservation Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td><a href="/admin/reservations/{{ $user->id }}/show">{{ $user->first_name }} {{ $user->last_name }}</a></td>
                                        <td>{{ $user->payment->name }}</td>
                                        <td>{{ $user->videoke->name }}</td>
                                        <td>{{ $user->checked_in_at->format('F d, Y g:i A') }}</td>
                                        <td>{{ $user->date_return() }}</td>
                                        <td>Returned && Operating</td>
                                        {{-- @if ($user->is_paid == 'Paid')
                                            <td><h5><span class="badge badge-pill badge-success">{{ $user->is_paid }}</span></h5></td>
                                        @else
                                            <td><h5><span class="badge badge-pill badge-warning">{{ $user->is_paid }}</span></h5></td>
                                        @endif --}}
                                        @if ($user->is_paid == 'Paid')
                                            <td><h5><span class="badge badge-pill badge-success">{{ $user->is_paid }}</span></h5></td>
                                        @else
                                            <td><h5><span class="badge badge-pill badge-warning">{{ $user->is_paid }}</span></h5></td>
                                        @endif
                                        {{-- <td width="10"><a href="/admin/payments/{{ $payment->id }}/edit" class="btn btn-outline-primary m-1">Edit</a>
                                            <form action="/admin/payments/{{ $payment->id }}" method="post">
                                                @csrf
                                                @method('DELETE')
                
                                                <button type="submit" class="btn btn-outline-danger">Delete</button>
                                            </form>
                                        </td> --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
        </div>
    </div>

@endsection