<?php


namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use App\Models\Academy;
use Illuminate\Http\Request;

class AcademyController extends Controller
{
    public function index()
    {
        $academies = Academy::all();
        return view('dashboard.academy', compact('academies'));
    }

    public function create()
    {
        return view('dashboard.addAcademy');
    }

    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);


    $data = $request->all();

    if ($request->hasFile('picture')) {
        $data['picture'] = $request->file('picture')->store('academies', 'public');
    }

    Academy::create($data);

    return redirect()->route('academies')->with('success', 'Academy created successfully.');
}



    public function edit($id)
    {
        $academy = Academy::findOrFail($id);
        return view('dashboard.editAcademy', compact('academy'));
    }

    public function update(Request $request, Academy $academy)
    {
        $request->validate([
            'name' => 'nullable|string|max:255',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = [];

        // Update name if provided
        if ($request->filled('name')) {
            $data['name'] = $request->name;
        }

        // Update picture if a new one is uploaded
        if ($request->hasFile('picture')) {
            if ($academy->picture) {
                Storage::disk('public')->delete($academy->picture);
            }
            $data['picture'] = $request->file('picture')->store('academies', 'public');
        }

        // Update the academy with the provided data
        $academy->update($data);

        return redirect()->route('academies')->with('success', 'Academy updated successfully.');
    }




    public function destroy($id)
    {
        $academy = Academy::findOrFail($id);
        $academy->delete();

        return redirect()->route('academies');
    }
}
