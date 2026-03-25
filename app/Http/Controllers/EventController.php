<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $upcomingEvents = Event::published()
            ->upcoming()
            ->orderBy('event_date', 'asc')
            ->get();

        $pastEvents = Event::published()
            ->where('event_date', '<', now())
            ->orderBy('event_date', 'desc')
            ->get();

        return view('events.index', compact('upcomingEvents', 'pastEvents'));
    }

    public function show($id)
    {
        $event = Event::published()->findOrFail($id);
        return view('events.show', compact('event'));
    }
}
