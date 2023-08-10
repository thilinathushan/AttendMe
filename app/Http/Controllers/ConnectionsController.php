<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Connection;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Module;
use App\Models\Lecturer;
use App\Providers\RouteServiceProvider;

class ConnectionsController extends Controller
{
    public function index()
    {
        $Department = Department::all();
        // dd($Department);
        $Module = Module::all();
        $lecturer = Lecturer::all();

        return view('admin.admin-connection', compact('Department', 'Module', 'lecturer'));
    }

    public function save(Request $request)
    {
        Connection::create([
            'M_name' => $request->M_name,
            'D_name' => $request->D_name,
            'L_name' => $request->L_name

        ]);

        return redirect()->intended(RouteServiceProvider::ADMINDASHCOPY)->with('status', "Connection Created Successfully!");
    }
}
