<?php

namespace App\Http\Controllers\SportService;

use App\Actions\Fortify\PasswordValidationRules;
use App\Http\Controllers\Controller;
use App\Models\School;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AddTeacherController extends Controller {

    use PasswordValidationRules;

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
			'phone_number' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'password' => $this->passwordRules()
		]);

        // Currently working through use Facades
        $id = DB::table('teacher')->insertGetId(array(
                'id_school' => $request->school,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
        ));

        $firstName = $request->first_name;
        $lastName = $request->last_name;
        $fullName = $firstName . ' ' . $lastName;

        // Store the teacher in the database, into the user table
        User::create([
            'name' => $fullName,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_admin' => false,
            'is_active' => true,
            'id_teacher' => $id,
            'id_school' => $request->school
        ]);

		// Redirect
		return redirect()->route('add-teachers')->with('success', 'Er is een leraar met success ingevoerdt!');
	}
}
