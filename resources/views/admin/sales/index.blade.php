@extends('layouts.users.admin.app')

@section('title', 'Videoke | Admin Videoke')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8">
            <h1>Sales</h1>
        </div>
        <div class="col-4 d-flex justify-content-end align-items-baseline">
            {{-- <a href="/admin/videokes/create" class="btn btn-outline-primary">Add New Videoke</a> --}}
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
                <tr class="text-center">
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Amount</th>
                    <th>Date Created</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td width="10">{{ $user->id }}</td>
                        <td>{{ $user->first_name }}</td>
                        <td>{{ $user->last_name }}</td>
                        <td>{{ $user->videoke->price }}</td>
                        <td>{{ $user->created_at->format('F/d/Y' . ' (' . 'D' . ')') }} - {{ $user->created_at->diffForHumans() }}</td>
                        <td width="10">
                            <div class="btn-group">

                                <a href="/admin/report" class="btn btn-outline-danger" style="margin: 4px;">PDF</a>
                                <a href="/admin/report" class="btn btn-outline-success" style="margin: 4px;">Excel</a>
                                <a href="/admin/report" class="btn btn-outline-primary" style="margin: 4px;">Print</a>
                                {{-- <form action="/admin/videokes/{{ $videoke->id }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    
                                    <button type="submit" class="btn btn-outline-danger" style="margin: 4px;">Delete</button>
                                </form> --}}
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
</div>
@endsection