<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

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
    public function store(StoreSubjectRequest $request)
    {
        //
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
    public function update(Request $request, string $id)
    {
        $subject = Subject::find($id);
        
        if (!$subject) {
            return redirect()->back()->with('error', 'Student not found!');
        }
    
        
        $data = $request->validate([
            'name' => 'required',
            'code' => 'required|unique:subjects,code,' . $id,
            'units' => 'required',
        ]);
    
        
        $subject->update($data);
    
        return redirect()->route('Admin Subjects')->with('success', 'Subject updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subject $subject)
    {
        $subject->delete(); 
        $subjectList = Subject::all();
        return view ("adminPages.adminSubjects", [
            "ConfirmMessage" => "Subject Deleted Successfully", 
            "alertType" => "success", 
            "subjectList" => $subjectList
        ]);
    }
}
