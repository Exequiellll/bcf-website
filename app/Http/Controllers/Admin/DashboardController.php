<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use App\Models\Event;
use App\Models\Schedule;
use App\Models\SermonSlide;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'announcements' => Announcement::count(),
            'events' => Event::count(),
            'schedules' => Schedule::count(),
            'sermon' => SermonSlide::first(),
        ];

        $recentAnnouncements = Announcement::latest()->take(5)->get();
        $upcomingEvents = Event::upcoming()->orderBy('event_date')->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentAnnouncements', 'upcomingEvents'));
    }
}
