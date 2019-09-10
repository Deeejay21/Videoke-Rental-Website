@extends('layouts.users.admin.app')

@section('title', 'Videoke | Admin Dashboard')

@section('content')
    
    <div class="container">
        <div class="row">
            <div class="col-12">
                    <h1>Sales of November</h1>
                </div>
            </div>
            
            {{-- <div class="row">
                <div class="col-3">
                    <div class="card text-center">
                        <div class="card-header">
                            <h5><strong>Total Videokes</strong></h5>
                        </div>
                        <div class="card-body">
                            <h1>3</h1>
                            <hr>
                            <a href="#" class="card-link">More Info...</a>
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
                            <a href="/admin/customers" class="card-link">More Info...</a>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card text-center">
                        <div class="card-header">
                            <h5><strong>Total Transactions</strong></h5>
                        </div>
                        <div class="card-body">
                            <h1>{{ $total_payments }}</h1>
                            <hr>
                            <a href="#" class="card-link">More Info...</a>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card text-center">
                        <div class="card-header">
                            <h5><strong>Total Sales</strong></h5>
                        </div>
                        <div class="card-body">
                            <h1>₱{{ $total_sales }}</h1>
                            <hr>
                            <a href="/admin/sales" class="card-link">More Info...</a>
                        </div>
                    </div>
                </div>
            </div> --}}
            
            <div class="row pt-4">
                <div class="col-4"></div>
                <div class="col-4">
                    <div class="card text-center">
                        <div class="card-header">
                            @if ( $november == null)
                            <h1>No Sales Yet</h1>
                            @endif
                            <h5><strong>Sales Chart</strong></h5>
                            <div>Sales for the month of November</div>
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
                        <div class="card-body w-100" style="height: 14rem;">
                            {!! $chart->container() !!}
                        </div>
                    </div>
                </div>
                <div class="col-4"></div>
        </div>
        
    </div>
{!! $chart->script() !!}
    
@endsection
