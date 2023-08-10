<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Connection;
use App\Models\Department;
use App\Models\Lecturer;
use App\Models\Timetable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TimeController extends Controller
{
    public function Admin()
    {
        $timeline = []; // timeline arror
        $y_s_U_data = []; // filter year ,sem and  update arrar
        $Department = Department::pluck('DepartmentName');
        return view('admin.admin-timetable', compact('timeline', 'Department', 'y_s_U_data'));
    }

    public function  AdminFilter(Request $request)
    {

        $y_U_data = []; // filter year and update arrar
        $y_s_U_data = []; // filter year ,sem and  update arrar
        $timeline = []; // timeline arror 
        $count = 0;  // for loop conut
        $count1 = 0;  // for loop conut

        $Department_input = $request->input('D_name');
        $Year = $request->input('Year');
        $semester = $request->input('semester');

        $startTime = '05:00';
        $endTime = '19:30';
        $interval = 30;

        // Convert the start time and end time to Unix timestamps
        $startTimestamp = strtotime($startTime);
        $endTimestamp = strtotime($endTime);

        // Initialize the current time with the start time
        $currentTime = $startTimestamp;

        // Define the array to store the timeline
        $timeline = [];

        // Loop to add 30 minutes to the time and store it in the timeline array
        while ($currentTime <= $endTimestamp) {
            // Add the current time to the timeline array
            $timeline[] = date('H:i', $currentTime);

            // Increment the time by 30 minutes
            $currentTime += $interval * 60;
        }

        $Department = Department::pluck('DepartmentName');
        $data = Timetable::where('Department', $Department_input)->get(); // select Department

        // select year from timetable_re table
        foreach ($data as $row) {
            if ("$row->year" == "$Year") {
                $y_U_data[$count] = $row;
                $count++;
            }
        }

        // select sem from timetable_re table
        foreach ($y_U_data as $row) {
            if ("$row->sem" == "$semester") {
                $y_s_U_data[$count1] = $row;
                $count1++;
            }
        }
        // dd($y_s_U_data);
        return view('admin.admin-timetable-filter', compact('timeline', 'Department', 'y_s_U_data'));
    }
    //////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function lec($id)
    {
        $timeline = []; // timeline arror
        $data = []; // filter year ,sem and  update arrar
        $count = 0;
        $module = [];
        $Module_input  = null;
        $lecturer = DB::table('lecturers')
            ->where('first_name', $id)
            ->first();

        if ($lecturer) {
            $id = $lecturer->id;
        }

        $filter_lec_nam = Connection::where('L_name', $id)->get(); // l_name ekata adalava module tika arrary

        foreach ($filter_lec_nam as $row) {
            $module[$count] = $row->M_name;
            $count++;
        }
        // dd($module);
        return view('lecturer.lecturer-timetable', compact('timeline', 'module', 'data', 'Module_input'));
    }

    public function  lec_filter(Request $request)
    {

        $timeline = []; // timeline arror 


        $Module_input = $request->input('D_name');

        $startTime = '05:00';
        $endTime = '19:30';
        $interval = 30;

        // Convert the start time and end time to Unix timestamps
        $startTimestamp = strtotime($startTime);
        $endTimestamp = strtotime($endTime);

        // Initialize the current time with the start time
        $currentTime = $startTimestamp;

        // Define the array to store the timeline
        $timeline = [];

        // Loop to add 30 minutes to the time and store it in the timeline array
        while ($currentTime <= $endTimestamp) {
            // Add the current time to the timeline array
            $timeline[] = date('H:i', $currentTime);

            // Increment the time by 30 minutes
            $currentTime += $interval * 60;
        }


        $data = Timetable::where('Module', $Module_input)->get(); // select model



        return view('lecturer.lecturer-timetable', compact('timeline', 'Module', 'Module_input', 'data'));
    }

    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////
}
