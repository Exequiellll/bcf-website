<?php

namespace App\Console\Commands;

use App\Models\Announcement;
use App\Models\Event;
use App\Models\Schedule;
use Illuminate\Console\Command;

class CleanupPastItems extends Command
{
    protected $signature = 'cleanup:past-items';

    protected $description = 'Delete announcements, events, and schedules whose event_date is more than 7 days in the past';

    public function handle(): int
    {
        $cutoff = now()->subDays(7);

        $announcements = Announcement::whereNotNull('event_date')
            ->where('event_date', '<', $cutoff)
            ->delete();

        $events = Event::where('event_date', '<', $cutoff)->delete();

        $schedules = Schedule::whereNotNull('event_date')
            ->where('event_date', '<', $cutoff)
            ->delete();

        $this->info("Cleanup complete:");
        $this->line("  Announcements deleted: {$announcements}");
        $this->line("  Events deleted: {$events}");
        $this->line("  Schedules deleted: {$schedules}");

        return self::SUCCESS;
    }
}
