<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use App\Models\School;
use App\Models\Student;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class StudentOverviewController extends Controller {

    public function index() {
        if (Auth()->user()->is_admin == 1) {
            $students = Student::with('school')->orderBy('id_school', 'desc')->get();
        } else {
            $students = Auth()->user()->students;
        }

        return view('school.student.index', compact('students'));
    }

    public function edit(Student $student) {
        $schools = School::select('school_id', 'name')->get();

        return view('school.student.edit', compact('student', 'schools'));
    }

    /**
     * @throws ValidationException
     */
    public function update(Request $request, Student $student): RedirectResponse
    {
        // Validate if the form was correctly filled in
        $this->validate($request, [
            'first_name' => 'required|string|regex:/[a-zA-z]+$/',
            'last_name' => 'required|string|regex:/[a-zA-z]+$/',
            'group' => 'required|integer',
        ], [
            "first_name.regex" => "Een voornaam mag alleen letters bevatten",
            "last_name.regex" => "Een achternaam mag alleen letters bevatten"
        ]);

        // If the validation succeed then we will update the database with the data passes through
        // the form. We use '??' for id_school because as teacher you can't edit the school for a student.
        // Only as an admin you can edit the school, but if we don't use '??' we get a error.
        $student->update([
            'id_school' => $request->school ?? $student->id_school,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'group' => $request->group,
        ]);

        // Redirect to the student overview page and send a success message
        return redirect()->route('student-overview')->with('success', 'Student bijgewerkt!');
    }

    public function destroy(Student $student): RedirectResponse
    {
        // Select and delete the student from the database
        $student->delete();

        // Redirect to the student overview page and send a success message
        return redirect()->route('student-overview')->with('success', 'Student verwijderd!');
    }
}
