<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Carbon\Carbon;
use App\Payment;
use App\VideokeTotal;
use App\Charts\SalesChart;

class SalesController extends Controller
{
    public function chart(User $user)
    {
        $users = User::all();

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
              ->color('#0084FF')
              ->backgroundColor('#0084FF')
              ->fill(false);
              
        return view('admin.sales.chart', compact('user', 'users', 'total_sales', 'chart', 'year', 'total_payments', 'total_customers', 'total_videokes'));
    }

    public function index()
    {
        $users = User::where([['usertype', 'User'], ['is_paid', 'Paid']])->get();

        return view('admin.sales.index', compact('users'));
    }

    public function january(User $user)
    {
        $year = Carbon::now();

        $total_customers = $user->total_customers();

        $total_sales = $user->total_sales();

        $total_payments = Payment::count();

        $january = $user->january();

        $chart = new SalesChart;
        $chart->labels(['January']);
        $chart->dataset('Amount', 'bar', [$january])
              ->color('#0084FF')
              ->backgroundColor('#0084FF')
              ->fill(false);

        return view('admin.sales.months.january', compact('total_sales', 'january', 'chart', 'year', 'total_payments', 'total_customers'));
    }

    public function february(User $user)
    {
        $year = Carbon::now();

        $total_customers = $user->total_customers();

        $total_sales = $user->total_sales();

        $total_payments = Payment::count();

        $february = $user->february();

        $chart = new SalesChart;
        $chart->labels(['February']);
        $chart->dataset('Amount', 'bar', [$february])
              ->color('#0084FF')
              ->backgroundColor('#0084FF')
              ->fill(false);

        return view('admin.sales.months.february', compact('total_sales', 'february', 'chart', 'year', 'total_payments', 'total_customers'));
    }

    public function march(User $user)
    {
        $year = Carbon::now();

        $total_customers = $user->total_customers();

        $total_sales = $user->total_sales();

        $total_payments = Payment::count();

        $march = $user->march();

        $chart = new SalesChart;
        $chart->labels(['March']);
        $chart->dataset('Amount', 'bar', [$march])
              ->color('#0084FF')
              ->backgroundColor('#0084FF')
              ->fill(false);

        return view('admin.sales.months.march', compact('total_sales', 'march', 'chart', 'year', 'total_payments', 'total_customers'));
    }

    public function april(User $user)
    {
        $year = Carbon::now();

        $total_customers = $user->total_customers();

        $total_sales = $user->total_sales();

        $total_payments = Payment::count();

        $april = $user->april();

        $chart = new SalesChart;
        $chart->labels(['April']);
        $chart->dataset('Amount', 'bar', [$april])
              ->color('#0084FF')
              ->backgroundColor('#0084FF')
              ->fill(false);

        return view('admin.sales.months.april', compact('total_sales', 'april', 'chart', 'year', 'total_payments', 'total_customers'));
    }

    public function may(User $user)
    {
        $year = Carbon::now();

        $total_customers = $user->total_customers();

        $total_sales = $user->total_sales();

        $total_payments = Payment::count();

        $may = $user->may();

        $chart = new SalesChart;
        $chart->labels(['May']);
        $chart->dataset('Amount', 'bar', [$may])
              ->color('#0084FF')
              ->backgroundColor('#0084FF')
              ->fill(false);

        return view('admin.sales.months.may', compact('total_sales', 'may', 'chart', 'year', 'total_payments', 'total_customers'));
    }

    public function june(User $user)
    {
        $year = Carbon::now();

        $total_customers = $user->total_customers();

        $total_sales = $user->total_sales();

        $total_payments = Payment::count();

        $june = $user->june();

        $chart = new SalesChart;
        $chart->labels(['June']);
        $chart->dataset('Amount', 'bar', [$june])
              ->color('#0084FF')
              ->backgroundColor('#0084FF')
              ->fill(false);

        return view('admin.sales.months.june', compact('total_sales', 'june', 'chart', 'year', 'total_payments', 'total_customers'));
    }

    public function july(User $user)
    {
        $year = Carbon::now();

        $total_customers = $user->total_customers();

        $total_sales = $user->total_sales();

        $total_payments = Payment::count();

        $july = $user->july();

        $chart = new SalesChart;
        $chart->labels(['July']);
        $chart->dataset('Amount', 'bar', [$july])
              ->color('#0084FF')
              ->backgroundColor('#0084FF')
              ->fill(false);

        return view('admin.sales.months.july', compact('total_sales', 'july', 'chart', 'year', 'total_payments', 'total_customers'));
    }

    public function august(User $user)
    {
        $year = Carbon::now();

        $total_customers = $user->total_customers();

        $total_sales = $user->total_sales();

        $total_payments = Payment::count();

        $august = $user->august();

        $chart = new SalesChart;
        $chart->labels(['August']);
        $chart->dataset('Amount', 'bar', [$august])
              ->color('#0084FF')
              ->backgroundColor('#0084FF')
              ->fill(false);

        return view('admin.sales.months.august', compact('total_sales', 'august', 'chart', 'year', 'total_payments', 'total_customers'));
    }

    public function september(User $user)
    {
        $year = Carbon::now();

        $total_customers = $user->total_customers();

        $total_sales = $user->total_sales();

        $total_payments = Payment::count();

        $september = $user->september();

        $chart = new SalesChart;
        $chart->labels(['September']);
        $chart->dataset('Amount', 'bar', [$september])
              ->color('#0084FF')
              ->backgroundColor('#0084FF')
              ->fill(false);

        return view('admin.sales.months.september', compact('total_sales', 'september', 'chart', 'year', 'total_payments', 'total_customers'));
    }

    public function october(User $user)
    {
        $year = Carbon::now();

        $total_customers = $user->total_customers();

        $total_sales = $user->total_sales();

        $total_payments = Payment::count();

        $october = $user->october();

        $chart = new SalesChart;
        $chart->labels(['October']);
        $chart->dataset('Amount', 'bar', [$october])
              ->color('#0084FF')
              ->backgroundColor('#0084FF')
              ->fill(false);

        return view('admin.sales.months.october', compact('total_sales', 'october', 'chart', 'year', 'total_payments', 'total_customers'));
    }

    public function november(User $user)
    {
        $year = Carbon::now();

        $total_customers = $user->total_customers();

        $total_sales = $user->total_sales();

        $total_payments = Payment::count();

        $november = $user->november();

        $chart = new SalesChart;
        $chart->labels(['November']);
        $chart->dataset('Amount', 'bar', [$november])
              ->color('#0084FF')
              ->backgroundColor('#0084FF')
              ->fill(false);

        return view('admin.sales.months.november', compact('total_sales', 'november', 'chart', 'year', 'total_payments', 'total_customers'));
    }

    public function december(User $user)
    {
        $year = Carbon::now();

        $total_customers = $user->total_customers();

        $total_sales = $user->total_sales();

        $total_payments = Payment::count();

        $december = $user->december();

        $chart = new SalesChart;
        $chart->labels(['December']);
        $chart->dataset('Amount', 'bar', [$december])
              ->color('#0084FF')
              ->backgroundColor('#0084FF')
              ->fill(false);

        return view('admin.sales.months.december', compact('total_sales', 'december', 'chart', 'year', 'total_payments', 'total_customers'));
    }
}
