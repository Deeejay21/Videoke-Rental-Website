<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Videoke;
use App\User;

class VideokesController extends Controller
{
    public function rent()
    {
        $currentTime = $this->currentTime();

        $usersNotification = User::where('usertype', 'User')->get();
        
        $users = User::where('usertype', 'User')->where('is_paid', 'Paid')->get();
        
        return view('admin.videokes.rent', compact('currentTime', 'usersNotification', 'users'));
    }
    
    public function index()
    {
        $videokes = Videoke::all();

        $currentTime = $this->currentTime();

        $usersNotification = User::where('usertype', 'User')->get();
        
        return view('admin.videokes.index', compact('currentTime', 'usersNotification', 'videokes'));
    }

    public function create()
    {   
        $currentTime = $this->currentTime();

        $usersNotification = User::where('usertype', 'User')->get();
        
        return view('admin.videokes.create');
    }

    public function store(Videoke $videoke)
    {
        Videoke::create($this->validateRequest());

        return redirect('/admin/videokes')->with('success', 'Videoke has been successfully added.');
    }

    public function show()
    {
        //
    }

    public function edit(Videoke $videoke)
    {   
        $currentTime = $this->currentTime();

        $usersNotification = User::where('usertype', 'User')->get();
        
        return view('admin.videokes.edit', compact('currentTime', 'usersNotification', 'videoke'));
    }

    public function update(Videoke $videoke)
    {
        $videoke->update($this->validateRequest());

        return redirect('/admin/videokes')->with('update', 'Videoke has been successfully updated.');
    }

    public function destroy(Videoke $videoke)
    {
        $videoke->delete();

        return redirect('/admin/videokes')->with('delete', 'Videoke has been successfully deleted.');
    }

    private function validateRequest()
    {
        return request()->validate([
            'name' => 'required',
            'number' => 'required',
            'price' => 'required',
        ]);
    }
}
