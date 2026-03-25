<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CommunitySignup;
use Illuminate\Http\Request;

class InboxController extends Controller
{
    public function index()
    {
        $signups = CommunitySignup::latest()->paginate(10);
        return view('admin.inbox.index', compact('signups'));
    }

    public function show(CommunitySignup $signup)
    {
        return view('admin.inbox.show', compact('signup'));
    }

    public function destroy(CommunitySignup $signup)
    {
        $signup->delete();
        return redirect()->route('admin.inbox.index')
            ->with('success', 'Signup deleted successfully');
    }

    public function deleteAll(Request $request)
    {
        $count = CommunitySignup::count();
        
        if ($count > 0) {
            CommunitySignup::truncate();
            return redirect()->route('admin.inbox.index')
                ->with('success', "All {$count} signup(s) deleted successfully.");
        }
        
        return redirect()->route('admin.inbox.index')
            ->with('info', 'No signups to delete.');
    }
}
