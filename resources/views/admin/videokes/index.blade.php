@extends('layouts.users.admin.app')

@section('title', 'Videoke | Admin Videoke')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8">
            <h1>Videoke List</h1>
        </div>
        <div class="col-4 d-flex justify-content-end align-items-baseline">
            <a href="/admin/videokes/create" class="btn btn-outline-primary">Add New Videoke</a>
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
                    <th>Name</th>
                    <th>Number</th>
                    <th>Price</th>
                    <th>Date Created</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($videokes as $videoke)
                    <tr>
                        <td width="10">{{ $videoke->id }}</td>
                        <td>{{ $videoke->name }}</td>
                        <td>{{ $videoke->number }}</td>
                        <td>{{ $videoke->price }}</td>
                        <td>{{ $videoke->created_at->diffForHumans() }}</td>
                        <td width="10">
                            <div class="btn-group">

                                <a href="/admin/videokes/{{ $videoke->id }}/edit" class="btn btn-outline-primary" style="margin: 4px;">Edit</a>
                                <form action="/admin/videokes/{{ $videoke->id }}" method="post">
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