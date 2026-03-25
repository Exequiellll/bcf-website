<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Event;
use App\Models\ChurchPerson;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function index(): Response
    {
        $announcements = Announcement::where('is_published', true)
            ->orderBy('updated_at', 'desc')
            ->get();

        $events = Event::where('is_published', true)
            ->orderBy('updated_at', 'desc')
            ->get();

        $people = ChurchPerson::orderBy('updated_at', 'desc')->get();

        $content = view('sitemap', compact('announcements', 'events', 'people'))->render();

        return response($content, 200)
            ->header('Content-Type', 'application/xml');
    }
}
