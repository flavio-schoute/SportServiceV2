<?php

namespace App\Http\Controllers\SportService;

use App\Http\Controllers\Controller;
use App\Models\School;
use Illuminate\Support\Facades\DB;

class LinkSchoolActivityController extends Controller {

    public function index() {
        $schools = School::select('school_id', 'name')->get();
        $cohorts = DB::table('cohorts')->select('cohorts.cohort_id', 'cohorts.name', 'activity_locations.location')
            ->leftJoin('activity_locations', 'cohorts.id_activity_locations', '=', 'activity_locations.location_id')
            ->get();
        $activityName = DB::table('activity_offer')->select('uni_activity_name')->get();

        return view('admin.link-school-to-activity', compact('schools', 'cohorts', 'activityName'));
    }
}
