@extends('layouts.users.courier.app-panel')

@section('upper-extends')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">    
@endsection

@section('title', 'Customer Edit')

@section('sidebar')
<div id="layout-sidenav" class="layout-sidenav sidenav sidenav-vertical bg-dark">
    <div class="app-brand demo">
        <span class="app-brand-logo demo">
            <img src="{{ asset('assets/img/logo-mic.png') }}" alt="Brand Logo" class="img-fluid">
        </span>
        <a href="/courier" class="app-brand-text demo sidenav-text font-weight-normal ml-2">Courier <strong>PANEL</strong></a>
        <a href="javascript:" class="layout-sidenav-toggle sidenav-link text-large ml-auto">
            <i class="ion ion-md-menu align-middle"></i>
        </a>
    </div>
    <div class="sidenav-divider mt-0"></div>
    <ul class="sidenav-inner py-1">
        <!-- Dashboards -->
        <li class="sidenav-item">
            <a href="/courier" class="sidenav-link">
                <i class="sidenav-icon feather icon-home"></i>
                <div>Dashboard</div>
            </a>
        </li>

        <!-- Notification -->
        <li class="sidenav-item">
            <a href="/courier/notification" class="sidenav-link">
                    <i class="sidenav-icon feather icon-bell"></i>
                <div>Notification</div>
            </a>
        </li>

        <!-- Customers -->
        <li class="sidenav-item active">
            <a href="/courier/customers" class="sidenav-link">
                    <i class="sidenav-icon feather icon-user"></i>
                <div>Customers</div>
            </a>
        </li>
    </ul>
</div>
@endsection

@section('content')
<h4 class="font-weight-bold pb-3 mb-0">Edit Customer Access for {{ $user->first_name }} {{ $user->last_name }}</h4>
<div class="text-muted small mt-0 mb-4 d-block breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/courier"><i class="feather icon-home"></i></a></li>
        <li class="breadcrumb-item active">Customers</li>
        <li class="breadcrumb-item active">Status</li>
        <li class="breadcrumb-item active">Edit</li>
    </ol>
</div>

<div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Customer</div>

                <div class="card-body">
                    <form method="POST" action="{{ $user->path_courier() }}">
                        @method('PATCH')
                        @csrf

                        @if (auth()->user()->usertype == 'Admin')
                        <div class="form-group row">
                            <label for="usertype" class="col-md-4 col-form-label text-md-right">User Type</label>
                            
                            <div class="col-md-6">
                                <select id="usertype" class="form-control" required name="usertype" autocomplete="usertype" autofocus>
                                    <option>{{ $user->usertype }}</option>
                                    <option value="User">User</option>
                                    <option value="Courier">Courier</option>
                                    <option value="Admin">Admin</option>
                                </select>
                            </div>
                        </div>
                        {{-- @endif --}}

                        {{-- @if ($user->is_paid == 'Paid')
                        @else --}}
                        <div class="form-group row">
                            <label for="is_paid" class="col-md-4 col-form-label text-md-right">Payment Status</label>

                            <div class="col-md-6">
                                <select id="is_paid" class="form-control"  name="is_paid" autocomplete="is_paid" autofocus>
                                    @if ($user->is_paid == 'Paid')
                                    <option>{{ $user->is_paid }}</option>
                                    @else
                                    <option value="Paying">Paying</option>
                                    <option value="Half Payment">Half Payment</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        {{-- @endif --}}
                        
                        {{-- @if ($user->usertype == 'Admin') --}}
                            
                        <div class="form-group row">
                            <label for="is_expired" class="col-md-4 col-form-label text-md-right">Account Status</label>

                            <div class="col-md-6">
                                <select id="is_expired" class="form-control" required name="is_expired" autocomplete="is_expired" autofocus>
                                    <option>{{ $user->is_expired }}</option>
                                    <option value="Active">Active</option>
                                    <option value="Expired">Expired</option>
                                </select>
                            </div>
                        </div>
                        @endif
                        
                        <div class="form-group row">
                            <label for="is_return" class="col-md-4 col-form-label text-md-right">Videoke Status</label>

                            <div class="col-md-6">
                                <select id="is_return" class="form-control" required name="is_return" autocomplete="is_return" autofocus>
                                    @if ($user->is_paid == 'Paid')
                                    <option>{{ $user->is_return }}</option>
                                    <option value="Return">Return</option>
                                    @endif
                                    <option value="Operating">Operating</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 text-center">
                                <div class="btn-group btn-group-md">
                                    <button type="submit" class="btn btn-outline-primary">Edit Payment</button>
                                    <a href="{{ $user->path_courier() }}" class="btn btn-outline-secondary ml-4">Back</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@section('lower-extends')
<script src="{{ asset('js/submit.js') }}"></script>

<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#table2').DataTable( {
            "scrollX": true
        } );
    } );
</script>
@endsection
@endsection