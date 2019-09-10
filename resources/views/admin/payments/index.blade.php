@extends('layouts.users.admin.app')

@section('title', 'Videoke | Admin Payments')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8">
            <h1>Payment List</h1>
        </div>
        <div class="col-4 d-flex justify-content-end align-items-baseline">
            <a href="/admin/payments/create" class="btn btn-outline-primary">Add New Payment</a>
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

        <table class="table table-bordered" id="table1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Account Number</th>
                    <th>Date Created</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($payments as $payment)
                    <tr>
                        <td>{{ $payment->id }}</td>
                        <td>{{ $payment->name }}</td>
                        <td>{{ $payment->account_number }}</td>
                        <td>{{ $payment->created_at->diffForHumans() }}</td>
                        <td width="10">
                            <div class="btn-group">
                                    <a href="/admin/payments/{{ $payment->id }}/edit" class="btn btn-outline-primary" style="margin: 4px;">Edit</a>
                                    <form action="/admin/payments/{{ $payment->id }}" method="post">
                                        @csrf
                                        @method('DELETE')
        
                                        <button type="submit" class="btn btn-outline-danger" style="margin: 4px;">Delete</button>
                                    </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
</div>
@endsection