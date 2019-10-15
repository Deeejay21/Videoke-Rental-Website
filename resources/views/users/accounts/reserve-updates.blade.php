@extends('layouts.users.user.app-datetime')

@section('title', 'Videoke | Update Reservation')

@section('content')

<div class="col-lg-12">
    <h2>Edit Reservation</h2>
</div>

<form action="/user/{{ $user->id }}/account/reserveupdates" method="post">
    @method('PATCH')
    @csrf

    <div class="form-group">
            <label for="reserved_at" class="col-form-label text-md-right">Date of Reservation</label>
            <div class="input-group date form_datetime" data-date-format="dd MM yyyy - HH:ii P" data-link-field="reserved_at">
            @foreach ($anotherReserve as $reserve)
                    <input class="form-control fs @error('reserved_at') is-invalid @enderror" value="{{ $reserve->reserved_at }}" size="40" type="text" required readonly style="background-color: #fff;">
            @endforeach
                <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                @error('reserved_at')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror  
            </div>
            @foreach ($anotherReserve as $reserve)
                <input type="hidden" id="reserved_at" name="reserved_at" value="{{ $reserve->reserved_at }}" /><br/>
            @endforeach
      </div>

      <div class="form-group">
        <label for="videoke_id" class="col-form-label text-md-right">Videoke Package Number:</label>
        <select id="videoke_id" class="form-control @error('videoke_id') is-invalid @enderror" name="videoke_id" autocomplete="videoke_id" autofocus>
            @foreach ($anotherReserve as $another)
                <option value="{{ $another->videoke->id }}">{{ $another->videoke->name }}</option>
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


<script type="text/javascript" src="{{ asset('jquery/jquery-1.8.3.min.js') }}" charset="UTF-8"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap-datetimepicker.js') }}" charset="UTF-8"></script>
<script type="text/javascript">

  var date = new Date();
      date.setDate(date.getDate());
    
      $('.form_datetime').datetimepicker({
        format: "dd MM yyyy - HH:ii P",
        pickerPosition: "center",
        weekStart: 1,
        todayBtn:  1,
        todayHighlight: 1,
        startView: 2,
        forceParse: 0,
        showMeridian: 1,
        isRTL: false,
        autoclose: true,
        startDate: date
        // setDaysOfWeekDisabled: [],
        // setDatesDisabled: 
    });
</script>
@endsection