<?php

namespace App\Http\Controllers\SportService;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Http\Request;

class AddTeacherController extends Controller {

    public function index() {
		return view('admin.add-teacher');
	}

	public function store(Request $request){
		// Validation
		$this->validate($request, [
			'first_name' => 'required',
			'last_name' => 'required',
			'email' => 'required|email|max:255',
			'phone_number' => 'required'
		]);

		// Store the user
		Teacher::create([
			'id_school' => 1,
			'first_name' => $request->first_name,
			'last_name' => $request->last_name,
			'email' => $request->email,
			'phone_number' => $request->phone_number
		]);

		// Redirect
		return redirect()->route('dashboard');
	}
}