<?php

namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\Cohort;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $Students = Student::all();
        return view('dashboard.student', compact('Students'));
    }

    public function create()
    {
        $Cohorts = Cohort::all();
        return view('dashboard.addStudent',compact('Cohorts'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'cohort_id' => 'required|exists:cohorts,id',
            'job_title' => 'nullable|string',
            'company_name' => 'nullable|string',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // validate image
        ]);

        // Store the image path if it's provided
        $imagePath = null;
        if ($request->hasFile('picture')) {
            $imagePath = $request->file('picture')->store('student', 'public');
        }

        // Create a new student record
        Student::create([
            'name' => $request->name,
            'email' => $request->email,
            'cohort_id' => $request->cohort_id,
            'job_title' => $request->job_title,
            'company_name' => $request->company_name,
            'picture' => $imagePath,  // Store the image path in the database
        ]);

        return redirect()->route('students')->with('success', 'Student created successfully.');
    }



public function edit($id)
{
    $Student = Student::findOrFail($id);
    $Cohorts = Cohort::all();
    return view('dashboard.editStudent', compact('Student','Cohorts'));
}



public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:students,email,' . $id,
        'cohort_id' => 'required|exists:cohorts,id',
        'job_title' => 'nullable|string',
        'company_name' => 'nullable|string',
        'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $student = Student::findOrFail($id);

    // If there's a new picture, store it and update the student record
    if ($request->hasFile('picture')) {
        // Delete old picture if it exists
        if ($student->picture) {
            Storage::disk('public')->delete($student->picture);
        }

        // Store new picture and update the picture path
        $imagePath = $request->file('picture')->store('student', 'public');
        $student->picture = $imagePath;
    }

    // Update other student details
    $student->name = $request->name;
    $student->email = $request->email;
    $student->cohort_id = $request->cohort_id;
    $student->job_title = $request->job_title;
    $student->company_name = $request->company_name;

    $student->save();

    return redirect()->route('students')->with('success', 'Student updated successfully.');
}





public function destroy($id)
{
    $student = Student::findOrFail($id);
    $student->delete();

    return redirect()->route('students')->with('success', 'student deleted successfully.');
}
}
