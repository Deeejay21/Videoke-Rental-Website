@extends('layouts.users.courier.app')

@section('title', 'Videoke | Courier Customers')

@section('content')
    
    <div class="container">
        <div class="row">
            <div class="col-8">
                <h1>Customer Access for {{ $user->first_name }} {{ $user->last_name }}</h1>
            </div>
            <div class="col-4 d-flex justify-content-end align-items-baseline">
                {{-- <a href="/admin/customers/access" class="btn btn-outline-primary">Customer Access</a> --}}
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <p><strong>Contact Number:</strong> {{ $user->phone }}</p>
                <p><strong>Email:</strong> {{ $user->email }}</p>
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
                    <tr class="text-center">
                        <th>ID</th>
                        <th>User Type</th>
                        <th>Payment Status</th>
                        <th>Account Status</th>
                        <th>Videoke Status</th>
                        <th>Customer Created</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                        <tr>
                            <td>{{ $user->id }}</td>
                            @if ( $user->usertype == 'Admin')
                                <td><h5><span class="badge badge-pill badge-info">{{ $user->usertype }}</span></h5></td>
                            @else
                                <td><h5><span class="badge badge-pill badge-secondary">{{ $user->usertype }}</span></h5></td>
                            @endif
                            @if ($user->is_paid == 'Paid')
                                <td><h5><span class="badge badge-pill badge-success">{{ $user->is_paid }}</span></h5></td>
                            @else
                                <td><h5><span class="badge badge-pill badge-warning">{{ $user->is_paid }}</span></h5></td>
                            @endif
                            @if ( $user->is_expired == 'Active' )
                                <td><h5><span class="badge badge-pill badge-success">{{ $user->is_expired }}</span></h5></td>
                            @else
                                <td><h5><span class="badge badge-pill badge-danger">{{ $user->is_expired }}</span></h5></td>
                            @endif
                            @if ($user->is_return == 'Return')
                                <td><h5><span class="badge badge-pill badge-secondary">{{ $user->is_return }}</span></h5></td>
                            @elseif ($user->is_return == 'Operating')
                                <td><h5><span class="badge badge-pill badge-warning">{{ $user->is_return }}</span></h5></td>
                            @else
                                <td><h5><span class="badge badge-pill badge-success">{{ $user->is_return }}</span></h5></td>
                            @endif
                            <td>{{ $user->created_at->format('F/d/Y' . ' (' . 'D' . ')') }} - {{ $user->created_at->diffForHumans() }}</td>
                            <td><a href="/courier/customers/{{ $user->id }}/access/edit" class="btn btn-outline-primary m-1">Edit</a></td>
                        </tr>
                </tbody>
            </table>
        </div>

        <div class="row">
            <div class="col-12">
                <a href="/courier/customers" class="btn btn-outline-secondary">Back</a>
            </div>
        </div>
    </div>

@endsection