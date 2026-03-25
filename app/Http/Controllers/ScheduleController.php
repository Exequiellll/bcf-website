<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        $schedules = Schedule::active()
            ->ordered()
            ->get()
            ->unique('title') // Ensure we don't show duplicate schedule entries
            ->groupBy('day_of_week');

        return view('schedules.index', compact('schedules'));
    }
}
