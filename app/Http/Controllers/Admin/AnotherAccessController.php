<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Carbon\Carbon;
use App\AnotherReservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AnotherAccessController extends Controller
{
    public function show(User $user, AnotherReservation $anotherReservation)
    {
        return view('admin.customers.another_access.show', compact('user', 'anotherReservation'));
    }

    public function edit(User $user, AnotherReservation $anotherReservation)
    {
        $currentDate = Carbon::now('Asia/Manila');

        return view('admin.customers.another_access.edit', compact('user', 'currentDate', 'anotherReservation'));
    }

    public function update(AnotherReservation $anotherReservation)
    {
        $data = request()->validate([
            'is_paid' => '',
            'is_return' => '',
            'videoke_return_issued_at' => ''
        ]);

        $anotherReservation->update($data);

        return redirect('/admin/customer/' . $anotherReservation->id . '/access')->with('update', 'Customer ' . $anotherReservation->user->first_name .  ' has been updated successfully.');
    }
}
