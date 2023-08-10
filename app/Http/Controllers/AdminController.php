<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Administrator;
use App\Models\Badge;
use App\Models\Department;
use App\Models\Lecturer;
use App\Models\Module;
use App\Models\Student;
use Illuminate\Http\RedirectResponse;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function create(): View
    {
        return view('admin.admin-login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function Dashboard(LoginRequest $request)
    {
        $request->authenticateAdministrator();
        $request->session()->regenerate();
        return redirect()->intended(RouteServiceProvider::ADMINDASHCOPY);
    }

    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('administrator')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function edit(Request $request): View
    {
        $admin = Administrator::find($request->user()->id); // Retrieve the student record using the authenticated user's ID
        return view('admin.profile.edit', [
            'admin' => $admin, // Pass the student record to the view
        ]);
    }

    public function UpdateAdmin(Request $request, $id): RedirectResponse
    {
        $admin = Administrator::find($id);
        $admin->first_name = $request->input('fname');
        $admin->last_name = $request->input('lname');
        $admin->birthday = $request->input('bday');
        $admin->username = $request->input('username');
        $admin->email = $request->input('email');
        $admin->phone_number = $request->input('telNum');
        $admin->gender = $request->input('gender');
        $admin->update();
        return redirect()->intended(RouteServiceProvider::ADMINDASHCOPY)->with('status', "Your Profile Updated Successfully!");
    }
}
