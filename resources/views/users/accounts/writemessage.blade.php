@extends('layouts.users.user.app')

@section('title', 'Videoke | Contact')

@section('content')
<h1 class="center">Contact Us</h1>

    @if (session()->has('message'))
    <a class="nav-link" href="">
        <div class="alert alert-success text-center" role="alert">
            <strong>Message sent!</strong> {{ session()->get('message') }}
        </div>
    </a>
    @endif

    @if (! session()->has('message'))
    <form class="form-prevent-multiple-submits" action="/user/{{ $user->id }}/account/writemessage" method="POST">
        @csrf
        
        <div class="form-group">
            <label for="message">Message:</label>
            <textarea name="message" id="message" cols="30" rows="10" class="form-control">{{ old('message') }}</textarea>
            <p class="text-danger"><strong>{{ $errors->first('message') }}</strong></p>
        </div>
        
        <div class="center">

            <button type="submit" class="button-prevent-multiple-submits btn btn-outline-primary">Send Message</button>
        </div>
        
    </form>
    @endif
    
    <script src="{{ asset('js/submit.js') }}"></script>

@endsection