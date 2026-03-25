<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InformationPage;
use Illuminate\Http\Request;

class InformationPageController extends Controller
{
    public function index()
    {
        $pages = InformationPage::orderBy('sort_order')->paginate(15);
        return view('admin.information-pages.index', compact('pages'));
    }

    public function create()
    {
        return view('admin.information-pages.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:information_pages,slug',
            'content' => 'required|string',
            'is_published' => 'boolean',
            'sort_order' => 'nullable|integer',
        ]);

        $validated['is_published'] = $request->has('is_published');
        $validated['sort_order'] = $validated['sort_order'] ?? 0;
        InformationPage::create($validated);

        return redirect()->route('admin.information-pages.index')
            ->with('success', 'Information page created successfully.');
    }

    public function show($id)
    {
        $page = InformationPage::findOrFail($id);
        return view('admin.information-pages.show', compact('page'));
    }

    public function edit($id)
    {
        $page = InformationPage::findOrFail($id);
        return view('admin.information-pages.edit', compact('page'));
    }

    public function update(Request $request, $id)
    {
        $page = InformationPage::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:information_pages,slug,' . $id,
            'content' => 'required|string',
            'is_published' => 'boolean',
            'sort_order' => 'nullable|integer',
        ]);

        $validated['is_published'] = $request->has('is_published');
        $validated['sort_order'] = $validated['sort_order'] ?? 0;
        $page->update($validated);

        return redirect()->route('admin.information-pages.index')
            ->with('success', 'Information page updated successfully.');
    }

    public function destroy($id)
    {
        $page = InformationPage::findOrFail($id);
        $page->delete();

        return redirect()->route('admin.information-pages.index')
            ->with('success', 'Information page deleted successfully.');
    }
}
