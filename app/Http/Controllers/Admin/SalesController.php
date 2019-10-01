<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Payment;
use Carbon\Carbon;
use App\VideokeTotal;
use App\Charts\SalesChart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SalesController extends Controller
{
    public function chart(User $user)
    {
        $currentTime = $this->currentTime();

        $usersNotification = User::where('usertype', 'User')->get();

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
              ->color('#716aca')
              ->backgroundColor('#716aca')
              ->fill(false);
              
        return view('admin.sales.chart', compact('user', 'users', 'total_sales', 'chart', 'year', 'total_payments', 'total_customers', 'total_videokes', 'currentTime', 'usersNotification'));
    }

    public function index()
    {
        $currentTime = $this->currentTime();

        $usersNotification = User::where('usertype', 'User')->get();

        $users = User::where([['usertype', 'User'], ['is_paid', 'Paid']])->get();

        return view('admin.sales.index', compact('currentTime', 'usersNotification', 'users'));
    }

    public function january(User $user)
    {
        $currentTime = $this->currentTime();

        $usersNotification = User::where('usertype', 'User')->get();

        $year = Carbon::now();

        $total_customers = $user->total_customers();

        $total_sales = $user->total_sales();

        $total_payments = Payment::count();

        $january = $user->january();

        $chart = new SalesChart;
        $chart->labels(['January']);
        $chart->dataset('Amount', 'bar', [$january])
              ->color('#716aca')
              ->backgroundColor('#716aca')
              ->fill(false);

        return view('admin.sales.months.january', compact('currentTime', 'usersNotification', 'total_sales', 'january', 'chart', 'year', 'total_payments', 'total_customers'));
    }

    public function february(User $user)
    {
        $currentTime = $this->currentTime();

        $usersNotification = User::where('usertype', 'User')->get();

        $year = Carbon::now();

        $total_customers = $user->total_customers();

        $total_sales = $user->total_sales();

        $total_payments = Payment::count();

        $february = $user->february();

        $chart = new SalesChart;
        $chart->labels(['February']);
        $chart->dataset('Amount', 'bar', [$february])
              ->color('#716aca')
              ->backgroundColor('#716aca')
              ->fill(false);

        return view('admin.sales.months.february', compact('currentTime', 'usersNotification', 'total_sales', 'february', 'chart', 'year', 'total_payments', 'total_customers'));
    }

    public function march(User $user)
    {
        $currentTime = $this->currentTime();

        $usersNotification = User::where('usertype', 'User')->get();

        $year = Carbon::now();

        $total_customers = $user->total_customers();

        $total_sales = $user->total_sales();

        $total_payments = Payment::count();

        $march = $user->march();

        $chart = new SalesChart;
        $chart->labels(['March']);
        $chart->dataset('Amount', 'bar', [$march])
              ->color('#716aca')
              ->backgroundColor('#716aca')
              ->fill(false);

        return view('admin.sales.months.march', compact('currentTime', 'usersNotification', 'total_sales', 'march', 'chart', 'year', 'total_payments', 'total_customers'));
    }

    public function april(User $user)
    {
        $currentTime = $this->currentTime();

        $usersNotification = User::where('usertype', 'User')->get();

        $year = Carbon::now();

        $total_customers = $user->total_customers();

        $total_sales = $user->total_sales();

        $total_payments = Payment::count();

        $april = $user->april();

        $chart = new SalesChart;
        $chart->labels(['April']);
        $chart->dataset('Amount', 'bar', [$april])
              ->color('#716aca')
              ->backgroundColor('#716aca')
              ->fill(false);

        return view('admin.sales.months.april', compact('currentTime', 'usersNotification', 'total_sales', 'april', 'chart', 'year', 'total_payments', 'total_customers'));
    }

    public function may(User $user)
    {
        $currentTime = $this->currentTime();

        $usersNotification = User::where('usertype', 'User')->get();

        $year = Carbon::now();

        $total_customers = $user->total_customers();

        $total_sales = $user->total_sales();

        $total_payments = Payment::count();

        $may = $user->may();

        $chart = new SalesChart;
        $chart->labels(['May']);
        $chart->dataset('Amount', 'bar', [$may])
              ->color('#716aca')
              ->backgroundColor('#716aca')
              ->fill(false);

        return view('admin.sales.months.may', compact('currentTime', 'usersNotification', 'total_sales', 'may', 'chart', 'year', 'total_payments', 'total_customers'));
    }

    public function june(User $user)
    {
        $currentTime = $this->currentTime();

        $usersNotification = User::where('usertype', 'User')->get();

        $year = Carbon::now();

        $total_customers = $user->total_customers();

        $total_sales = $user->total_sales();

        $total_payments = Payment::count();

        $june = $user->june();

        $chart = new SalesChart;
        $chart->labels(['June']);
        $chart->dataset('Amount', 'bar', [$june])
              ->color('#716aca')
              ->backgroundColor('#716aca')
              ->fill(false);

        return view('admin.sales.months.june', compact('currentTime', 'usersNotification', 'total_sales', 'june', 'chart', 'year', 'total_payments', 'total_customers'));
    }

    public function july(User $user)
    {
        $currentTime = $this->currentTime();

        $usersNotification = User::where('usertype', 'User')->get();

        $year = Carbon::now();

        $total_customers = $user->total_customers();

        $total_sales = $user->total_sales();

        $total_payments = Payment::count();

        $july = $user->july();

        $chart = new SalesChart;
        $chart->labels(['July']);
        $chart->dataset('Amount', 'bar', [$july])
              ->color('#716aca')
              ->backgroundColor('#716aca')
              ->fill(false);

        return view('admin.sales.months.july', compact('currentTime', 'usersNotification', 'total_sales', 'july', 'chart', 'year', 'total_payments', 'total_customers'));
    }

    public function august(User $user)
    {
        $currentTime = $this->currentTime();

        $usersNotification = User::where('usertype', 'User')->get();

        $year = Carbon::now();

        $total_customers = $user->total_customers();

        $total_sales = $user->total_sales();

        $total_payments = Payment::count();

        $august = $user->august();

        $chart = new SalesChart;
        $chart->labels(['August']);
        $chart->dataset('Amount', 'bar', [$august])
              ->color('#716aca')
              ->backgroundColor('#716aca')
              ->fill(false);

        return view('admin.sales.months.august', compact('currentTime', 'usersNotification', 'total_sales', 'august', 'chart', 'year', 'total_payments', 'total_customers'));
    }

    public function september(User $user)
    {
        $currentTime = $this->currentTime();

        $usersNotification = User::where('usertype', 'User')->get();

        $year = Carbon::now();

        $total_customers = $user->total_customers();

        $total_sales = $user->total_sales();

        $total_payments = Payment::count();

        $september = $user->september();

        $chart = new SalesChart;
        $chart->labels(['September']);
        $chart->dataset('Amount', 'bar', [$september])
              ->color('#716aca')
              ->backgroundColor('#716aca')
              ->fill(false);

        return view('admin.sales.months.september', compact('currentTime', 'usersNotification', 'total_sales', 'september', 'chart', 'year', 'total_payments', 'total_customers'));
    }

    public function october(User $user)
    {
        $currentTime = $this->currentTime();

        $usersNotification = User::where('usertype', 'User')->get();

        $year = Carbon::now();

        $total_customers = $user->total_customers();

        $total_sales = $user->total_sales();

        $total_payments = Payment::count();

        $october = $user->october();

        $chart = new SalesChart;
        $chart->labels(['October']);
        $chart->dataset('Amount', 'bar', [$october])
              ->color('#716aca')
              ->backgroundColor('#716aca')
              ->fill(false);

        return view('admin.sales.months.october', compact('currentTime', 'usersNotification', 'total_sales', 'october', 'chart', 'year', 'total_payments', 'total_customers'));
    }

    public function november(User $user)
    {
        $currentTime = $this->currentTime();

        $usersNotification = User::where('usertype', 'User')->get();

        $year = Carbon::now();

        $total_customers = $user->total_customers();

        $total_sales = $user->total_sales();

        $total_payments = Payment::count();

        $november = $user->november();

        $chart = new SalesChart;
        $chart->labels(['November']);
        $chart->dataset('Amount', 'bar', [$november])
              ->color('#716aca')
              ->backgroundColor('#716aca')
              ->fill(false);

        return view('admin.sales.months.november', compact('currentTime', 'usersNotification', 'total_sales', 'november', 'chart', 'year', 'total_payments', 'total_customers'));
    }

    public function december(User $user)
    {
        $currentTime = $this->currentTime();

        $usersNotification = User::where('usertype', 'User')->get();

        $year = Carbon::now();

        $total_customers = $user->total_customers();

        $total_sales = $user->total_sales();

        $total_payments = Payment::count();

        $december = $user->december();

        $chart = new SalesChart;
        $chart->labels(['December']);
        $chart->dataset('Amount', 'bar', [$december])
              ->color('#716aca')
              ->backgroundColor('#716aca')
              ->fill(false);

        return view('admin.sales.months.december', compact('currentTime', 'usersNotification', 'total_sales', 'december', 'chart', 'year', 'total_payments', 'total_customers'));
    }
}
