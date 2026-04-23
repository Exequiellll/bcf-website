<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    public function index()
    {
        $announcements = Announcement::published()
            ->upcoming()
            ->orderBy('published_at', 'desc')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        $pastAnnouncements = Announcement::published()
            ->past()
            ->orderBy('event_date', 'desc')
            ->get();

        return view('announcements.index', compact('announcements', 'pastAnnouncements'));
    }

    public function show($id)
    {
        $announcement = Announcement::published()->findOrFail($id);
        return view('announcements.show', compact('announcement'));
    }
}
