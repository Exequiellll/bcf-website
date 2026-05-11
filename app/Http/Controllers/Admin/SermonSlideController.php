<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SermonSlide;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SermonSlideController extends Controller
{
    public function index()
    {
        $sermon = SermonSlide::first();
        return view('admin.sermon-slides.index', compact('sermon'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'speaker' => 'nullable|string|max:255',
            'sermon_date' => 'required|date',
            'slides' => 'required|array|min:1|max:30',
            'slides.*' => 'required|image|mimes:jpeg,png,jpg,webp|max:10240',
        ], [
            'slides.required' => 'Please upload at least one slide image.',
            'slides.*.image' => 'Each slide must be an image (JPG, PNG, or WEBP).',
            'slides.*.max' => 'Each slide image must be 10MB or smaller.',
        ]);

        // Delete the previous sermon entirely (single-record system)
        $previous = SermonSlide::first();
        if ($previous) {
            $previous->deleteImageFiles();
            $previous->delete();
        }

        // Ensure the storage directory exists
        $uploadDir = public_path('storage/sermon-slides');
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0775, true);
        }

        // Sort files by their original name so PowerPoint's Slide1, Slide2, ... order is preserved
        $files = collect($request->file('slides'))
            ->sortBy(fn ($file) => $this->naturalSortKey($file->getClientOriginalName()))
            ->values();

        $savedPaths = [];
        $prefix = time() . '_' . Str::random(6);

        foreach ($files as $index => $file) {
            $ext = $file->guessExtension() ?: 'jpg';
            $filename = $prefix . '_slide-' . str_pad($index + 1, 2, '0', STR_PAD_LEFT) . '.' . $ext;
            $file->move($uploadDir, $filename);
            $savedPaths[] = '/storage/sermon-slides/' . $filename;
        }

        SermonSlide::create([
            'title' => $validated['title'],
            'speaker' => $validated['speaker'] ?? null,
            'sermon_date' => $validated['sermon_date'],
            'slides' => $savedPaths,
            'is_published' => true,
        ]);

        return redirect()->route('admin.sermon-slides.index')
            ->with('success', 'Sermon slides published. Now showing on the homepage.');
    }

    public function destroy()
    {
        $sermon = SermonSlide::first();
        if ($sermon) {
            $sermon->deleteImageFiles();
            $sermon->delete();
            return redirect()->route('admin.sermon-slides.index')
                ->with('success', 'Sermon slides removed.');
        }

        return redirect()->route('admin.sermon-slides.index')
            ->with('success', 'No sermon to remove.');
    }

    public function reorder(Request $request)
    {
        $validated = $request->validate([
            'order' => 'required|array|min:1',
            'order.*' => 'required|string',
        ]);

        $sermon = SermonSlide::first();
        if (!$sermon) {
            return response()->json(['success' => false, 'message' => 'No sermon found'], 404);
        }

        // Verify the new order contains exactly the same paths as the existing slides
        $existing = collect($sermon->slides)->sort()->values()->all();
        $submitted = collect($validated['order'])->sort()->values()->all();

        if ($existing !== $submitted) {
            return response()->json(['success' => false, 'message' => 'Slide list mismatch'], 422);
        }

        $sermon->slides = $validated['order'];
        $sermon->save();

        return response()->json(['success' => true]);
    }

    public function toggle()
    {
        $sermon = SermonSlide::first();
        if ($sermon) {
            $sermon->update(['is_published' => !$sermon->is_published]);
            $message = $sermon->is_published
                ? 'Sermon slides now visible on the homepage.'
                : 'Sermon slides hidden from the homepage.';
            return redirect()->route('admin.sermon-slides.index')->with('success', $message);
        }

        return redirect()->route('admin.sermon-slides.index');
    }

    /**
     * Natural-sort key: ensures Slide2.JPG comes before Slide10.JPG.
     */
    private function naturalSortKey(string $name): string
    {
        return preg_replace_callback('/\d+/', fn ($m) => str_pad($m[0], 10, '0', STR_PAD_LEFT), $name);
    }
}
