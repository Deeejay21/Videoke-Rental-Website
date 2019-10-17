<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Videoke;
use App\AnotherReservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VideokesController extends Controller
{
    public function rent(User $user)
    {
        $users = User::where('usertype', 'User')->where([['is_paid', 'Paid'], ['is_return', 'Operating']])->get();

        $anotherRent = AnotherReservation::where([['is_paid', 'Paid'], ['is_return', 'Operating']])->get();

        return view('admin.videokes.rent', compact(
            'anotherRent', 
            'users',
            'user', 
        ));
    }
    
    public function index(User $user)
    {
        $videokes = Videoke::all();

        $usersNotification = User::where('usertype', 'User')->get();
        
        return view('admin.videokes.index', compact('user', 'videokes'));
    }

    public function create(User $user)
    {   
        return view('admin.videokes.create', compact('user'));
    }

    public function store(Videoke $videoke)
    {
        Videoke::create($this->validateRequest());

        return redirect('/admin/videokes')->with('success', 'Videoke has been successfully added.');
    }

    public function edit(User $user, Videoke $videoke)
    {   
        return view('admin.videokes.edit', compact('user', 'videoke'));
    }

    public function update(Videoke $videoke)
    {
        $data = request()->validate([
            'name'      => 'required|unique:videokes,name,'.$videoke->id,
            'price'     => 'required',
            'number'    => 'required',
        ]);

        $videoke->update($data);

        return redirect('/admin/videokes')->with('update', 'The ' . $videoke->name . ' has been successfully updated.');
    }

    public function destroy(Videoke $videoke)
    {
        $videoke->delete();

        return redirect('/admin/videokes')->with('delete',  'The ' . $videoke->name . ' has been successfully deleted.');
    }

    private function validateRequest()
    {
        return request()->validate([
            'name'      => 'required|unique:videokes',
            'price'     => 'required',
            'number'    => 'required',
        ]);
    }
}
