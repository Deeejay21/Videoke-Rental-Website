@extends('layouts.users.guest.app')

@section('title', 'Videoke Rental Website | Contact')

@section('content')
    
<div class="container">
    <div class="row pt-5">
        <div class="col-12">
            <h1 class="display-4 h1-c">Contact Us</h1>
        </div>
        <div class="col-4"></div>
        <div class="col-12 col-4-cn">
            <p><strong>You can contact us Via Phone: </strong><span class="text-muted">0945-126-0066</span></p>
        </div>
    </div>

@if (session()->has('message'))
<a class="nav-link" href="">
    <div class="alert alert-success text-center" role="alert">
        <strong>Message sent!</strong> {{ session()->get('message') }}
    </div>
</a>
@endif

@if (! session()->has('message'))
<form action="/contact" method="POST">
    @csrf

    <div class="form-group row pt-3">
        <div class="col-12">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="" placeholder="Enter Name" value="{{ old('name') }}" class="form-control">
                <p>{{ $errors->first('name') }}</p>
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" name="email" id="" placeholder="Enter Email" value="{{ old('email') }}" class="form-control">
                <p>{{ $errors->first('email') }}</p>
            </div>
        </div>
    </div>
    
    
    <div class="form-group">
        <label for="mmessage">Message:</label>
        <textarea name="message" id="message" cols="30" rows="10" class="form-control">{{ old('message') }}</textarea>
        <p>{{ $errors->first('message') }}</p>
    </div>
    
    <button type="submit" class="btn btn-outline-primary">Send Message</button>
    
</form>
@endif
</div>

@endsection