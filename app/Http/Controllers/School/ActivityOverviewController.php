<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ActivityOverviewController extends Controller {

    public function index() {
        // TODO: Make for admin the activity overview

        // Select the sport name and description from the activity_registration
        // And where id_school of the activity_registration equals the id_school in the users table
        $activities = DB::table('activity_registration')
            ->select('sports.name', 'sports.description')
            ->leftJoin('activity_offer', 'activity_registration.uni_activity_name', '=', 'activity_offer.uni_activity_name')
            ->leftJoin('sports', 'activity_offer.id_sport', '=', 'sports.sport_id')
            ->where('activity_registration.id_school', '=', auth()->user()->id_school)
            ->get();

        return view('school.activity-overview', compact('activities'));
    }
}
