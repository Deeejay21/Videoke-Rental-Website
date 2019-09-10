@extends('layouts.users.admin.app')

@section('title', 'Videoke | Admin Payment Edit')

@section('content')
<div class="container">
    <div class="row pb-2">
        <div class="col-12">
            <h1>Edit Payment</h1>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="/admin/payments/{{ $payment->id }}">
                        @method('PATCH')
                        @csrf

                    <p align="center" class="text-muted"><small>Note: If you want to order 2 or more videoke, you can login with your account and reserve another videoke.</small></p>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $payment->name }}" autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="account_number" class="col-md-4 col-form-label text-md-right">Account Number</label>

                            <div class="col-md-6">
                                <input id="account_number" type="text" class="form-control @error('account_number') is-invalid @enderror" name="account_number" value="{{ old('account_number') ?? $payment->account_number }}" autocomplete="account_number" autofocus>

                                @error('account_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                                <div class="col-4"></div>
                                <div class="col-2 pl-5">
                                    <button type="submit" class="btn btn-outline-primary">
                                        Edit Videoke
                                    </button>
                                </div>
                                <div class="col-2 pl-5">
                                    <a href="/admin/payments" class="btn btn-outline-secondary">Back</a>
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