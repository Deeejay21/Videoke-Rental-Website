<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\VideokeTotal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VideokeListsController extends Controller
{
    public function index()
    {
        $currentTime = $this->currentTime();

        $usersNotification = User::where('usertype', 'User')->get();

        $videokes = VideokeTotal::all();

        return view('admin.videokes.lists.index', compact('currentTime', 'usersNotification', 'videokes'));
    }

    public function create()
    {
        $currentTime = $this->currentTime();

        $usersNotification = User::where('usertype', 'User')->get();

        return view('admin.videokes.lists.create', compact('currentTime', 'usersNotification'));
    }

    public function store(VideokeTotal $videokeTotal)
    {
        $currentTime = $this->currentTime();

        $usersNotification = User::where('usertype', 'User')->get();

        VideokeTotal::create($this->validateRequest());

        return redirect('/admin/videokelists')->with('success', 'Videoke has been successfully added.');
    }

    public function show()
    {
        //
    }

    public function edit(VideokeTotal $videokeTotal)
    {
        $currentTime = $this->currentTime();

        $usersNotification = User::where('usertype', 'User')->get();

        return view('admin.videokes.lists.edit', compact('currentTime', 'usersNotification', 'videokeTotal'));
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
            'number' => 'required',
        ]);
    }
}
