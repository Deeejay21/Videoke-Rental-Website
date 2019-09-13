@extends('layouts.users.admin.app')

@section('title', 'Videoke | Admin Customer Edit')

@section('content')
    
<div class="container">

    <div class="row">
        <div class="col-12">
            <h1>Edit Customer Access for {{ $user->first_name }} {{ $user->last_name }}</h1>
        </div>
    </div>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>
    
                    <div class="card-body">
                        <form method="POST" action="{{ $user->path() }}">
                            @method('PATCH')
                            @csrf
    
                            <div class="form-group row">
                                <label for="usertype" class="col-md-4 col-form-label text-md-right">User Type</label>
    
                                <div class="col-md-6">
                                    <select id="usertype" class="form-control" required name="usertype" autocomplete="usertype" autofocus>
                                        <option>{{ $user->usertype }}</option>
                                        <option value="User">User</option>
                                        <option value="Courier">Courier</option>
                                        <option value="Admin">Admin</option>
                                    </select>
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="is_paid" class="col-md-4 col-form-label text-md-right">Payment Status</label>
    
                                <div class="col-md-6">
                                    <select id="is_paid" class="form-control"  name="is_paid" autocomplete="is_paid" autofocus>
                                        <option>{{ $user->is_paid }}</option>
                                        <option value="Paying">Paying</option>
                                        <option value="Paid">Paid</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="is_expired" class="col-md-4 col-form-label text-md-right">Account Status</label>
    
                                <div class="col-md-6">
                                    <select id="is_expired" class="form-control" required name="is_expired" autocomplete="is_expired" autofocus>
                                        <option>{{ $user->is_expired }}</option>
                                        <option value="Active">Active</option>
                                        <option value="Expired">Expired</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="is_return" class="col-md-4 col-form-label text-md-right">Videoke Status</label>
    
                                <div class="col-md-6">
                                    <select id="is_return" class="form-control" required name="is_return" autocomplete="is_return" autofocus>
                                        <option>{{ $user->is_return }}</option>
                                        <option value="Operating">Operating</option>
                                        <option value="Return">Return</option>
                                    </select>
                                </div>
                            </div>
    
                            <div class="row">
                                <div class="col-4"></div>
                                <div class="col-2 pl-5">
                                    <button type="submit" class="btn btn-outline-primary">
                                        Edit Access
                                    </button>
                                </div>
                                <div class="col-2 pl-5">
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