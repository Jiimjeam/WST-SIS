<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

use App\Http\Requests\UpdateSubjectRequest;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function adminSubject()
    {
        $subjectList = Subject::all();
        return view ('adminPages.adminSubjects', 
            [
                'subjectList' => $subjectList
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("adminPages.modals.subject.subjectCreate");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'code' => 'required|max:10|unique:subjects,code',
            'units' => 'required',
        ]);
    
        $subject = new Subject();
        $subject->name = $data['name'];
        $subject->code = $data['code'];
        $subject->units = $data['units'];
    
        $subject->save();
    
        return redirect()->route('Admin Subjects')->with('success', 'Subject created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Subject $subject)
    {
        return view ('adminPages.modals.subject.viewSubject', 
            [
                "subject" => $subject,
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subject $subject)
    {
        return view('adminPages.modals.subject.subjectEdit',
            [
                "subject" => $subject
            ]
    );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSubjectRequest $request, string $id)
{
    $subject = Subject::find($id);

    if (!$subject) {
        return redirect()->back()->with('error', 'Subject not found!');
    }

    $subject->update($request->validated());

    return redirect()->route('Admin Subjects')->with('success', 'Subject updated successfully!');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subject $subject)
    {
        // Check enrolled students
        if ($subject->enrollments()->exists()) {
            return response()->json([
                "ConfirmMessage" => "Cannot delete this subject because students are enrolled.",
                "alertType" => "error"
            ], 400); 
        }
    
        // Delete sub if no student
        $subject->delete();
        return response()->json([
            "ConfirmMessage" => "Subject deleted successfully.",
            "alertType" => "success"
        ]);
    }
    

}
