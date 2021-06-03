<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class WelcomeController extends Controller {

    public function index(): RedirectResponse
    {
        return redirect()->route('login');
    }
}
