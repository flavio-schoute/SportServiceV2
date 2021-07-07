<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use App\Models\ActivityRegistration;

class ActivityOverviewController extends Controller {

    public function index() {
        // TODO: Make for admin the activity overview

        // Select the sport name and description from the activity_registration
        // And where id_school of the activity_registration equals the id_school in the users table
//        $activities = DB::table('activity_registration')
//            ->select('sports.name', 'sports.description')
//            ->leftJoin('activity_offer', 'activity_registration.uni_activity_name', '=', 'activity_offer.uni_activity_name')
//            ->leftJoin('sports', 'activity_offer.id_sport', '=', 'sports.sport_id')
//            ->where('activity_registration.id_school', '=', auth()->user()->id_school)
//            ->get();

        // improved.

        // this get all the activityOffers with the right relation.
        // its better to use ->paginate(25); instead of ->get();
        // than you have automatic a pagination functionality in your webpage.
        // use in the blade this to get the links: {{ $activities->links() }}

        if (auth()->user()->is_admin) {
            $activities = ActivityRegistration::with('activityOffer')
                ->paginate(10);
        } else {
            $activities = ActivityRegistration::with('activityOffer')
                ->where('id_school', '=' , auth()->user()->id_school)
                ->paginate(10);
        }

        return view('school.activity-overview', compact('activities'));
    }
}
