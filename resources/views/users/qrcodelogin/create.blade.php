@extends('layouts.users.qrcode.upper')

@section('title', 'Videoke Rental Website | Login')

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

<section class="page-section">
    <div class="container">

            <div class="row pb-5 pt-5">
                    {{-- <div class="col-md-2">
                    </div> --}}
                    <div class="col-md-2"></div>
                    <div class="col-md-8 center pb-2 pt-3">
                        <div class="card">
                            <div class="card-header">Login QR Code</div>

                            <div class="card-body">
                                <form method="POST" action="/qrcode">
                                    @csrf

                                    <webcam-reader></webcam-reader>
    
                                    <file-reader></file-reader>

                                    <p style="color: red; font-weight: bold;">{{ $errors->first('qr_password') }}</p>

                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-5">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Login') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <div class="col-md-2"></div>
        </div>
        </section>
@endsection
