<?php

namespace App\Http\Controllers\SportService;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AddSchoolController extends Controller
{
    public function index() {
		return view('admin.add-school');
	}
}
