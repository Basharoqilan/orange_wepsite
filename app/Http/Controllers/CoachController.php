<?php

// CoachController.php

namespace App\Http\Controllers;

use App\Models\Coach;
use App\Models\Cohort;
use Illuminate\Http\Request;

class CoachController extends Controller
{
    public function index($cohortId)
    {
        $coaches = Coach::where('cohort_id', $cohortId)->get();
        return view('coaches.index', compact('coaches', 'cohortId'));
    }

    public function create($cohortId)
    {
        return view('coaches.create', compact('cohortId'));
    }

    public function store(Request $request, $cohortId)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
        ]);

        Coach::create([
            'cohort_id' => $cohortId,
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return redirect()->route('coaches.index', $cohortId);
    }

    public function edit($cohortId, $id)
    {
        $coach = Coach::findOrFail($id);
        return view('coaches.edit', compact('coach', 'cohortId'));
    }

    public function update(Request $request, $cohortId, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
        ]);

        $coach = Coach::findOrFail($id);
        $coach->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return redirect()->route('coaches.index', $cohortId);
    }

    public function destroy($cohortId, $id)
    {
        $coach = Coach::findOrFail($id);
        $coach->delete();

        return redirect()->route('coaches.index', $cohortId);
    }
}
