@extends('layouts.users.courier.app-panel')

@section('upper-extends')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">    
@endsection

@section('title', 'Customers')

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
<h4 class="font-weight-bold pb-3 mb-0">Customers</h4>
<div class="text-muted small mt-0 mb-4 d-block breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/courier"><i class="feather icon-home"></i></a></li>
        <li class="breadcrumb-item active">Customers</li>
    </ol>
</div>

@include('layouts.users.admin.session')

<table class="table table-bordered" id="table2">
        <thead>
            <tr class="text-center">
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Gender</th>
                <th>Age</th>
                <th>Contact Number</th>
                <th>Email</th>
                <th>Videoke Order</th>
                <th>Videoke Delivery Date</th>
                <th>Videoke Videoke Return Date</th>
                <th>Customer Registered Date</th>
                <th>Payment Status</th>
                <th>Videoke Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id - 2}}</td>
                    <td>{{ $user->first_name }}</td>
                    <td>{{ $user->last_name }}</td>
                    <td>{{ $user->gender }}</td>
                    <td>{{ $user->age }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->videoke->name }}</td>
                    <td>{{ $user->check_format() }}</td>
                    <td>{{ $user->date_return_format() }}</td>
                    <td>{{ $user->created_at->format('F d, Y (D) - g:i A') }} - {{ $user->created_at->diffForHumans() }}</td>
                    @if ($user->is_paid == 'Paid')
                        <td><h5><span class="badge badge-pill badge-success">{{ $user->is_paid }}</span></h5></td>
                    @else
                        <td><h5><span class="badge badge-pill badge-warning">{{ $user->is_paid }}</span></h5></td>
                    @endif
                    @if ( $user->is_return == 'Return')
                        <td><h5><span class="badge badge-pill badge-success">{{ $user->is_return }}</span></h5></td>
                    @else
                        <td><h5><span class="badge badge-pill badge-warning">{{ $user->is_return }}</span></h5></td>
                    @endif
                    <td>
                        <div class="btn-group">
                            <a href="/courier/customers/{{ $user->id }}/access" class="btn btn-outline-success" style="margin: 4px;">Status</a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@section('lower-extends')
<script src="{{ asset('js/submit.js') }}"></script>

<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#table2').DataTable( {
            "scrollX": true,
            "language": {
                "emptyTable": "No Customer Yet"
            }
        } );
    } );
</script>
@endsection
@endsection