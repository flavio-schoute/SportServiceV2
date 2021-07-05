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
        // Validation
        // TODO: Make custom error
        $this->validate($request, [
            'school' => 'required',
            'first_name' => 'required|string|regex:/[a-zA-z]/u',
            'last_name' => 'required|string',
            'group' => 'required|integer',
        ]);

        $student->update([
            'id_school' => $request->school,
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
