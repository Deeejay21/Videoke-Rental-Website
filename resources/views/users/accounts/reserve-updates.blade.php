@extends('layouts.users.user.app2')

@section('title', 'Videoke | Update Reservation')

@section('content')

<div class="col-lg-12">
    <h2>Edit Reservation</h2>
</div>

<form action="/user/{{ $user->id }}/account/reserveupdates" method="post">
    @method('PATCH')
    @csrf

    <div class="form-group">
            <label for="checked_in_at" class="col-form-label text-md-right">Date of Reservation</label>
            <div class="input-group date form_datetime" data-date-format="dd MM yyyy - HH:ii P" data-link-field="checked_in_at">
                <input class="form-control fs @error('checked_in_at') is-invalid @enderror" size="40" type="text" required readonly style="background-color: #fff;">
                <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                @error('checked_in_at')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror  
            </div>
            <input type="hidden" id="checked_in_at" name="checked_in_at" value="" /><br/>
      </div>

      <div class="form-group">
        <label for="videoke_id" class="col-form-label text-md-right">Videoke Package</label>
        <select id="videoke_id" class="form-control @error('videoke_id') is-invalid @enderror" name="videoke_id" autocomplete="videoke_id" autofocus>
            @foreach ($anotherReserve as $another)
                <option>{{ $another->videoke->name }}</option>
            @endforeach
            @foreach ($videokes as $videoke)
                <option value="{{ $videoke->id }}" {{ old('videoke_id') == $videoke->id ? 'selected' : '' }}>{{ $videoke->name }}</option>
            @endforeach
        </select>
        @error('videoke_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror  
  </div>

  <div class="row">
    <div class="col-md-12 text-center">
        <div class="btn-group btn-group-md">
            <button type="submit" class="btn btn-outline-primary">Edit Reservation</button>
            <a href="/user/{{ $user->id }}/account/reservation" class="btn btn-outline-secondary ml-4">Back</a>
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