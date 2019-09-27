@extends('layouts.users.courier.app')

@section('title', 'Videoke | Courier Customers')

@section('content')
    
    <div class="container">
        <div class="row">
            <div class="col-8">
                <h2>QR Code Confirmation for {{ $user->first_name }} {{ $user->last_name }}</h2>
            </div>
            <div class="col-4 d-flex justify-content-end align-items-baseline">
                {{-- <a href="/admin/customers/access" class="btn btn-outline-primary">Customer Access</a> --}}
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

        <form action="/courier/customers/{{ $user->id }}/access" method="post">
            @csrf

                    <div class="row pb-5">
                        <div class="col-md-8 pt mb-2">
                            <div class="card">
                                <div class="card-header">QR Code Confirmation</div>
                                <div class="card-body">
                                    <input type="hidden" value="Paid" class="form-control" name="is_paid">

                                    <webcam-reader></webcam-reader>
    
                                    <file-reader></file-reader>

                                    <p style="color: red; font-weight: bold;">{{ $errors->first('qr_password') }}</p>
                            
                                    <button type="submit" class="btn btn-outline-secondary">Confirm</button>
                                    <a href="/courier/customers/{{ $user->id }}/access" class="btn btn-outline-secondary">Back</a>
                                </div>
                            </div>
                        </div>
                    </div>
    
        </form>

    </div>

@endsection