@extends('layouts.users.user.app2')

@section('title', 'Videoke | Reservation')

@section('content')

<div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">Reservation</h2>
          <h3 class="section-subheading text-muted">Rent Your Videoke Again</h3>
        </div>
      </div>
      
      <div class="row">
        <div class="col-lg-12">
            <form class="form-prevent-multiple-submits" action="/reserve" method="POST">
              @csrf

            <div class="row">
              <div class="col-md-3"></div>
              <div class="col-md-6">
                <div class="form-group">
                      <label for="videoke_id" class="col-form-label text-md-right">Videoke Package</label>
                      <select id="videoke_id" class="form-control @error('videoke_id') is-invalid @enderror" name="videoke_id" autocomplete="videoke_id" autofocus>
                              <option value="0" selected>--- Select Videoke  ---</option>
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

                {{-- {{ old('checked_in_at', $date_format->format('d F Y - h:i A')) }} --}}
                {{-- , $date_format->format('d F Y - h:i A') --}}

                <div class="form-group">
                      <label for="reserved_at" class="col-form-label text-md-right">Date of Reservation</label>
                      <div class="input-group date form_datetime" data-date-format="dd MM yyyy - HH:ii P" data-link-field="reserved_at">
                          <input class="form-control fs @error('reserved_at') is-invalid @enderror" size="40" type="text" required readonly style="background-color: #fff;">
                          <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                          @error('reserved_at')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror  
                      </div>
                      <input type="hidden" id="reserved_at" name="reserved_at" value="" /><br/>
                </div>

                <input id="qr_password" type="hidden" value="{{ $qr }}" class="form-control" name="qr_password">

                <div class="form-group">
                  <label for="payment_id" class="col-form-label text-md-right">Payment</label>
                  <select id="payment_id" class="form-control @error('payment_id') is-invalid @enderror" name="payment_id">
                        <option value="0" selected>--- Select Payment  ---</option>
                      @foreach ($payments as $payment)
                        <option value="{{ $payment->id }}" {{ old('payment_id') == $payment->id ? 'selected' : '' }}>{{ $payment->name }}</option>
                      @endforeach
                  </select>
                  @error('payment_id')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror 
                </div>

              </div>
              <div class="col-md-3"></div>
             
              <div class="clearfix"></div>
              <div class="col-lg-12 text-center">
                <button class="button-prevent-multiple-submits btn btn-outline-primary" type="submit">Register</button>
                <a href="javascript:history.back()" class="btn btn-outline-secondary ml-2">Back</a>
              </div>
            </div>
          </form>
        </div>
      </div>


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