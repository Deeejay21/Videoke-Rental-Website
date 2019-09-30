@extends('layouts.users.admin.app-panel')

@section('upper-extends')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
@endsection

@section('title', 'Dashboard')

@section('sidebar')
<div id="layout-sidenav" class="layout-sidenav sidenav sidenav-vertical bg-dark">
    <div class="app-brand demo">
        <span class="app-brand-logo demo">
            <img src="{{ asset('assets/img/logo-mic.png') }}" alt="Brand Logo" class="img-fluid">
        </span>
        <a href="/admin" class="app-brand-text demo sidenav-text font-weight-normal ml-2">Admin <strong>PANEL</strong></a>
        <a href="javascript:" class="layout-sidenav-toggle sidenav-link text-large ml-auto">
            <i class="ion ion-md-menu align-middle"></i>
        </a>
    </div>
    <div class="sidenav-divider mt-0"></div>

    <ul class="sidenav-inner py-1">

        <!-- Dashboards -->
        <li class="sidenav-item active">
            <a href="/admin" class="sidenav-link">
                <i class="sidenav-icon feather icon-home"></i>
                <div>Dashboard</div>
            </a>
        </li>

        <!-- Notification -->
        <li class="sidenav-item">
                <a href="javascript:" class="sidenav-link sidenav-toggle">
                        <i class="sidenav-icon feather icon-bell"></i>
                    <div>Notification</div>
                </a>
                <ul class="sidenav-menu">
                    <li class="sidenav-item">
                        <a href="/admin/notification/delivery" class="sidenav-link">
                            <div>Videoke Delivery</div>
                        </a>
                    </li>
                    <li class="sidenav-item">
                        <a href="/admin/notification/return" class="sidenav-link">
                            <div>Videoke Return</div>
                        </a>
                    </li>
    
                </ul>
            </li>

        <!-- Customers -->
        <li class="sidenav-item">
            <a href="javascript:" class="sidenav-link sidenav-toggle">
                <i class="sidenav-icon feather icon-user"></i>
                <div>Customers</div>
            </a>
            <ul class="sidenav-menu">
                <li class="sidenav-item">
                    <a href="/admin/customers" class="sidenav-link">
                        <div>Customer List</div>
                    </a>
                </li>
                <li class="sidenav-item">
                    <a href="/admin/customers/paying" class="sidenav-link">
                        <div>Paying</div>
                    </a>
                </li>
                <li class="sidenav-item">
                    <a href="/admin/customers/firstpayment" class="sidenav-link">
                        <div>First Payment</div>
                    </a>
                </li>
                <li class="sidenav-item">
                    <a href="/admin/customers/fullypaid" class="sidenav-link">
                        <div>Fully Paid</div>
                    </a>
                </li>
            </ul>
        </li>

        {{-- Reservation --}}
        <li class="sidenav-item">
            <a href="/admin/reservations" class="sidenav-link">
                <i class="sidenav-icon feather icon-file-text"></i>
                <div>Reservation</div>
            </a>
        </li>

        {{-- Videoke --}}
        <li class="sidenav-item">
            <a href="javascript:" class="sidenav-link sidenav-toggle">
                <i class="sidenav-icon feather icon-mic"></i>
                <div>Videoke</div>
            </a>
            <ul class="sidenav-menu">
                <li class="sidenav-item">
                    <a href="/admin/videokelists" class="sidenav-link">
                        <div>Videoke List</div>
                    </a>
                </li>
                <li class="sidenav-item">
                    <a href="/admin/videokes" class="sidenav-link">
                        <div>Videoke Package</div>
                    </a>
                </li>
                <li class="sidenav-item">
                    <a href="/admin/videokes/rent" class="sidenav-link">
                        <div>Videoke On Rent</div>
                    </a>
                </li>
            </ul>
        </li>

        <!--  Payment -->
        <li class="sidenav-item">
            <a href="/admin/payments" class="sidenav-link">
                <i class="sidenav-icon feather icon-credit-card"></i>
                <div>Payment</div>
            </a>
        </li>

        {{-- Transaction --}}
        <li class="sidenav-item">
            <a href="javascript:" class="sidenav-link sidenav-toggle">
                <i class="sidenav-icon feather icon-globe"></i>
                <div>Transactions</div>
            </a>
            <ul class="sidenav-menu">
                <li class="sidenav-item">
                    <a href="/admin/transactions" class="sidenav-link">
                        <div>Transaction List</div>
                    </a>
                </li>
                <li class="sidenav-item">
                    <a href="/admin/transaction/palawanexpress" class="sidenav-link">
                        <div>Palawan Express</div>
                    </a>
                </li>
                <li class="sidenav-item">
                    <a href="/admin/transaction/smartpadala" class="sidenav-link">
                        <div>Smart Padala</div>
                    </a>
                </li>
                <li class="sidenav-item">
                    <a href="/admin/transaction/bayadcenter" class="sidenav-link">
                        <div>Bayad Center</div>
                    </a>
                </li>
            </ul>
        </li>

        {{-- Sales --}}
        <li class="sidenav-item">
            <a href="javascript:" class="sidenav-link sidenav-toggle">
                <i class="sidenav-icon feather icon-shopping-cart"></i>
                <div>Sales</div>
            </a>
            <ul class="sidenav-menu">
                <li class="sidenav-item">
                    <a href="/admin/sales" class="sidenav-link">
                        <div>Sales List</div>
                    </a>
                </li>
                <li class="sidenav-item">
                    <a href="/admin/sales/chart" class="sidenav-link">
                        <div>Chart</div>
                    </a>
                </li>
                <li class="sidenav-item">
                        <a href="javascript:" class="sidenav-link sidenav-toggle">
                            <div>Monthly</div>
                        </a>
                        <ul class="sidenav-menu">
                            <li class="sidenav-item">
                                <a href="/admin/sales/january" class="sidenav-link">
                                    <div>January</div>
                                </a>
                            </li>
                            <li class="sidenav-item">
                                <a href="/admin/sales/february" class="sidenav-link">
                                    <div>February</div>
                                </a>
                            </li>
                            <li class="sidenav-item">
                                <a href="/admin/sales/march" class="sidenav-link">
                                    <div>March</div>
                                </a>
                            </li>
                            <li class="sidenav-item">
                                <a href="/admin/sales/april" class="sidenav-link">
                                    <div>April</div>
                                </a>
                            </li>
                            <li class="sidenav-item">
                                <a href="/admin/sales/may" class="sidenav-link">
                                    <div>May</div>
                                </a>
                            </li>
                            <li class="sidenav-item">
                                <a href="/admin/sales/june" class="sidenav-link">
                                    <div>June</div>
                                </a>
                            </li>
                            <li class="sidenav-item">
                                <a href="/admin/sales/july" class="sidenav-link">
                                    <div>July</div>
                                </a>
                            </li>
                            <li class="sidenav-item">
                                <a href="/admin/sales/august" class="sidenav-link">
                                    <div>August</div>
                                </a>
                            </li>
                            <li class="sidenav-item">
                                <a href="/admin/sales/september" class="sidenav-link">
                                    <div>September</div>
                                </a>
                            </li>
                            <li class="sidenav-item">
                                <a href="/admin/sales/october" class="sidenav-link">
                                    <div>October</div>
                                </a>
                            </li>
                            <li class="sidenav-item">
                                <a href="/admin/sales/november" class="sidenav-link">
                                    <div>November</div>
                                </a>
                            </li>
                            <li class="sidenav-item">
                                <a href="/admin/sales/december" class="sidenav-link">
                                    <div>December</div>
                                </a>
                            </li>
                        </ul>
                    </li>
            </ul>
        </li>
    </ul>
</div>
@endsection

@section('content')
<h4 class="font-weight-bold pb-3 mb-0">Dashboard</h4>
<div class="text-muted small mt-0 mb-4 d-block breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/admin"><i class="feather icon-home"></i></a></li>
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
</div>

<div class="row">
        <div class="col-md-12">
            <div class="card d-flex w-100 mb-4">
                <div class="row no-gutters row-bordered row-border-light h-100">
    
                    <div class="d-flex col-md-6 col-lg-3 align-items-center">
                        <div class="card-body">
                            <div class="row align-items-center mb-3">
                                <div class="col-auto">
                                    <i class="lnr lnr-earth text-primary display-4"></i>
                                </div>
                                <div class="col">
                                    <h6 class="mb-0 text-muted"><span class="text-primary">Total Transaction</span></h6>
                                    <h4 class="mt-3 mb-0">{{ $user->total_transaction() }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="d-flex col-md-6 col-lg-3 align-items-center">
                        <div class="card-body">
                            <div class="row align-items-center mb-3">
                                <div class="col-auto">
                                    <i class="lnr lnr-users text-primary display-4"></i>
                                </div>
                                <div class="col">
                                    <h6 class="mb-0 text-muted"><span class="text-primary">Total Customer</span></h6>
                                    <h4 class="mt-3 mb-0">{{ $total_customers }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex col-md-6 col-lg-3 align-items-center">
                        <div class="card-body">
                            <div class="row align-items-center mb-3">
                                <div class="col-auto">
                                    <i class="lnr lnr-mic text-primary display-4"></i>
                                </div>
                                <div class="col">
                                    <h6 class="mb-0 text-muted"><span class="text-primary">Total Videoke</span></h6>
                                    <h4 class="mt-3 mb-0">{{ $total_videokes }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="d-flex col-md-6 col-lg-3 align-items-center">
                        <div class="card-body">
                            <div class="row align-items-center mb-3">
                                <div class="col-auto">
                                    <i class="lnr lnr-cart text-primary display-4"></i>
                                </div>
                                <div class="col">
                                    <h6 class="mb-0 text-muted"><span class="text-primary">Total Sales</span></h6>
                                    <h4 class="mt-3 mb-0">₱{{ number_format($total_sales, 2, '.', ',') }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row pt-2">
            <div class="col-lg-12">
            <div class="card text-center">
                <div class="card-header">
                    <h1><strong>Sales Chart</strong></h1>
                    <p>{{ $year->format('Y') }}</p>

                    <div class="btn-group">
                        <button class="btn btn-default btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Month<span class="caret"></span></button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/admin/sales/january">January</a></li>
                            <li><a class="dropdown-item" href="/admin/sales/february">February</a></li>
                            <li><a class="dropdown-item" href="/admin/sales/march">March</a></li>
                            <li><a class="dropdown-item" href="/admin/sales/april">April</a></li>
                            <li><a class="dropdown-item" href="/admin/sales/may">May</a></li>
                            <li><a class="dropdown-item" href="/admin/sales/june">June</a></li>
                            <li><a class="dropdown-item" href="/admin/sales/july">July</a></li>
                            <li><a class="dropdown-item" href="/admin/sales/august">August</a></li>
                            <li><a class="dropdown-item" href="/admin/sales/september">September</a></li>
                            <li><a class="dropdown-item" href="/admin/sales/october">October</a></li>
                            <li><a class="dropdown-item" href="/admin/sales/november">November</a></li>
                            <li><a class="dropdown-item" href="/admin/sales/december">December</a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body w-100">
                    {!! $chart->container() !!}
                </div>
            </div>
        </div>
    </div>

    {!! $chart->script() !!}
    
@endsection