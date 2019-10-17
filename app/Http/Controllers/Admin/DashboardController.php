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
        $date = Carbon::now();

        $year = Carbon::now();

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

        $chart = new SalesChart;
        $chart->labels([$date->month('8')->format('F'), $date->addMonth()->format('F'), $date->addMonth()->format('F'), $date->addMonth()->format('F'), $date->addMonth()->format('F'), $date->addMonth()->format('F'), $date->addMonth()->format('F'), $date->addMonth()->format('F'), $date->addMonth()->format('F'), $date->addMonth()->format('F'), $date->addMonth()->format('F'), $date->addMonth()->format('F')]);
        $chart->dataset('Total Sales', 'line', [$august, $september, $october, $november, $december, $january, $february, $march, $april, $may, $june, $july])
              ->color('#716aca')
              ->backgroundColor('#716aca')
              ->fill(false);
              
        return view('admin.dashboard.index', compact(
            'chart', 
            'year', 
            'user',
        ));
    }
}