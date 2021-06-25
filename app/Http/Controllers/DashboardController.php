<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Laravel\Fortify\Features;

class DashboardController extends Controller {

    public function index() {
        Carbon::setLocale('nl');

        $greetingMessage = "Goede avond!";

        /* This sets the $time variable to the current hour in the 24 hour clock format */
        $time = date("H");

        /* If the time is less than 1200 hours, show good morning */
        if ($time < "12") {
            $greetingMessage = "Goede morgen!";
        } else {

            /* If the time is grater than or equal to 1200 hours, but less than 1700 hours, so good afternoon */
            if ($time >= "12" && $time < "17") {
                $greetingMessage = "Goede middag!";
            }
        }

        return view('dashboard', [
            'greeting' => $greetingMessage,
            'today' => Carbon::today("Europe/Amsterdam")->format('l d M Y'),
        ]);
    }

    public function store() {
        $data = $this->getOptions('registerRoute');
        foreach($data as $item) {
            if ($item->value == 1) {
                dd('value 1');
            } else {
                dd('niet waar');
            }
        }
    }

    // Maybe make this a static function in class somewhere
    private function getOptions($key)
    {
        $data = DB::table('options')->select('key', 'value')->where('key', '=', $key)->get();
        return $data;
    }

}
