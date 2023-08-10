<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use LDAP\Result;

class DepartmentController extends Controller
{
    public function AddDepartment()
    {
        $department = null;
        return view('admin.admin-department', compact('department'));
    }

    public function save(Request $request)
    {
        Department::create([
            'DepartmentCode' => $request->Department_C,
            'DepartmentName' => $request->Department_N
        ]);
        return redirect()->intended(RouteServiceProvider::ADMINDASHCOPY)->with('status', "Department Created Successfully!");
    }

    public function ManageDepartment()
    {
        $department = Department::all();
        return view('admin.admin-department-manage', compact('department'));
    }

    public function EditDepartment($id)
    {
        $department = Department::find($id);
        return view('admin.admin-department-edit', compact('department'));
    }

    public function UpdateDepartment(Request $request, $id): RedirectResponse
    {
        $department = Department::find($id);
        $department->DepartmentCode = $request->input('Department_C');
        $department->DepartmentName = $request->input('Department_N');
        $department->update();
        return redirect()->intended(RouteServiceProvider::ADMINDASHCOPY)->with('status', "Update Successfully!");
    }

    public function DeleteDepartment($id)
    {
        $department = Department::find($id);
        $department->delete();
        return redirect()->intended(RouteServiceProvider::ADMINDASHCOPY)->with('status', "Deleted Successfully!");
    }

    public function DepartmentAllDelete(Request $request)
    {
        $department = $request->selectedItem;  // ids ---name of tha chackbox

        if (!is_array($department)) {
            $department = [$department];
        }
        Department::wherein('id', $department)->delete();
        return redirect()->intended(RouteServiceProvider::ADMINDASHCOPY)->with('status', "Selected Departments, Deleted Successfully!.");
    }
}
