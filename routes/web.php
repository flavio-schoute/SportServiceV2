<?php

use App\Http\Controllers\CreateAccountController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// When the 'guest' enters the website it will automatically redirect to the login page
Route::redirect('/', '/login');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// SportService endpoints
//Route::group(['middleware' => 'auth'], function() {
//    Route::resource('createaccount', CreateAccountController::class);
//});

require_once __DIR__ . '/jetstream.php';
require_once __DIR__ . '/fortify.php';
