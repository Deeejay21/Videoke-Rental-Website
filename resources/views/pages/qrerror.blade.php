@extends('layouts.users.guest.app')

@section('title', 'Videoke Rental Website | Error')

@section('content')

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNavAdjust">
        <div class="container">
          <a class="navbar-brand js-scroll-trigger" href="/">Videoke Rental</a>
          <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav text-uppercase ml-auto text-center">
              <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="/">Home</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    
    <div class="container">
            <div class="row" style="padding-top: 12rem;">
                    <div class="col-lg-12 text-center">
                      <h2 class="section-heading text-uppercase">Sorry</h2>
                      <h3 class="section-subheading text-muted">This QR Code is not for {{ $user->first_name }} {{ $user->last_name }}.</h3>
                    </div>
                  </div>

        <div class="col-lg-12 text-center" style="padding-bottom: 16rem;">
            <a class="btn btn-outline-primary mt-3" href="javascript:history.back()">Back</a>
        </div>
    </div>

@endsection