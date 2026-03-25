<?php

namespace App\Http\Controllers;

use App\Models\ChurchPerson;
use Illuminate\Http\Request;

class ChurchPersonController extends Controller
{
    public function index()
    {
        $foundingPastors = ChurchPerson::byRole('Founding Pastor')->ordered()->get();
        $pastors = ChurchPerson::byRole('Pastor')->ordered()->get();
        $singers = ChurchPerson::byRole('Singer')->ordered()->get();
        $bandMembers = ChurchPerson::byRole('Band Member')->ordered()->get();
        $leaders = ChurchPerson::byRole('Leader')->ordered()->get();
        $featured = ChurchPerson::featured()->ordered()->get();

        return view('church-people.index', compact('foundingPastors', 'pastors', 'singers', 'bandMembers', 'leaders', 'featured'));
    }

    public function show($id)
    {
        $person = ChurchPerson::findOrFail($id);
        return view('church-people.show', compact('person'));
    }
}
