<?php

namespace App\Http\Controllers\SportService;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ActivityOverviewController extends Controller {

    public function index() {
        return view('school.activity-overview');
    }
}
