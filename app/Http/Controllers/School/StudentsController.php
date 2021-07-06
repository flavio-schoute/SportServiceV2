<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use App\Models\School;
use App\Models\Student;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class StudentsController extends Controller {

    public function index() {
        $schools = School::select('school_id', 'name')->get();

        return view('school.student.add', compact('schools'));
    }

    /**
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // Validate if the form was correctly filled in
        $this->validate($request, [
            'school' => 'required',
            'first_name' => 'required',
            'last_name' => 'nullable' ,
            'group' => 'nullable',
            'birthday' => 'nullable|date'
        ]);

        // If the validation succeed then we will store the student in the database with the data passes through
        // the form. We use '??' for last_name and date_of_birth because if there is no data passed the database should fill it with null because
        // these form values are optional. And for group about the same only then with '?'.
        Student::create([
            'id_school' => $request->school,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name ?? null,
            'group' => $request->group != 0 ? $request->group : null,
            'date_of_birth' => $request->birthday ?? null
        ]);

        // Redirect back to the same page
        return back();
    }
}
