<?php

namespace App\Http\Controllers\SportService;

use App\Http\Controllers\Controller;
use App\Models\School;
use App\Models\Teacher;
use Illuminate\Http\Request;

class AddTeacherController extends Controller {

    public function index() {
        $schools = School::select('school_id', 'name')->get();

        return view('admin.add-teacher', [
            'schools' => $schools
        ]);
	}

	public function store(Request $request){
		// Validation
		$this->validate($request, [
            'school' => 'required',
            'first_name' => 'required',
			'last_name' => 'required',
			'email' => 'required|email|max:255',
			'phone_number' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10'
		]);

		// Store the user
		Teacher::create([
			'id_school' => $request->school,
			'first_name' => $request->first_name,
			'last_name' => $request->last_name,
			'email' => $request->email,
			'phone_number' => $request->phone_number
		]);

		// Redirect
		return redirect()->route('add-teachers')->with('success', 'Er is een leraar met success ingevoerdt!');
	}
}
