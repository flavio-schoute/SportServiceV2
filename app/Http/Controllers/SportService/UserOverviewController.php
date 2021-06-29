<?php

namespace App\Http\Controllers\SportService;

use App\Http\Controllers\Controller;
use App\Models\School;
use App\Models\Teacher;
use Illuminate\Support\Facades\DB;

class UserOverviewController extends Controller {

    public function index() {
        $users = DB::table('users')
            ->select('users.id', 'users.is_active', 'teacher.teacher_id', 'teacher.first_name', 'teacher.last_name', 'teacher.email', 'school.name')
            ->leftJoin('teacher', 'users.id_teacher', '=', 'teacher.teacher_id')
            ->leftJoin('school', 'teacher.id_school', '=', 'school.school_id')
            ->whereNotNull('users.id_school')
            ->orderBy('school.name', 'ASC')
            ->get();

        return view('admin.user-overview', [
            'users' => $users,
            'schools' => School::select('*')->getQuery()
                ->orderBy('school.settlement_location', 'ASC')
                ->get()
        ]);
    }

    public function destroy(School $school) {
        // Select and delete the school from the database
        $school->delete();

        // Redirect to the school overview page and send a success message
        return redirect()->route('user-overview')->with('success', 'School verwijderd!');
    }

	public function destroyTeacher(Teacher $teacher) {
        // Select and delete the user from the database
        $teacher->delete();

        // Redirect to the user overview page and send a success message
        return redirect()->route('user-overview')->with('success', 'Leraar verwijderd!');
    }
}
