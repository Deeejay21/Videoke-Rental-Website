<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class ReportController extends Controller
{
    public function index()
    {
        $users = User::where([['usertype', 'User'], ['is_paid', 'Paid'], ['is_return', 'Return']])->get();

        return view('admin.report.index', compact('users'));
    }
}
