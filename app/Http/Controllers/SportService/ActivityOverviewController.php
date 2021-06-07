<?php

namespace App\Http\Controllers\SportService;

use App\Http\Controllers\Controller;
use App\Models\Sports;
use Illuminate\Http\Request;

class ActivityOverviewController extends Controller {

    public function index() {
        $activity = Sports::select('name', 'description')->get();

        return view('school.activity-overview', [
            'activities' => $activity
        ]);
    }
}
