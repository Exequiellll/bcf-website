<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ChurchPerson;
use Illuminate\Http\Request;

class ChurchPersonController extends Controller
{
    public function index()
    {
        $people = ChurchPerson::ordered()->paginate(15);
        return view('admin.church-people.index', compact('people'));
    }

    public function create()
    {
        return view('admin.church-people.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'bio' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:255',
            'is_featured' => 'boolean',
            'sort_order' => 'nullable|integer',
        ]);

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $filename = time() . '_' . uniqid() . '.' . ($photo->guessExtension() ?? 'jpg');
            $photo->move(public_path('storage/photos'), $filename);
            $validated['photo'] = '/storage/photos/' . $filename;
        } else {
            // No photo uploaded, remove from validated array
            unset($validated['photo']);
        }

        $validated['is_featured'] = $request->has('is_featured');
        $validated['sort_order'] = $validated['sort_order'] ?? 0;
        
        ChurchPerson::create($validated);

        return redirect()->route('admin.church-people.index')
            ->with('success', 'Church person created successfully.');
    }

    public function show($id)
    {
        $person = ChurchPerson::findOrFail($id);
        return view('admin.church-people.show', compact('person'));
    }

    public function edit($id)
    {
        $person = ChurchPerson::findOrFail($id);
        return view('admin.church-people.edit', compact('person'));
    }

    public function update(Request $request, $id)
    {
        $person = ChurchPerson::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'bio' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:255',
            'is_featured' => 'boolean',
            'sort_order' => 'nullable|integer',
        ]);

        if ($request->hasFile('photo')) {
            // Delete old photo if it exists and is a local file
            if ($person->photo && strpos($person->photo, '/storage/photos/') === 0) {
                $oldPhotoPath = public_path($person->photo);
                if (file_exists($oldPhotoPath)) {
                    unlink($oldPhotoPath);
                }
            }
            
            // Upload new photo
            $photo = $request->file('photo');
            $filename = time() . '_' . uniqid() . '.' . ($photo->guessExtension() ?? 'jpg');
            $photo->move(public_path('storage/photos'), $filename);
            $validated['photo'] = '/storage/photos/' . $filename;
        } else {
            // Keep existing photo if no new photo uploaded
            unset($validated['photo']);
        }

        $validated['is_featured'] = $request->has('is_featured');
        $validated['sort_order'] = $validated['sort_order'] ?? 0;
        $person->update($validated);

        return redirect()->route('admin.church-people.index')
            ->with('success', 'Church person updated successfully.');
    }

    public function destroy($id)
    {
        $person = ChurchPerson::findOrFail($id);
        $person->delete();

        return redirect()->route('admin.church-people.index')
            ->with('success', 'Church person deleted successfully.');
    }
}
