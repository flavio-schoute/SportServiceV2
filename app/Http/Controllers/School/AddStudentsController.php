<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AddStudentsController extends Controller {

    public function index() {
        return view('school.add-students');
    }
}
