<?php

namespace App\Http\Controllers\SportService;

use App\Http\Controllers\Controller;
use App\Models\ActivityOffer;
use App\Models\Sports;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ActivityController extends Controller {

    public function index() {
        $sports = Sports::select('sport_id', 'name')->get();
        $locations = DB::table('activity_locations')->select()->get();
        $providers = DB::table('providers')->select('provider_id', 'name')->get();

        return view('admin.add-activity', [
            'sports' => $sports,
            'locations' => $locations,
            'providers' => $providers
        ]);
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
