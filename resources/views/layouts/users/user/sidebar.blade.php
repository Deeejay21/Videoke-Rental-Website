


@if  (($user->is_paid == 'Half Payment') || ($user->is_paid == 'Paid'))
    
<div class="card accountC">
    <h5 class="card-header">Account</h5>
    <ul class="list-group list-group-flush">
        <li class="list-group-item"><a href="/user/{{ $user->id }}/account/home">Home</a></li>
        <li class="list-group-item"><a href="/user/{{ $user->id }}/account/personalinformation">Personal Information</a></li>
        <li class="list-group-item"><a href="/user/{{ $user->id }}/account/reservation">Reservation</a></li>
        <li class="list-group-item"><a href="/user/{{ $user->id }}/account/payment">Payment</a></li>
        <li class="list-group-item"><a href="/user/{{ $user->id }}/account/writemessage">Write Message</a></li>
    </ul>
</div>

@elseif (auth()->user()->is_paid == 'Paying')

<div class="card account">
    <h5 class="card-header center">Account</h5>
    <ul class="list-group list-group-flush">
        <li class="list-group-item"><a href="/user/{{ $user->id }}/account/home">Home</a></li>
        <li class="list-group-item"><a href="/user/{{ $user->id }}/account/personalinformation">Personal Information</a></li>
        <li class="list-group-item"><a href="/user/{{ $user->id }}/account/reservation">Reservation</a></li>
        <li class="list-group-item"><a href="/user/{{ $user->id }}/account/payment">Payment</a></li>
        <li class="list-group-item"><a href="/user/{{ $user->id }}/account/writemessage">Write Message</a></li>
    </ul>
</div>

@endif
        <div class="card videoke mb-4 mt-4">
            <h5 class="card-header center">Videoke Rates</h5>
                <div class="pl-3">
                    <p class="pt-3 pb-1 pr-1"><strong>1 Videoke ; 1 Day</strong> - PHP 500.00.</p>
                    <p class="pb-1"><strong>1 Videoke ; 2 Days</strong> - PHP 950.00.</p>
                    <p class="pb-1"><strong>1 Videoke ; 3 Days</strong> - PHP 1,400.00.</p>
                    <p class="pb-1"><strong>1 Videoke ; 4 Days</strong> - PHP 1,850.00.</p>
                    <p class="pb-1"><strong>1 Videoke ; 5 Days</strong> - PHP 2,300.00.</p>
                    <p class="pb-1"><strong>1 Videoke ; 6 Days</strong> - PHP 2,750.00.</p>
                    <p class="pb-1"><strong>1 Videoke ; 7 Days</strong> - PHP 3,000.00.</p>
                </div>
        </div>
    