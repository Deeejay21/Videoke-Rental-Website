@extends('layouts.users.courier.app-panel')

@section('upper-extends')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">    
@endsection

@section('title', 'Customer Details')

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
        <li class="breadcrumb-item active">Status</li>
    </ol>
</div>

@include('layouts.users.admin.session')

<div class="col-lg-12">
    <p><a href="/courier/customers" class="btn btn-outline-secondary">Back</a></p>
</div>

<table class="table table-bordered" id="table2">
    <thead>
        <tr class="text-center">
            <th>ID</th>
            <th>Payment Status</th>
            <th>Videoke Status</th>
            <th>Videoke Delivery Date</th>
            <th>Videoke Return Date</th>
            <th>Payment Confirmation Date Issued</th>
            <th>Videoke Date Returned Issued</th>
            {{-- <th>Customer Registered Date</th> --}}
            @if ($user->is_return == 'Operating')
                <th>Action</th>
            @endif
        </tr>
    </thead>
    <tbody>
            <tr>
                <td>{{ $user->id - 2 }}</td>
                @if ($user->is_paid == 'Paid')
                    <td><h5><span class="badge badge-pill badge-success">{{ $user->is_paid }}</span></h5></td>
                @elseif ($user->is_paid == 'Half Payment')
                    <td><h5><span class="badge badge-pill badge-warning">{{ $user->is_paid }}</span></h5></td>
                @else
                    <td><h5><span class="badge badge-pill badge-danger">{{ $user->is_paid }}</span></h5></td>
                @endif
                @if ($user->is_return == 'Return')
                    <td><h5><span class="badge badge-pill badge-success">{{ $user->is_return }}</span></h5></td>
                @elseif ($user->is_return == 'Operating')
                    <td><h5><span class="badge badge-pill badge-warning mr-2">{{ $user->is_return }}</span></h5></td>
                @endif

                <td>{{ $user->check_format() }}</td>

                <td>{{ $user->date_return_format() }}</td>
                
                @if ($user->is_paid == 'Paid')
                <td>{{ $user->qr_code_issued() }}</td>
                @else
                    <td>Not Yet Issued</td>
                @endif
                
                @if ($user->is_return == 'Return')
                    <td>{{ $user->return_at_issued() }}</td>
                @else
                    <td>Not Yet Issued</td>
                @endif

                {{-- <td>{{ $user->created_at->format('F d, Y' . ' (' . 'D' . ')') }} - {{ $user->created_at->diffForHumans() }}</td> --}}

                @if ($user->is_paid == 'Half Payment')
                <td>
                    <div class="btn-group">
                        <a href="/courier/customers/{{ $user->id }}/access/confirm" class="btn btn-outline-primary btn-sm">Confirm</a>
                    </div>
                </td>
                @elseif ($user->is_return == 'Operating')
                    <td><a href="/courier/customers/{{ $user->id }}/access/edit" class="btn btn-outline-primary m-1">Edit</a></td>
                @endif

            </tr>
    </tbody>
</table>

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