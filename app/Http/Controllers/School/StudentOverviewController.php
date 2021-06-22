<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use App\Models\School;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StudentOverviewController extends Controller {

    public function index() {
        // Bad solution, need to find better way

        if (Auth::user()->is_admin == 1) {
            $students = DB::table('students')
                ->select('students.*', 'school.name')
                ->leftJoin('school', 'students.id_school', '=', 'school.school_id')
                ->orderBy('students.id_school')
                ->get();
        } else {
            $students = DB::table('students')
                ->select('students.*', 'school.name')
                ->leftJoin('school', 'students.id_school', '=', 'school.school_id')
                ->orderBy('students.id_school')
                ->where('students.id_school', '=', Auth::user()->id_school)
                ->get();
        }



        return view('school.student-overview', [
            'students' => $students,
        ]);
    }

    public function edit(Student $student) {
        $schools = School::select('school_id', 'name')->get();

        return view('school.student-overview-edit', [
            'student' => $student,
            'schools' => $schools
        ]);
    }

    public function update(Request $request, Student $student) {
        // Validation
        $this->validate($request, [
            'school' => 'required',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'group' => 'required|integer',
        ]);

        $student->update([
            'id_school' => $request->school,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'group' => $request->group,
        ]);

        return redirect()->route('student-overview')->with('success', 'Student met success bewerkt!');
    }

    public function destroy(Student $student) {
        // Select and delete the student from the database
        $student->delete();

        // Redirect to the student overview page and send a success message
        return redirect()->route('student-overview')->with('success', 'Student verwijderd!');
    }
}
