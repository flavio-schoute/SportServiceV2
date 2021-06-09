<?php

namespace App\Http\Controllers\SportService;

use App\Http\Controllers\Controller;
use App\Models\School;
use Illuminate\Http\Request;


class AddSchoolController extends Controller
{
    public function index() {
		return view('admin.add-school');
	}
	
	public function store(Request $request){

		// Validation
		$this->validate($request, [
			'name' => 'required',
			'email' => 'required|email|max:255',
			'settlement_location' => 'required'
		]);
		// Store the user
		School::create([
			'name' => $request->name,
			'email' => $request->email,
			'settlement_location' => $request->settlement_location
		]);

		// Redirect
		return redirect()->route('dashboard');
		
	}
}
