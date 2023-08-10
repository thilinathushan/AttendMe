<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Module;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class ModuleController extends Controller
{
    public function AddModuler()
    {
        // // Department display
        // $data = Department::pluck('DepartmentName');
        // return view('admin.admin-module', compact('data'));

        return view('admin.admin-module');
    }

    public function save(Request $request)
    {
        Module::create([
            'ModuleCode' => $request->Module_C,
            'ModuleName' => $request->Module_N,
            'Year' => $request->year,
            'Semester' => $request->semester,
        ]);
        return redirect()->intended(RouteServiceProvider::ADMINDASHCOPY)->with('status', "Module Created Successfully!");
    }

    public function ManageModule()
    {
        $module = Module::all();
        return view('admin.admin-module-manage', compact('module'));
    }

    public function EditModule($id)
    {
        // // Department display
        // $data = Department::pluck('DepartmentName');
        $module = Module::find($id);
        return view('admin.admin-module-edit', compact('module'));
    }

    public function UpdateModule(Request $request, $id): RedirectResponse
    {
        $module = Module::find($id);
        $module->ModuleCode = $request->input('Module_C');
        $module->ModuleName = $request->input('Module_N');
        $module->Year = $request->input('year');
        $module->Semester = $request->input('semester');
        $module->update();
        return redirect()->intended(RouteServiceProvider::ADMINDASHCOPY)->with('status', "Update Successfully!");
    }

    public function DeleteModule($id)
    {
        $module = Module::find($id);
        $module->delete();
        return redirect()->intended(RouteServiceProvider::ADMINDASHCOPY)->with('status', "Deleted Successfully!");
    }

    public function ModuleAllDelete(Request $request)
    {
        $module = $request->selectedItem;  // ids ---name of tha chackbox

        if (!is_array($module)) {
            $module = [$module];
        }
        Module::wherein('id', $module)->delete();
        return redirect()->intended(RouteServiceProvider::ADMINDASHCOPY)->with('status', "Selected Modules, Deleted Successfully!.");
    }
}
