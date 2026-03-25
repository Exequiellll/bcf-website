<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class LiveStreamController extends Controller
{
    public function index()
    {
        $facebookEmbedUrl = Setting::get('facebook_live_embed_url', '');
        $isLive = Setting::get('is_live', false);
        $liveTitle = Setting::get('live_title', 'Live Stream');
        $liveDescription = Setting::get('live_description', '');
        
        return view('admin.livestream.index', compact('facebookEmbedUrl', 'isLive', 'liveTitle', 'liveDescription'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'facebook_live_embed_url' => 'nullable|string',
            'is_live' => 'boolean',
            'live_title' => 'nullable|string|max:255',
            'live_description' => 'nullable|string|max:500',
        ]);

        $embedCode = $validated['facebook_live_embed_url'] ?? '';
        $embedCode = $this->sanitizeEmbed($embedCode);

        Setting::set('facebook_live_embed_url', $embedCode);
        Setting::set('is_live', $request->has('is_live'));
        Setting::set('live_title', $validated['live_title'] ?? 'Live Stream');
        Setting::set('live_description', $validated['live_description'] ?? '');

        return redirect()->route('admin.livestream.index')
            ->with('success', 'Live stream settings updated successfully.');
    }

    public function toggleLive(Request $request)
    {
        $isLive = $request->get('is_live', false);
        Setting::set('is_live', $isLive);

        return response()->json([
            'success' => true,
            'is_live' => $isLive,
            'message' => $isLive ? 'Live stream is now active' : 'Live stream is now inactive'
        ]);
    }

    /**
     * Sanitize embed code to only allow safe iframe tags from trusted domains.
     */
    private function sanitizeEmbed(string $html): string
    {
        if (empty(trim($html))) {
            return '';
        }

        $allowedDomains = [
            'www.facebook.com',
            'web.facebook.com',
            'www.youtube.com',
            'youtube.com',
            'player.vimeo.com',
        ];

        // Extract iframe tags only
        if (!preg_match('/<iframe\s[^>]*src=["\']([^"\']+)["\'][^>]*><\/iframe>/i', $html, $matches)) {
            return '';
        }

        $src = $matches[1];
        $parsedUrl = parse_url($src);
        $host = $parsedUrl['host'] ?? '';

        if (!in_array($host, $allowedDomains, true)) {
            return '';
        }

        // Rebuild a clean iframe with only safe attributes
        $safeSrc = htmlspecialchars($src, ENT_QUOTES, 'UTF-8');
        return '<iframe src="' . $safeSrc . '" width="100%" height="400" style="border:none;overflow:hidden" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>';
    }
}
