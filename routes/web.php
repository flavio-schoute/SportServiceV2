<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\School\ActivityOverviewController;
use App\Http\Controllers\School\AddStudentsController;
use App\Http\Controllers\SportService\AddSchoolController;
use App\Http\Controllers\SportService\AddProviderController;
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

// School endpoints
Route::group(['middleware' => 'auth'], function() {
    Route::get('/add-students', [AddStudentsController::class, 'index'])->name('add-students');
    Route::post('/add-students', [AddStudentsController::class, 'store']);
    Route::get('/activity-overview', [ActivityOverviewController::class, 'index'])->name('activity-overview');
});

// SportService endpoints
Route::group(['middleware' => 'auth'], function() {
    Route::get('/add-schools', [AddSchoolController::class, 'index'])->name('add-schools');
	Route::post('/add-schools', [AddSchoolController::class, 'store']);
	Route::get('/add-providers', [AddProviderController::class, 'index'])->name('add-providers');
	Route::post('/add-providers', [AddProviderController::class, 'store']);
	
});

require_once __DIR__ . '/jetstream.php';
require_once __DIR__ . '/fortify.php';
