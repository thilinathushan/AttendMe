<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Module;
use App\Models\Timetable;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;

class TimetableController extends Controller
{
    public function index()
    {
        $Department = Department::pluck('DepartmentName');
        $Module = Module::pluck('ModuleName');


        return view('admin.admin-add-timetable', compact('Department', 'Module'));
    }

    // conditions

    // ekama davase lectures 2 k ekama velave thiyenna ba 
    //  le
    public function save(Request $request)
    {
        $dape = $request->input('D_name'); // input Department name
        $day = $request->input('day');  // input day
        $s_T = $request->input('S_time'); // input Start time
        $e_T = $request->input('E_time'); // input Start time
        $Year = $request->input('Year'); // input year 
        $Semester = $request->input('Semester'); // input sem
        $y_U_data = []; // filter year and update arrar
        $y_s_U_data = []; // filter year ,sem and  update arrar
        $y_s_d_U_data = []; // filter year ,sem ,day and  update arrar
        $count = 0;  // for loop conut


        $data = Timetable::where('Department', $dape)->get(); // select Department


        // select year
        foreach ($data as $row) {
            if ("$row->year" == "$Year") {
                $y_U_data[$count] = $row;
                $count++;
            }
        }

        // select sem
        foreach ($y_U_data as $row) {
            if ("$row->sem" == "$Semester") {
                $y_s_U_data[$count] = $row;
                $count++;
            }
        }

        // select day
        foreach ($y_s_U_data as $row) {
            if ("$row->Day" == "$day") {
                $y_s_d_U_data[$count] = $row;
                $count++;
            }
        }

        // cheack valide time
        foreach ($y_s_d_U_data as $row) {

            if (((float)$s_T == (float)$row->start_t) && ((float)$e_T == (float)$row->end_t)) { // t t

                return redirect()->intended(RouteServiceProvider::ADMINDASHCOPY)->with('status', ' There is no Timeslot available at this time.!'); // mevelave thiyanava 
                break;
            } else if (((float)$s_T > (float)$row->start_t &&  (float)$s_T < (float)$row->end_t) || ((float)$e_T > (float)$row->start_t &&  (float)$e_T < (float)$row->end_t)) {   // execute if $s_T is between start and end time   t f , f t

                if (((float)$s_T > (float)$row->start_t &&  (float)$s_T < (float)$row->end_t)) { // fist condition

                    (float)$ava = (((float)$e_T) - ((float)$row->end_t));
                    return redirect()->intended(RouteServiceProvider::ADMINDASHCOPY)->with('status', 'There is ' . (string)$ava . 'hours Available after ' . $row->end_t . '!');
                    break;
                } else if (((float)$e_T > (float)$row->start_t &&  (float)$e_T < (float)$row->end_t)) {

                    (float)$ava = (((float)$row->start_t) - ((float)$s_T));
                    return redirect()->intended(RouteServiceProvider::ADMINDASHCOPY)->with('status', 'There is ' . (string)$ava . 'hours Available before ' . $row->start_t . '!');
                    break;
                }
            } else if (((float)$s_T > (float)$row->start_t ||  (float)$s_T < (float)$row->end_t) && ((float)$e_T > (float)$row->start_t ||  (float)$e_T < (float)$row->end_t)) {   // f f

                (float)$ava_end = (((float)$e_T) - ((float)$row->end_t));
                (float)$ava_start = (((float)$row->start_t) - ((float)$s_T));
                return redirect()->intended(RouteServiceProvider::ADMINDASHCOPY)->with('status', 'There is ' . (string)$ava_start . 'hours Available before ' . $row->start_t . ' & ' . (string)$ava_end . 'hour Available after ' . $row->end_t . '!');
                break;
            }
        }

        Timetable::create([
            'Department' => $request->D_name,
            'year' => $request->Year,
            'sem' => $request->Semester,
            'Module' => $request->M_name,
            'Day' => $request->day,
            'start_t' => $request->S_time,
            'end_t' => $request->E_time

        ]);

        return redirect()->back()->with('status', 'Timetable Inserted Successfully.!');
    }
}
