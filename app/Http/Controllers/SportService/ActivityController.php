<?php

namespace App\Http\Controllers\SportService;

use App\Http\Controllers\Controller;
use App\Models\ActivityOffer;
use App\Models\Provider;
use App\Models\Sports;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ActivityController extends Controller {

    public function index() {
        $sports = Sports::select('sport_id', 'name')->get();
        $locations = DB::table('activity_locations')->select(['location_id', 'location'])->get();
        $providers = Provider::select('provider_id', 'name')->get();

        return view('admin.add-activity', compact('sports', 'locations', 'providers'));
    }

    public function store(Request $request) {
        // Validation
        $this->validate($request, [
            'provider' => 'required',
            'activity' => 'required',
            'activity_location' => 'required',
            'unique_activity_name' => 'required|string|max:255',
            'total_participants' => 'required',
            'activity_take_place' => 'required'
        ]);

        // Store the teacher in the database, into the user table
        ActivityOffer::create([
            'id_provider' => $request->provider,
            'id_sport' => $request->activity,
            'id_activity_locations' => $request->activity_location,
            'uni_activity_name' => $request->unique_activity_name,
            'number_of_par' => $request->total_participants,
            'acitivity_year' => $request->activity_take_place,
        ]);

        // Redirect
        return redirect()->route('enter-activity')->with('success', 'Activiteit ingevoerd!');
    }
}
