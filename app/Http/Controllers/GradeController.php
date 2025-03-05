<?php

namespace App\Http\Controllers;
use App\Models\Enrollment;
use App\Models\Grade;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $subjects = Subject::all();
        $selectedSubject = $request->input('subject_id');

        $enrollments = Enrollment::with('student', 'subject', 'grades')
            ->when($selectedSubject, function ($query) use ($selectedSubject) {
                return $query->where('subject_id', $selectedSubject);
            })
            ->get();

        return view('adminPages.adminaddgrades', compact('enrollments', 'subjects', 'selectedSubject'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Grade $grade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Grade $grade)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $enrollmentId)
    {
        $request->validate([
            'grades' => 'nullable|numeric|min:0|max:100',
        ]);

        $enrollment = Enrollment::findOrFail($enrollmentId);
        Grade::updateOrCreate(
            ['enrollment_id' => $enrollmentId],
            ['grades' => $request->input('grades')]
        );

        return redirect()->route('Admin Add Grades')->with('success', 'Grade updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Log::info('Attempting to delete grade with ID: ' . $id);

        $grade = Grade::find($id);

        if (!$grade) {
            Log::warning('Grade not found for ID: ' . $id);
            return redirect()->route('grades.index')->with('error', 'Grade not found.');
        }

        $grade->delete();

        Log::info('Successfully deleted grade with ID: ' . $id);

        return redirect()->route('Admin Add Grades')->with('success', 'Grade removed successfully.');
    }
}
