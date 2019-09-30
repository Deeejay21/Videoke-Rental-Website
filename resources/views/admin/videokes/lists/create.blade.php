@extends('layouts.users.admin.app')

@section('title', 'Videoke | Admin Videoke Create')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-12">
            <h1>Add New Videoke</h1>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="/admin/videokelists">
                        @csrf

                        <div class="form-group row">
                            <label for="number" class="col-md-4 col-form-label text-md-right">Number</label>

                            <div class="col-md-6">
                                <input id="number" type="number" class="form-control @error('number') is-invalid @enderror" name="number" value="{{ old('number') }}" autocomplete="number" autofocus>

                                @error('number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 text-center">
                                <div class="btn-group btn-group-md">
                                    <button type="submit" class="btn btn-outline-primary">Add Videoke</button>
                                    <a href="/admin/videokelists" class="btn btn-outline-secondary ml-4">Back</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection