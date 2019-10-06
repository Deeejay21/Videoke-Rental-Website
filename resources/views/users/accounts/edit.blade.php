@extends('layouts.users.user.app2')

@section('title', 'Videoke | Information Update')

@section('content')

<div class="col-lg-12">
    <h2>Edit Personal Details</h2>
</div>

<form action="/user/{{ $user->id }}/account/personalinformation" method="post">
    @method('PATCH')
    @csrf

    <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="name" class="col-form-label text-md-right">First Name</label>
                <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') ?? $user->first_name }}" autocomplete="first_name" autofocus>

                @error('first_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
            </div>

              <div class="col-md-6">
              <div class="form-group">
                <label for="last_name" class="col-form-label text-md-right">Last Name</label>
                <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') ?? $user->last_name }}" autocomplete="last_name" autofocus>
                    
                @error('last_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              </div>
          </div>
          

          <div class="form-group">
            <label for="gender" class="col-form-label text-md-right">Gender</label>
            <select id="gender" class="form-control @error('gender') is-invalid @enderror" name="gender" autocomplete="gender" autofocus>
                <option>{{ ucfirst($user->gender) }}</option>
                <option value="male" @if (old('gender') == "male") {{ 'selected' }} @endif>Male</option>
                <option value="female" @if (old('gender') == "female") {{ 'selected' }} @endif>Female</option>
              </select>
              @error('gender')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror  
          </div>

          <div class="form-group">
            <label for="age" class="col-form-label text-md-right">Age</label>
            <input id="age" type="number" class="form-control @error('age') is-invalid @enderror" name="age" value="{{ old('age') ?? $user->age }}" autocomplete="age">
                @error('age')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror                    
          </div>

          <div class="form-group">
            <label for="phone" class="col-form-label text-md-right">Contact Number</label>
            <input id="phone" type="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') ?? $user->phone }}" autocomplete="phone">
                @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
          </div>

          <div class="row">
            <div class="col-md-12 text-center">
                <div class="btn-group btn-group-md">
                    <button type="submit" class="btn btn-outline-primary">Edit Details</button>
                    <a href="/user/{{ $user->id }}/account/personalinformation" class="btn btn-outline-secondary ml-4">Back</a>
                </div>
            </div>
        </div>
</form>

<script type="text/javascript">
    function prepHref(linkElement) {
        var myDiv = document.getElementById('Div_contain_image');
        var myImage = myDiv.children[0];
        linkElement.href = myImage.src;
    }
</script>

@endsection