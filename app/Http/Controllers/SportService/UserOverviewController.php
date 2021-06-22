<?php

namespace App\Http\Controllers\SportService;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\School;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserOverviewController extends Controller {

    public function index() {
//        $teacher = DB::table('teacher')
//            ->select('teacher.*', 'school.name')
//            ->leftJoin('school', 'teacher.id_school', '=', 'school.school_id')
//            ->orderBy('school.name', 'ASC')
//            ->get();
//
//        $school = School::select('school_id', 'name', 'email')->get();

//        $users = DB::table('teacher')
//            ->select('teacher.*', 'school.school_id', 'school.name', 'school.email')
//            ->leftJoin('school', 'teacher.id_school', '=', 'school.school_id')
//            ->orderBy('school.name', 'ASC')
//            ->get();

        $users = DB::table('users')
            ->select('users.id', 'users.is_active', 'teacher.teacher_id', 'teacher.first_name', 'teacher.last_name', 'teacher.email', 'school.name')
            ->leftJoin('teacher', 'users.id_teacher', '=', 'teacher.teacher_id')
            ->leftJoin('school', 'teacher.id_school', '=', 'school.school_id')
            ->orderBy('school.name', 'ASC')
            ->get();

        return view('admin.user-overview', [
            'users' => $users,
        ]);
    }

	    public function changeStatus(Request $request)
    {
        $teacher = User::find($request->id_teacher);

		dd ($teacher);
        $teacher->status = $request->is_active;
        $teacher->save();

        return response()->json(['success'=>'Status change successfully.']);
    }
}
