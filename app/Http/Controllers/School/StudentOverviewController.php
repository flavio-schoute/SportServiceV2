<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentOverviewController extends Controller {

    public function index() {
        $students = DB::table('students')
            ->select('students.*', 'school.name')
            ->leftJoin('school', 'students.id_school', '=', 'school.school_id')
            ->orderBy('students.id_school')
            ->get();

        return view('school.student-overview', [
            'students' => $students,
        ]);
    }

    public function destroy($id) {
        // Select the student with the ID
        $student = Student::where('student_id', '=', $id);

        // Delete the student from the database
        $student->delete();

        // Redirect to the student overview page and send a success message
        return redirect()->route('student-overview')->with('success', 'Student verwijderd!');
    }
}
