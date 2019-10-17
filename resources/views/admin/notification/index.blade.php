@extends('layouts.users.admin.app-panel')

@section('title', 'Notification')

@section('upper-extends')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"> 
@endsection

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
        <li class="sidenav-item">
            <a href="/admin" class="sidenav-link">
                <i class="sidenav-icon feather icon-home"></i>
                <div>Dashboard</div>
            </a>
        </li>

        <!-- Notification -->
        <li class="sidenav-item active">
            <a href="/admin/notification" class="sidenav-link">
                    <i class="sidenav-icon feather icon-bell"></i>
                <div>Notification</div>
            </a>
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
<h4 class="font-weight-bold pb-3 mb-0">Notification</h4>
<div class="text-muted small mt-0 mb-4 d-block breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/courier"><i class="feather icon-home"></i></a></li>
        <li class="breadcrumb-item active">Notification</li>
    </ol>
</div>

<h4 class="font-weight-bold pb-3 mb-0">Notification for Videoke Delivery</h4>

<div class="row">
    <div class="table-responsive">
        <table class="table table-bordered bg-white" id="table1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Address2</th>
                    <th>City</th>
                    <th>Brgy</th>
                    <th>Zip Code</th>
                    <th>Phone Number</th>
                    <th>Reservation Delivery Date</th>
                    <th>Videoke Return Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usersAnotherDelivery as $delivery)
                    @if ($delivery->reserved_at->format('F d, Y') == $currentTime->format('F d, Y'))
                    <tr>
                        <td>{{ $delivery->user->id - 2 }}</td>
                        <td>{{ $delivery->user->first_name }} {{ $delivery->user->last_name }}</td>
                        <td>{{ $delivery->user->address }}</td>
                        <td>{{ $delivery->user->address_2 }}</td>
                        <td>{{ $delivery->user->city }}</td>
                        <td>{{ $delivery->user->brgy }}</td>
                        <td>{{ $delivery->user->zip }}</td>
                        <td>{{ $delivery->user->phone }}</td>
                        <td>{{ $delivery->reserve_format() }}</td>
                        <td>{{ $delivery->reserve_return_format() }}</td>
                        <td width="10">
                            <div class="btn-group">
                                <a href="/admin/notification/customers/{{ $delivery->user->id }}" class="btn btn-outline-info">receipt</a>
                            </div>
                        </td>
                    </tr>
                    @endif
                @endforeach

                @foreach ($usersDelivery as $user)
                    @if ($user->checked_in_at->format('F d, Y') == $currentTime->format('F d, Y'))
                    <tr>
                        <td>{{ $user->id - 2 }}</td>
                        <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                        <td>{{ $user->address }}</td>
                        <td>{{ $user->address_2 }}</td>
                        <td>{{ $user->city }}</td>
                        <td>{{ $user->brgy }}</td>
                        <td>{{ $user->zip }}</td>
                        <td>{{ $user->phone }}</td>
                        {{-- <td>{{ $user->checked_in_at->format('F d, Y g:i A') }}</td> --}}
                        <td>{{ $user->check_format() }}</td>
                        <td>{{ $user->date_return_format() }}</td>
                        <td width="10">
                            <div class="btn-group">
                                <a href="/admin/notification/customer/{{ $user->id }}" class="btn btn-outline-info">receipt</a>
                            </div>
                        </td>
                    </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<h4 class="pt-5 font-weight-bold pb-3 mb-0">Notification for Videoke Return</h4>

<div class="table-responsive">
    <table class="table table-bordered bg-white" id="table2">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Address</th>
                <th>Address2</th>
                <th>City</th>
                <th>Brgy</th>
                <th>Zip Code</th>
                <th>Phone Number</th>
                <th>Reservation Delivery Date</th>
                <th>Videoke Return Date</th>
                {{-- <th>Action</th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach ($usersAnotherReturn as $return)
                @if ($return->date_return_notification() == $currentTime->format('F d, Y'))
                    
                <tr>
                    <td>{{ $return->user->id - 2 }}</td>
                    <td>{{ $return->user->first_name }} {{ $return->user->last_name }}</td>
                    <td>{{ $return->user->address }}</td>
                    <td>{{ $return->user->address_2 }}</td>
                    <td>{{ $return->user->city }}</td>
                    <td>{{ $return->user->brgy }}</td>
                    <td>{{ $return->user->zip }}</td>
                    <td>{{ $return->user->phone }}</td>
                    <td>{{ $return->reserve_format() }}</td>
                    <td>{{ $return->reserve_return_format() }}</td>
                    {{-- <td width="10">
                        <div class="btn-group">
                                <a href="/courier/customers/{{ $user->id }}/access/edit" class="btn btn-outline-primary" style="margin: 4px;">Return</a>
                        </div>
                    </td> --}}
                </tr>
                @endif
            @endforeach

            @foreach ($usersReturn as $user)
                @if ($user->date_return_notification() == $currentTime->format('F d, Y'))
                <tr>
                    <td>{{ $user->id - 2 }}</td>
                    <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                    <td>{{ $user->address }}</td>
                    <td>{{ $user->address_2 }}</td>
                    <td>{{ $user->city }}</td>
                    <td>{{ $user->brgy }}</td>
                    <td>{{ $user->zip }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>{{ $user->check_format() }}</td>
                    <td>{{ $user->date_return_format() }}</td>
                    {{-- <td width="10">
                        <div class="btn-group">
                        </div>
                    </td> --}}
                </tr>
                @endif
                @endforeach
        </tbody>
    </table>
</div>

@section('lower-extends')
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#table1').DataTable( {
            "language": {
                "emptyTable": "No Notification for Videoke Delivery"
            }
        } );
    } );
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#table2').DataTable( {
            "language": {
                "emptyTable": "No Notification for Videoke Return"
            }
        } );
    } );
</script>
@endsection

@endsection