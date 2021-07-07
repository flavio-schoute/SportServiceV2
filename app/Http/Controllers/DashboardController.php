<?php

namespace App\Http\Controllers;

class DashboardController extends Controller {

    public function index() {

        $greeting = "Goede avond!";

        /* This sets the $time variable to the current hour in the 24 hour clock format */
        $time = date("H");

        /* If the time is less than 1200 hours, show good morning */
        if ($time < "12") {
            $greeting = "Goede morgen!";
        } else {

            /* If the time is grater than or equal to 1200 hours, but less than 1700 hours, so good afternoon */
            if ($time >= "12" && $time < "17") {
                $greeting = "Goede middag!";
            }
        }

        $today = today("Europe/Amsterdam")->format('l d M Y');

        return view('dashboard', compact('greeting', 'today'));
    }
}
