<?php

// CohortController.php

namespace App\Http\Controllers;

use App\Models\Cohort;
use App\Models\Academy;
use Illuminate\Http\Request;

class CohortController extends Controller
{
    public function index()
    {
        $cohorts = Cohort::all();
        return view('dashboard.cohort', compact('cohorts'));
    }

    public function create()
    {
        $Academy = Academy::all();

        return view('dashboard.addCohort', compact('Academy'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'academy_id'=>'required|string'
        ]);

        Cohort::create([
            'academy_id' =>$request->academy_id,
            'name' => $request->name,
        ]);

        return redirect()->route('cohorts');
    }

    public function edit($id)
    {
        $cohort = Cohort::findOrFail($id);
        $academies = Academy::all();

        return view('dashboard.editCohort', compact('cohort', 'academies'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'academy_id' => 'required|exists:academies,id|integer',
        ]);

        $cohort = Cohort::findOrFail($id);
        $cohort->update([
            'name' => $request->name,
            'academy_id' => $request->academy_id,
        ]);

        return redirect()->route('cohorts');
    }

    public function destroy($id)
    {
        $cohort = Cohort::findOrFail($id);
        $cohort->delete();

        return redirect()->route('cohorts');
    }
}
