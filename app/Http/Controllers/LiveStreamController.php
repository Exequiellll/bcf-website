<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class LiveStreamController extends Controller
{
    public function index()
    {
        $facebookEmbedUrl = Setting::get('facebook_live_embed_url', '');
        return view('live-stream', compact('facebookEmbedUrl'));
    }
}
