<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use App\Models\Sports;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ActivityOverviewController extends Controller {

    public function index() {
        $activity = DB::table('activity_registration')
            ->select('sports.name', 'sports.description')
            ->leftJoin('activity_offer', 'activity_registration.uni_activity_name', '=', 'activity_offer.uni_activity_name')
            ->leftJoin('sports', 'activity_offer.id_sport', '=', 'sports.sport_id')
            ->where('activity_registration.id_school', '=', Auth::user()->id_school)
            ->get();

        return view('school.activity-overview', [
            'activities' => $activity
        ]);
    }
}
