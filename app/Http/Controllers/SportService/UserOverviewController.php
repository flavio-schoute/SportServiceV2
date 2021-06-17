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
        $users = DB::table('users')
            ->select('users.*', 'name')
            ->leftJoin('teacher', 'users.id_teacher', '=', 'teacher.teacher_id')
            ->orderBy('users.id')
            ->get();

        return view('admin.user-overview', [
            'users' => $users,
        ]);
    }
}