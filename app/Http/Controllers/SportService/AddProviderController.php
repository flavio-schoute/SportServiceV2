<?php

namespace App\Http\Controllers\SportService;

use App\Http\Controllers\Controller;
use App\Models\Provider;
use Illuminate\Http\Request;


class AddProviderController extends Controller
{
    public function index() {
		return view('admin.add-provider');
	}
	
	public function store(Request $request){

		// Validation
		$this->validate($request, [
			'name' => 'required',
			'materials' => 'required',
			'email' => 'required|email|max:255'
			
		]);
		// Store the user
		Provider::create([
			'name' => $request->name,
			'materials' => $request->materials,
			'email' => $request->email
			
		]);

		// Redirect
		return redirect()->route('dashboard');
		
	}
}