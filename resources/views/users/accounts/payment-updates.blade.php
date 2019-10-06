@extends('layouts.users.user.app2')

@section('title', 'Videoke | Update Payment')

@section('content')

<div class="col-lg-12">
    <h2>Edit Payment</h2>
</div>

<form action="/user/{{ $user->id }}/account/paymentupdates" method="post">
    @method('PATCH')
    @csrf

    <div class="form-group">
        <label for="payment_id" class="col-form-label text-md-right">Payment</label>
        <select id="payment_id" class="form-control @error('payment_id') is-invalid @enderror" name="payment_id">
            @foreach ($anotherPayment as $another)
                <option>{{ $another->payment->name }}</option>
            @endforeach
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

  <div class="row">
    <div class="col-md-12 text-center">
        <div class="btn-group btn-group-md">
            <button type="submit" class="btn btn-outline-primary">Edit Payment</button>
            <a href="/user/{{ $user->id }}/account/payment" class="btn btn-outline-secondary ml-4">Back</a>
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