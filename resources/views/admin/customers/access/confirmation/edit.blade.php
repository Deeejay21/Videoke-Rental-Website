@extends('layouts.users.admin.app')

@section('title', 'Videoke | Admin Customer Edit')

@section('content')
    
<div class="container">

    <div class="row">
        <div class="col-12">
            <h1>Payment Confirmation for {{ $user->first_name }} {{ $user->last_name }}</h1>
        </div>
    </div>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">QR Code Verification</div>
    
                    <div class="card-body">
                        <form method="POST" action="{{ $user->path() }}">
                            @method('PATCH')
                            @csrf
{{--                             
                  <div class="form-group">
                        <label for="password" class="col-form-label text-md-right">{{ __('Password') }}</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                      </div>
    
                      <div class="form-group">
                        <label for="password-confirm" class="col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                      </div> --}}

                      <button type="submit">Camera</button>

                      <input type="file" name="file" id="file">

                      <div class="form-group">
                            <label for="current_email" class="col-form-label text-md-right">Scanned Result</label>
                        <input id="current_email" type="text" value="{{ old('current_email') }}" class="form-control @error('current_email') is-invalid @enderror" name="current_email">
                                @error('current_email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                          </div>


                            {{-- <span>QR Content: <span id="content"></span></span> --}}
                            <div class="row">
                                <div class="col-4"></div>
                                <div class="col-2">
                                    {{-- <button type="submit" class="btn btn-outline-primary">
                                        Confirm
                                    </button> --}}
                                </div>
                                <div class="col-2">
                                    <a href="{{ $user->path() }}" class="btn btn-outline-secondary">Back</a>
                                </div>
                                <div class="col-4"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection