@extends('layouts.users.courier.app')

@section('title', 'Videoke | Courier Dashboard')

@section('content')
    
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Courier Dashboard</h1>
            </div>
        </div>
        
        <div class="row">
            <div class="col-6">
                <div class="card text-center">
                    <div class="card-header">
                        <h5><strong>Total Videokes</strong></h5>
                    </div>
                    <div class="card-body">
                        <h1>{{ $user->total_videoke() }}</h1>
                        <hr>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card text-center">
                    <div class="card-header">
                        <h5><strong>Total Customers</strong></h5>
                    </div>
                    <div class="card-body">
                            
                        <h1>{{ $user->total_customers() }}</h1>
                        <hr>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    
@endsection
