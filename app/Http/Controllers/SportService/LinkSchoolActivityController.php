<?php

namespace App\Http\Controllers\SportService;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LinkSchoolActivityController extends Controller {

    public function index() {
        return view('admin.link-school-to-activity');
    }
}
