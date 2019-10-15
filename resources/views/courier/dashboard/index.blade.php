@extends('layouts.users.courier.app-panel')

@section('upper-extends')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">    
@endsection

@section('title', 'Dashboard')

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
        <li class="sidenav-item active">
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
        <li class="sidenav-item">
            <a href="/courier/customers" class="sidenav-link">
                    <i class="sidenav-icon feather icon-user"></i>
                <div>Customers</div>
            </a>
        </li>
    </ul>
</div>
@endsection

@section('content')
<h4 class="font-weight-bold pb-3 mb-0">Dashboard</h4>
<div class="text-muted small mt-0 mb-4 d-block breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/courier"><i class="feather icon-home"></i></a></li>
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
</div>
<div class="row">
        <div class="col-md-12">
            <div class="card d-flex w-100 mb-4">
                <div class="row no-gutters row-bordered row-border-light h-100">
    
                    <div class="d-flex col-md-6 col-lg-6 align-items-center">
                        <div class="card-body">
                            <div class="row align-items-center mb-3">
                                <div class="col-auto">
                                    <i class="lnr lnr-users text-primary display-4"></i>
                                </div>
                                <div class="col">
                                    <h6 class="mb-0 text-muted"><span class="text-primary">Total Customer</span></h6>
                                    <h4 class="mt-3 mb-0">{{ $user->total_customers() }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex col-md-6 col-lg-6 align-items-center">
                        <div class="card-body">
                            <div class="row align-items-center mb-3">
                                <div class="col-auto">
                                    <i class="lnr lnr-mic text-primary display-4"></i>
                                </div>
                                <div class="col">
                                    <h6 class="mb-0 text-muted"><span class="text-primary">Total Reservation</span></h6>
                                    <h4 class="mt-3 mb-0">{{ $user->total_reservation() }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    
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