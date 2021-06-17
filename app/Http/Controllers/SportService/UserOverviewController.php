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
        $teacher = DB::table('teacher')
            ->select('teacher.*', 'school.name')
            ->leftJoin('school', 'teacher.id_school', '=', 'school.school_id')
            ->orderBy('school.name', 'ASC')
            ->get();

        return view('admin.user-overview', [
            'users' => $teacher,
        ]);
    }
}
