<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Videoke;

class VideokesController extends Controller
{
    public function index()
    {
        $videokes = Videoke::all();

        return view('admin.videokes.index', compact('videokes'));
    }

    public function create()
    {
        return view('admin.videokes.create');
    }

    public function store(Videoke $videoke)
    {
        Videoke::create($this->validateRequest());

        return redirect('/admin/videokes')->with('success', 'Videoke has been successfully added.');
    }

    public function edit(Videoke $videoke)
    {
        return view('admin.videokes.edit', compact('videoke'));
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
