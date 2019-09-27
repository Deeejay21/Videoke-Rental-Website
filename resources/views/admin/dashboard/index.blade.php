@extends('layouts.users.admin.app')

@section('title', 'Videoke | Admin Dashboard')

@section('content')
    
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Admin Dashboard</h1>
            </div>
        </div>
        
        <div class="row">
            <div class="col-3">
                <div class="card text-center">
                    <div class="card-header">
                        <h5><strong>Total Videokes</strong></h5>
                    </div>
                    <div class="card-body">
                        <h1>{{ $total_videokes }}</h1>
                        <hr>
                        <a href="#" class="btn btn-outline-secondary">Videoke On Rent</a>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card text-center">
                    <div class="card-header">
                        <h5><strong>Total Customers</strong></h5>
                    </div>
                    <div class="card-body">
                        <h1>{{ $total_customers }}</h1>
                        <hr>
                        <div class="btn-group">
                            <a href="#" class="btn btn-outline-secondary btn-sm" style="padding-top: .7rem">Paying</a>
                            <a href="#" class="btn btn-outline-secondary btn-sm">Half Payment</a>
                            <a href="#" class="btn btn-outline-secondary btn-sm" style="padding-top: .7rem">Paid</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card text-center">
                    <div class="card-header">
                        <h5><strong>Total Transactions</strong></h5>
                    </div>
                    <div class="card-body">
                        <h1>{{ $user->total_transaction() }}</h1>
                        <hr>
                        <div class="btn-group">
                            <a href="#" class="btn btn-outline-secondary btn-sm">Palawan Express</a>
                            <a href="#" class="btn btn-outline-secondary btn-sm">Smart Padala</a>
                            <a href="#" class="btn btn-outline-secondary btn-sm">Bayad Center</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card text-center">
                    <div class="card-header">
                        <h5><strong>Total Sales</strong></h5>
                    </div>
                    <div class="card-body">
                        <h1>₱{{ number_format($total_sales, 2, '.', ',') }}</h1>
                        <hr>
                        <div class="dropdown">
                                <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Month
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="/admin/sales/january">January</a>
                                    <a class="dropdown-item" href="/admin/sales/february">February</a>
                                    <a class="dropdown-item" href="/admin/sales/march">March</a>
                                    <a class="dropdown-item" href="/admin/sales/april">April</a>
                                    <a class="dropdown-item" href="/admin/sales/may">May</a>
                                    <a class="dropdown-item" href="/admin/sales/june">June</a>
                                    <a class="dropdown-item" href="/admin/sales/july">July</a>
                                    <a class="dropdown-item" href="/admin/sales/august">August</a>
                                    <a class="dropdown-item" href="/admin/sales/september">September</a>
                                    <a class="dropdown-item" href="/admin/sales/october">October</a>
                                    <a class="dropdown-item" href="/admin/sales/november">November</a>
                                    <a class="dropdown-item" href="/admin/sales/december">December</a>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row pt-4">
            <div class="col-12">
                <div class="card text-center">
                    <div class="card-header">
                        <h5><strong>Sales Chart</strong></h5>
                        <p>{{ $year->format('Y') }}</p>
                        <div class="dropdown">
                            <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Month
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="/admin/sales/january">January</a>
                                <a class="dropdown-item" href="/admin/sales/february">February</a>
                                <a class="dropdown-item" href="/admin/sales/march">March</a>
                                <a class="dropdown-item" href="/admin/sales/april">April</a>
                                <a class="dropdown-item" href="/admin/sales/may">May</a>
                                <a class="dropdown-item" href="/admin/sales/june">June</a>
                                <a class="dropdown-item" href="/admin/sales/july">July</a>
                                <a class="dropdown-item" href="/admin/sales/august">August</a>
                                <a class="dropdown-item" href="/admin/sales/september">September</a>
                                <a class="dropdown-item" href="/admin/sales/october">October</a>
                                <a class="dropdown-item" href="/admin/sales/november">November</a>
                                <a class="dropdown-item" href="/admin/sales/december">December</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body w-100">
                        {!! $chart->container() !!}
                    </div>
                </div>
            </div>
        </div>
        
    </div>
{!! $chart->script() !!}
    
@endsection
