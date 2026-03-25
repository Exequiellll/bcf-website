<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    public function index()
    {
        $announcements = Announcement::published()
            ->orderBy('published_at', 'desc')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('announcements.index', compact('announcements'));
    }

    public function show($id)
    {
        $announcement = Announcement::published()->findOrFail($id);
        return view('announcements.show', compact('announcement'));
    }
}
