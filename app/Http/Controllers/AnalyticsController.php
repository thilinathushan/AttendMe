<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Badge;
use App\Models\Department;
use App\Models\Lecturer;
use App\Models\Module;
use App\Models\Student;
use Illuminate\Support\Facades\DB;

class AnalyticsController extends Controller
{
    public function ShowAnalytics()
    {
        return view('admin.admin-analytics');
    }

    public function getCounts()
    {
        $badgeCount = Badge::count();
        $departmentCount = Department::count();
        $moduleCount = Module::count();
        $lecturerCount = Lecturer::count();
        $studentCount = Student::count();

        return response()->json([
            'badges' => $badgeCount,
            'departments' => $departmentCount,
            'modules' => $moduleCount,
            'lecturers' => $lecturerCount,
            'students' => $studentCount,
        ]);
    }
}
