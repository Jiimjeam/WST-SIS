<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use App\Models\Grade;
use App\Models\Subject;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;


use App\Http\Requests\UpdateGradeRequest;


class GradeController extends Controller
{
    // Display all enrolled students with grades, filter by subject
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

    // Store a new grade
    public function store(StoreGradeRequest $request)
    {
        Grade::create([
            'enrollment_id' => $request->enrollment_id,
            'grades' => $request->grades,
        ]);

        return redirect()->route('Admin Add Grades')->with('success', 'Grade added successfully.');
    }

    // Update a student's grade via modal
    public function update(UpdateGradeRequest $request, $enrollmentId)
    {
        $enrollment = Enrollment::findOrFail($enrollmentId);

        Grade::updateOrCreate(
            ['enrollment_id' => $enrollmentId],
            ['grades' => $request->grade]
        );

        return redirect()->route('Admin Add Grades')->with('success', 'Grade updated successfully.');
    }

    // Delete a grade
    public function destroy($id)
    {
        Log::info('Attempting to delete grade with ID: ' . $id);

        $grade = Grade::find($id);

        if (!$grade) {
            Log::warning('Grade not found for ID: ' . $id);
            return redirect()->route('Admin Add Grades')->with('error', 'Grade not found.');
        }

        $grade->delete();

        Log::info('Successfully deleted grade with ID: ' . $id);

        return redirect()->route('Admin Add Grades')->with('success', 'Grade removed successfully.');
    }
}