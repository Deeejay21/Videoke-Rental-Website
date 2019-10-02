@extends('layouts.users.admin.app-panel')

@section('upper-extends')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">    
@endsection

@section('title', 'Customer First Payment')

@section('sidebar')
<div id="layout-sidenav" class="layout-sidenav sidenav sidenav-vertical bg-dark">
    <!-- Brand demo (see assets/css/demo/demo.css) -->
    <div class="app-brand demo">
        <span class="app-brand-logo demo">
            <img src="{{ asset('assets/img/logo.png') }}" alt="Brand Logo" class="img-fluid">
        </span>
        <a href="/admin" class="app-brand-text demo sidenav-text font-weight-normal ml-2">Admin</a>
        <a href="javascript:" class="layout-sidenav-toggle sidenav-link text-large ml-auto">
            <i class="ion ion-md-menu align-middle"></i>
        </a>
    </div>
    <div class="sidenav-divider mt-0"></div>

    <!-- Links -->
    <ul class="sidenav-inner py-1">

        <!-- Dashboards -->
        <li class="sidenav-item">
            <a href="/admin" class="sidenav-link">
                <i class="sidenav-icon feather icon-home"></i>
                <div>Dashboard</div>
            </a>
        </li>

        <!-- Notification -->
        <li class="sidenav-item">
                <a href="javascript:" class="sidenav-link sidenav-toggle">
                        <i class="sidenav-icon feather icon-bell"></i>
                    <div>Notification <span class="badge badge-dot badge-danger"></span></div>
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
        <li class="sidenav-item active open">
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
                <li class="sidenav-item active">
                    <a href="/admin/customers/firstpayment" class="sidenav-link">
                        <div>First Payment</div>
                    </a>
                </li>
                <li class="sidenav-item">
                    <a href="/admin/customers/fullypaid" class="sidenav-link">
                        <div>Fully Paid</div>
                    </a>
                </li>
                <li class="sidenav-item">
                    <a href="/admin/customers/paying" class="sidenav-link">
                        <div>Paying</div>
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
                    <a href="/admin/videokes" class="sidenav-link">
                        <div>Videoke List</div>
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

        {{-- Report --}}
        <li class="sidenav-item">
            <a href="/admin/report" class="sidenav-link">
                <i class="sidenav-icon feather icon-home"></i>
                <div>Report</div>
            </a>
        </li>
    </ul>
</div>
@endsection

@section('content')
<h4 class="font-weight-bold pb-3 mb-0">Customer First Payment List</h4>
<div class="text-muted small mt-0 mb-4 d-block breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/admin"><i class="feather icon-home"></i></a></li>
        <li class="breadcrumb-item active">Customers</li>
        <li class="breadcrumb-item active">First Payment</li>
    </ol>
</div>

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
            <th>Payment</th>
            <th>Videoke</th>
            <th>Videoke Delivery Date</th>
            <th>Videoke Videoke Return Date</th>
            <th>Customer Registered Date</th>
            <th>User Type</th>
            <th>Account Status</th>
            <th>Payment Status</th>
            <th>Videoke Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->id - 2 }}</td>
                <td>{{ $user->first_name }}</td>
                <td>{{ $user->last_name }}</td>
                <td>{{ $user->gender }}</td>
                <td>{{ $user->age }}</td>
                <td>{{ $user->phone }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->payment->name }}</td>
                <td>{{ $user->videoke->name }}</td>
                <td>{{ $user->check_format() }}</td>
                <td>{{ $user->date_return_format() }}</td>
                <td>{{ $user->created_at->format('F d, Y (D) - g:i A') }} - {{ $user->created_at->diffForHumans() }}</td>
                {{-- @if ($user->date_return() == $currentTime)
                    
                @else
                    
                @endif
                <td>{{ dd($user->notification_return()) }}</td> --}}
                @if ( $user->usertype == 'Admin')
                <td><h5><span class="badge badge-pill badge-info">{{ $user->usertype }}</span></h5></td>
                @else
                <td><h5><span class="badge badge-pill badge-secondary">{{ $user->usertype }}</span></h5></td>
                @endif
                @if ( $user->is_expired == 'Active' )
                    <td><h5><span class="badge badge-pill badge-success">{{ $user->is_expired }}</span></h5></td>
                @else
                    <td><h5><span class="badge badge-pill badge-danger">{{ $user->is_expired }}</span></h5></td>
                @endif
                @if ($user->is_paid == 'Paid')
                    <td><h5><span class="badge badge-pill badge-success">{{ $user->is_paid }}</span></h5></td>
                @elseif ($user->is_paid == 'Half Payment')
                    <td><h5><span class="badge badge-pill badge-warning">{{ $user->is_paid }}</span></h5></td>
                @else
                    <td><h5><span class="badge badge-pill badge-danger">{{ $user->is_paid }}</span></h5></td>
                @endif
                @if ( $user->is_return == 'Return')
                    <td><h5><span class="badge badge-pill badge-success">{{ $user->is_return }}</span></h5></td>
                @elseif ($user->is_return == 'Pending')
                    <td><h5><span class="badge badge-pill badge-danger">{{ $user->is_return }}</span></h5></td>
                @else
                    <td><h5><span class="badge badge-pill badge-warning">{{ $user->is_return }}</span></h5></td>
                @endif
            </tr>
        @endforeach
    </tbody>
</table>

@section('lower-extends')
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#table2').DataTable( {
            "scrollX": true,
            "language": {
                "emptyTable": "No Customer First Payment Paid"
            }
        } );
    } );
</script>
@endsection
@endsection