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

    public function update(Request $request, User $user) {
        // Validation
        $this->validate($request, [
            'school' => 'required',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'group' => 'required|integer',
        ]);

        $user->update([
            'id_school' => $request->school,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'group' => $request->group,
        ]);

        return redirect()->route('user-overview')->with('success', 'Student met success bewerkt!');
    }

    public function destroy(User $user) {
        // Select and delete the student from the database
        $user->delete();

        // Redirect to the student overview page and send a success message
        return redirect()->route('user-overview')->with('success', 'Student verwijderd!');
    }
}