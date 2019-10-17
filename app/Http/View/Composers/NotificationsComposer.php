<?php

namespace App\Http\View\Composers;

use App\User;
use Carbon\Carbon;
use Illuminate\View\View;
use App\AnotherReservation;

class NotificationsComposer
{
    public function compose(View $view)
    {
        $view->with('currentTime', $this->currentTime());
        $view->with('whereHalf', User::where([['usertype', 'User'], ['is_paid', 'Half Payment'], ['is_return', 'Operating']])->get());
        $view->with('anotherWhereHalf', AnotherReservation::where([['is_paid', 'Half Payment'], ['is_return', 'Operating']])->get());
        $view->with('wherePaid', User::where([['usertype', 'User'], ['is_paid', 'Paid'], ['is_return', 'Operating']])->get());
        $view->with('anotherWherePaid', User::where([['usertype', 'User'], ['is_paid', 'Paid'], ['is_return', 'Operating']])->get());
    }

    public function currentTime()
    {
        return Carbon::now('Asia/Manila')->addDays(8);
    }
}