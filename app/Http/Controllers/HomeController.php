<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Event;
use App\Models\SermonSlide;

class HomeController extends Controller
{
    public function index()
    {
        $announcements = Announcement::published()
            ->orderBy('published_at', 'desc')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        $upcomingEvents = Event::published()
            ->upcoming()
            ->orderBy('event_date', 'asc')
            ->take(5)
            ->get();

        $sermon = SermonSlide::published()->first();

        return view('home', compact('announcements', 'upcomingEvents', 'sermon'));
    }
}
