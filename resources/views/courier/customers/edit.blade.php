@extends('layouts.users.admin.date')

@section('title', 'Videoke | Admin Customer Edit')

@section('content')
    
<div class="container">

    <div class="row">
        <div class="col-12">
            <h1>Edit Customer for {{ $user->first_name }}</h1>
        </div>
    </div>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>
    
                    <div class="card-body">
                        <form method="POST" action="/admin/customers/{{ $user->id }}">
                            @method('PATCH')
                            @csrf
    
                            {{-- <div class="form-group row">
                                <label for="videoke_id" class="col-md-4 col-form-label text-md-right">Videoke Package</label>
    
                                <div class="col-md-6">
                                        <select id="videoke_id" class="form-control" required name="videoke_id" autocomplete="videoke_id" autofocus>
                                                <option>{{ $user->videoke->name }}</option>
                                                @foreach ($videokes as $videoke)
                                                <option value="{{ $videoke->id }}">{{ $videoke->name }}</option>
                                                @endforeach
                                        </select>
                                </div>
                            </div> --}}
    
                        <div class="form-group row">
                            <label for="checked_in_at" class="col-md-4 col-form-label text-md-right">Date Needed:</label>
                            <div class="input-group date form_datetime col-md-7" data-date-format="dd MM yyyy - HH:ii P" data-link-field="checked_in_at">
                                <input class="form-control" size="40" type="text" value="{{ old('checked_in_at') ?? $user->checked_in_at->format('F d, Y g:i A') }}" readonly>
                                <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                                <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                            </div>
                            <input type="hidden" id="checked_in_at" name="checked_in_at" value="" /><br/>
                        </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">First Name</label>
    
                                <div class="col-md-6">
                                    <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') ?? $user->first_name }}" autocomplete="first_name" autofocus>
    
                                    @error('first_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="last_name" class="col-md-4 col-form-label text-md-right">Last Name</label>
    
                                <div class="col-md-6">
                                    <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') ?? $user->last_name }}" autocomplete="last_name" autofocus>
    
                                    @error('last_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="gender" class="col-md-4 col-form-label text-md-right">Gender</label>
    
                                <div class="col-md-6">
                                    <select id="gender" class="form-control" required name="gender" autocomplete="gender" autofocus>
                                        <option>{{ $user->gender }}</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                            </div>
    
                              <div class="form-group row">
                                    <label for="age" class="col-md-4 col-form-label text-md-right">Age</label>
        
                                    <div class="col-md-6">
                                        <input id="age" type="number" class="form-control @error('age') is-invalid @enderror" name="age" value="{{ old('age') ?? $user->age }}" autocomplete="age">
        
                                        @error('age')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
    
                            <div class="form-group row">
                                <label for="phone" class="col-md-4 col-form-label text-md-right">Contact Number</label>
    
                                <div class="col-md-6">
                                    <input id="phone" type="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') ?? $user->phone }}" autocomplete="phone">
    
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
    
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') ?? $user->email }}" autocomplete="email">
    
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="payment_id" class="col-md-4 col-form-label text-md-right">Payment</label>
    
                                <div class="col-md-6">
                                    <select id="payment_id" class="form-control" required name="payment_id">
                                        <option disabled value="{{ $user->id }}">{{ $user->payment->name }}</option>
                                        @foreach ($payments as $payment)
                                            <option value="{{ $payment->id }}">{{ $payment->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
    
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Edit Customer
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection