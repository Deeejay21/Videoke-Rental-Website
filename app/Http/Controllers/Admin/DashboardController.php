<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Payment;
use Carbon\Carbon;
use App\VideokeTotal;
use App\Charts\SalesChart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(User $user)
    {
        $usersNotification = User::where('usertype', 'User')->get();

        $currentTime = $this->currentTime();

        $date = Carbon::now();

        $year = Carbon::now();

        $total_customers = $user->total_customers();

        $total_videokes = VideokeTotal::count();

        $total_sales = $user->total_sales();

        $total_payments = Payment::count();

        $august = $user->august();
        $september = $user->september();
        $october = $user->october();
        $november = $user->november();
        $december = $user->december();
        $january = $user->january();
        $february = $user->february();
        $march = $user->march();
        $april = $user->april();
        $may = $user->may();
        $june = $user->june();
        $july = $user->july();

        // $total_transactions = User::where('is_completed', 'Completed')->get();

        $chart = new SalesChart;
        $chart->labels([$date->month('8')->format('F'), $date->addMonth()->format('F'), $date->addMonth()->format('F'), $date->addMonth()->format('F'), $date->addMonth()->format('F'), $date->addMonth()->format('F'), $date->addMonth()->format('F'), $date->addMonth()->format('F'), $date->addMonth()->format('F'), $date->addMonth()->format('F'), $date->addMonth()->format('F'), $date->addMonth()->format('F')]);
        $chart->dataset('Total Sales', 'line', [$august, $september, $october, $november, $december, $january, $february, $march, $april, $may, $june, $july])
              ->color('#716aca')
              ->backgroundColor('#716aca')
              ->fill(false);
              
        return view('admin.dashboard.index', compact('total_sales', 'chart', 'year', 'total_payments', 'total_customers', 'total_videokes', 'user', 'currentTime', 'usersNotification'));
    }
}