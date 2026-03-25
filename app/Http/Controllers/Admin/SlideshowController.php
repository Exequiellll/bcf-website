<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slideshow;
use Illuminate\Http\Request;

class SlideshowController extends Controller
{
    public function index()
    {
        $slideshows = Slideshow::orderBy('order')->get();
        return view('admin.slideshows.index', compact('slideshows'));
    }

    public function create()
    {
        return view('admin.slideshows.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'image_url' => 'required|url',
            'tagline' => 'required|string|max:255',
            'order' => 'required|integer|min:0',
        ]);

        Slideshow::create($validated);
        return redirect()->route('admin.slideshows.index')
            ->with('success', 'Slideshow created successfully.');
    }

    public function edit(Slideshow $slideshow)
    {
        return view('admin.slideshows.edit', compact('slideshow'));
    }

    public function update(Request $request, Slideshow $slideshow)
    {
        $validated = $request->validate([
            'image_url' => 'required|url',
            'tagline' => 'required|string|max:255',
            'order' => 'required|integer|min:0',
        ]);

        $slideshow->update($validated);
        return redirect()->route('admin.slideshows.index')
            ->with('success', 'Slideshow updated successfully.');
    }

    public function destroy(Slideshow $slideshow)
    {
        $slideshow->delete();
        return redirect()->route('admin.slideshows.index')
            ->with('success', 'Slideshow deleted successfully.');
    }

    public function toggleActive(Slideshow $slideshow)
    {
        $slideshow->is_active = !$slideshow->is_active;
        $slideshow->save();
        return redirect()->route('admin.slideshows.index')
            ->with('success', 'Slideshow status updated successfully.');
    }
}
