<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\VideokeTotal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VideokeListsController extends Controller
{
    public function index(User $user)
    {
        $videokes = VideokeTotal::all();

        return view('admin.videokes.lists.index', compact('user', 'videokes'));
    }

    public function create(User $user)
    {
        return view('admin.videokes.lists.create', compact('user'));
    }

    public function store(VideokeTotal $videokeTotal)
    {
        VideokeTotal::create($this->validateRequest());

        return redirect('/admin/videokelists')->with('success', 'Videoke has been successfully added.');
    }

    public function edit(User $user, VideokeTotal $videokeTotal)
    {
        return view('admin.videokes.lists.edit', compact('user', 'videokeTotal'));
    }

    public function update(VideokeTotal $videokeTotal)
    {
        $videokeTotal->update($this->validateRequest());

        return redirect('/admin/videokelists')->with('update', 'Videoke has been successfully updated.');
    }

    public function destroy(VideokeTotal $videokeTotal)
    {
        $videokeTotal->delete();

        return redirect('/admin/videokelists')->with('delete', 'Videoke has been successfully deleted.');
    }

    private function validateRequest()
    {
        return request()->validate([
            'number' => 'required|unique:videoke_totals',
        ]);
    }
}
