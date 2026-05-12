<?php

namespace App\Providers;

use App\Models\Announcement;
use App\Models\Event;
use App\Models\Schedule;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Share nav counts with the public layout
        View::composer('layouts.app', function ($view) {
            $view->with('navCounts', [
                'announcements' => Announcement::published()->upcoming()->count(),
                'events' => Event::published()->upcoming()->count(),
                'schedules' => Schedule::active()->count(),
            ]);
        });
    }
}
