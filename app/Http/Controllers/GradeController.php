<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGradeRequest;
use App\Http\Requests\UpdateGradeRequest;

use App\Models\Enrollment;
use App\Models\Grade;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class GradeController extends Controller
{
    public function index(Request $request)
    {
        $subjects = Subject::all();
        $selectedSubject = $request->input('subject_id');

        $enrollments = Enrollment::with(['student', 'subject', 'grades'])
            ->when($selectedSubject, function ($query) use ($selectedSubject) {
                return $query->where('subject_id', $selectedSubject);
            })
            ->get();

        return view('adminPages.adminaddgrades', compact('enrollments', 'subjects', 'selectedSubject'));
    }

    public function store(StoreGradeRequest $request)
    {


        Grade::create([
            'enrollment_id' => $request->enrollment_id,
            'grades' => $request->grades,
        ]);

        return redirect()->route('grades.index')->with('success', 'Grade added successfully.');
    }

    public function update(UpdateGradeRequest $request, $enrollmentId)
    {
       

        Grade::updateOrCreate(
            ['enrollment_id' => $enrollmentId],
            ['grades' => $request->grades]
        );

        return redirect()->route('grades.index')->with('success', 'Grade updated successfully.');
    }

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

        return redirect()->route('grades.index')->with('success', 'Grade removed successfully.');
    }
}
