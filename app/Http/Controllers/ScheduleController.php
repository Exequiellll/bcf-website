<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        $schedules = Schedule::active()
            ->upcoming()
            ->ordered()
            ->get()
            ->unique('title')
            ->groupBy('day_of_week');

        $pastSchedules = Schedule::active()
            ->past()
            ->orderBy('event_date', 'desc')
            ->get();

        return view('schedules.index', compact('schedules', 'pastSchedules'));
    }
}
