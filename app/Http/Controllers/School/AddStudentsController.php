<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use App\Models\School;
use App\Models\Student;
use Illuminate\Http\Request;

class AddStudentsController extends Controller {

    public function index() {
        $schools = School::select('school_id', 'name')->get();

        return view('school.add-students', [
            'school' => $schools
        ]);
    }

    public function store(Request $request) {
        // Validation
        $this->validate($request, [
            'school' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'group' => 'required',
            'birthday' => 'required|date'
        ]);


        // Store the student
        Student::create([
            'id_school' => $request->school,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'group' => $request->group,
            'date_of_birth' => $request->birthday
        ]);

        // Redirect
        return redirect()->route('dashboard');
    }
}
