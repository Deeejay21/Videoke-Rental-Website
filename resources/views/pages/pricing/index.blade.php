@extends('layouts.users.guest.appPricing')

@section('title', 'Videoke Rental Website | Pricing')

@section('content')
    
<div class="container">
    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1 class="display-4 pt-5">Pricing</h1>
    <p class="lead">Quickly build an effective pricing table for your potential customers with this Bootstrap example. It’s built with default Bootstrap components and utilities with little customization.</p>
  </div>

  <div class="row">
      @foreach ($videokes as $videoke)
      <div class="col-md-6 col-md-4 text-center">
          <div class="card mb-4 shadow-sm">
              <div class="card-header">
                        <h4 class="my-0 font-weight-normal">{{ $videoke->name }}</h4>
                    </div>
                    <div class="card-body">
                        <h1 class="card-title pricing-card-title">₱{{ $videoke->price }}.00<small class="text-muted">/{{ $videoke->number }}</small></h1>
                        <ul class="list-unstyled mt-3 mb-4">
                                <li>Latest Songs</li>
                                <li>Quality Mic</li>
                            </ul>
                            <a href="/register/{{ $videoke->id }}" class="nav-link">
                                <button type="button" class="btn btn-lg btn-block btn-outline-primary">Reserve Now</button>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
  </div>
  
{{-- <div class="container">
    <div class="card-deck mb-3 text-center">
        <div class="card mb-4 shadow-sm">
        <div class="card-header">
            <h4 class="my-0 font-weight-normal">1 Videoke</h4>
        </div>
        <div class="card-body">
            <h1 class="card-title pricing-card-title">₱500.00<small class="text-muted">/1 Day</small></h1>
                <ul class="list-unstyled mt-3 mb-4">
                    <li>Latest Songs</li>
                    <li>Quality Mic</li>
                </ul>
                <a href="/register/1" class="nav-link">
                    <button type="button" class="btn btn-lg btn-block btn-outline-primary">Reserve Now</button>
                </a>
        </div>
    </div>

    <div class="card mb-4 shadow-sm">
        <div class="card-header">
            <h4 class="my-0 font-weight-normal">1 Videoke</h4>
        </div>
        <div class="card-body">
            <h1 class="card-title pricing-card-title">₱950.00<small class="text-muted">/2 Days</small></h1>
                <ul class="list-unstyled mt-3 mb-4">
                    <li>Latest Songs</li>
                    <li>Quality Mic</li>
                </ul>
                <a href="/register/2" class="nav-link">
                    <button type="button" class="btn btn-lg btn-block btn-outline-primary">Reserve Now</button>
                </a>
        </div>
    </div>

    <div class="card mb-4 shadow-sm">
        <div class="card-header">
            <h4 class="my-0 font-weight-normal">1 Videoke</h4>
        </div>
        <div class="card-body">
            <h1 class="card-title pricing-card-title">₱1,400.00<small class="text-muted">/3 Days</small></h1>
                <ul class="list-unstyled mt-3 mb-4">
                    <li>Latest Songs</li>
                    <li>Quality Mic</li>
                </ul>
                <a href="/register/3" class="nav-link">
                    <button type="button" class="btn btn-lg btn-block btn-outline-primary">Reserve Now</button>
                </a>
        </div>
      </div>
    </div>
    
    <div class="card-deck mb-3 text-center">
        <div class="card mb-4 shadow-sm">
            <div class="card-header">
                <h4 class="my-0 font-weight-normal">1 Videoke</h4>
            </div>
        <div class="card-body">
            <h1 class="card-title pricing-card-title">₱1,850.00<small class="text-muted">/4 Days</small></h1>
                <ul class="list-unstyled mt-3 mb-4">
                    <li>Latest Songs</li>
                    <li>Quality Mic</li>
                </ul>
                <a href="/register/4" class="nav-link">
                    <button type="button" class="btn btn-lg btn-block btn-outline-primary">Reserve Now</button>
                </a>
        </div>
    </div>

    <div class="card mb-4 shadow-sm">
        <div class="card-header">
            <h4 class="my-0 font-weight-normal">1 Videoke</h4>
        </div>
        <div class="card-body">
            <h1 class="card-title pricing-card-title">₱2,300.00<small class="text-muted">/5 Days</small></h1>
                <ul class="list-unstyled mt-3 mb-4">
                    <li>Latest Songs</li>
                    <li>Quality Mic</li>
                </ul>
                <a href="/register/5" class="nav-link">
                    <button type="button" class="btn btn-lg btn-block btn-outline-primary">Reserve Now</button>
                </a>
        </div>
    </div>

    <div class="card mb-4 shadow-sm">
        <div class="card-header">
            <h4 class="my-0 font-weight-normal">1 Videoke</h4>
        </div>
        <div class="card-body">
            <h1 class="card-title pricing-card-title">₱2,750.00<small class="text-muted">/6 Days</small></h1>
                <ul class="list-unstyled mt-3 mb-4">
                    <li>Latest Songs</li>
                    <li>Quality Mic</li>
                </ul>
                <a href="/register/6" class="nav-link">
                    <button type="button" class="btn btn-lg btn-block btn-outline-primary">Reserve Now</button>
                </a>
        </div>
      </div>
    </div>

    <div class="card-deck mb-5 text-center">
        <div class="col-4"></div>
        <div class="col-4">
            <div class="card mb-4 shadow-sm">
                <div class="card-header">
                    <h4 class="my-0 font-weight-normal">1 Videoke</h4>
                </div>
                <div class="card-body">
                    <h1 class="card-title pricing-card-title">₱3,000.00<small class="text-muted">/7 Days</small></h1>
                        <ul class="list-unstyled mt-3 mb-4">
                            <li>Latest Songs</li>
                            <li>Quality Mic</li>
                        </ul>
                    <a href="/register/7" class="nav-link">
                        <button type="button" class="btn btn-lg btn-block btn-outline-primary">Reserve Now</button>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-4"></div>
    </div>
    </div>
</div> --}}
@endsection