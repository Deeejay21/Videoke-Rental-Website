@extends('layouts.users.admin.app')

@section('title', 'Videoke | Admin Videoke Edit')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-12">
            <h1>Edit Videoke</h1>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="/admin/videokes/{{ $videoke->id }}">
                        @method('PATCH')
                        @csrf

                    <p align="center" class="text-muted"><small>Note: If you want to order 2 or more videoke, you can login with your account and reserve another videoke.</small></p>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $videoke->name }}" autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="number" class="col-md-4 col-form-label text-md-right">Number</label>

                            <div class="col-md-6">
                                <input id="number" type="text" class="form-control @error('number') is-invalid @enderror" name="number" value="{{ old('number') ?? $videoke->number }}" autocomplete="number" autofocus>

                                @error('number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="price" class="col-md-4 col-form-label text-md-right">Price</label>

                            <div class="col-md-6">
                                <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') ?? $videoke->price }}" autocomplete="price" autofocus>

                                @error('price')
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
                                    <a href="/admin/videokes" class="btn btn-outline-secondary">Back</a>
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