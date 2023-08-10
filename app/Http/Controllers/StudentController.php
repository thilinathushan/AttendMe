<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Auth\Events\Registered;
use App\Models\Department;
use App\Models\Badge;


use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Attendance;
use App\Models\GeneratedOtp;
use Illuminate\Support\Facades\Redirect;

class StudentController extends Controller
{
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function Dashboard(LoginRequest $request)
    {
        $request->authenticateStudent();
        $request->session()->regenerate();
        return redirect()->intended(RouteServiceProvider::STUDASH);
    }

    public function LoginConfirmAttendance(LoginRequest $request)
    {
        $request->authenticateStudent();
        $login = $request->session()->regenerate();

        if ($login) {
            $otp = $request->get('otpPin');
            $generatedOtps = GeneratedOtp::all();

            foreach ($generatedOtps as $otpOnly) {
                $otpOnly = $otpOnly->otp;

                if ($otpOnly == $otp) {
                    $varified = $otp;

                    $username = $request->get('username');
                    $student = Student::where('username', $username)->first();
                    return redirect()->route('confirm.student', compact('varified', 'student'));
                }
            }
            return redirect()->intended(RouteServiceProvider::STUDASH)->with('verify', 'Verification Failed, something went Wrong!');
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('student')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }


    /* LAKSHAN CODE HERE */

    public function createStudent(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */

    public function save(Request $request)
    {
        $request->validate([
            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:' . Student::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        $student = Student::create([
            'first_name' => $request->fname,
            'last_name' => $request->lname,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);
        if (event(new Registered($student))) {
            return redirect()->back()->with('success', 'You are successfully Registrated!');
        } else {
            return redirect()->back()->with('fail', 'Failed, something went Wrong!');
        }
    }
    /* END LAKSHAN CODE */

    public function edit(Request $request): View
    {
        // The department is given to the Dropdown box
        $dept = Department::all();
        $badge = Badge::all();

        return view('student.profile.edit', compact('dept', 'badge'));

        $student = Student::find($request->user()->id); // Retrieve the student record using the authenticated user's ID

        return view('student.profile.edit', [
            'student' => $student, // Pass the student record to the view
        ]);
    }

    public function UpdateStudentProfile(Request $request, $id): RedirectResponse
    {
        $student = Student::find($id);
        $student->first_name = $request->input('fname');
        $student->last_name = $request->input('lname');
        $student->birthday = $request->input('bday');
        $student->username = $request->input('username');
        $student->email = $request->input('email');
        $student->phone_number = $request->input('telNum');
        $student->badge = $request->input('badge');
        $student->department = $request->input('department');
        $student->gender = $request->input('gender');
        $student->update();
        return redirect()->intended(RouteServiceProvider::STUDASH)->with('status', "Your Profile Updated Successfully!");
    }

    public function AddStudent(Request $request)
    {
        $dept = Department::all();
        $badge = Badge::all();
        return view('admin.admin-student', compact('dept', 'badge'));
    }

    public function saveStu(Request $request)
    {
        $defaultPass = $request->username;

        // Check if the checkbox is checked
        if ($request->has('password')) {
            $defaultPass = $request->username;
        } else {
            $defaultPass = null; // Set password to null if checkbox is not checked
        }
        Student::create([
            'first_name' => $request->fname,
            'last_name' => $request->lname,
            'birthday' => $request->bday,
            'username' => $request->username,
            'email' => $request->StuEmail,
            'phone_number' => $request->telNum,
            'badge' => $request->StuBadge,
            'department' => $request->StuDepartment,
            'gender' => $request->gender,
            'password' => Hash::make($defaultPass),
        ]);
        return redirect()->intended(RouteServiceProvider::ADMINDASHCOPY)->with('status', "Student Created Successfully!");
    }

    public function ManageStudent()
    {
        $student = Student::all();
        return view('admin.admin-student-manage', compact('student'));
    }

    public function EditStudent(Request $request, $id)
    {
        $student = Student::find($id);
        $dept = Department::all();
        $badge = Badge::all();
        return view('admin.admin-student-edit', compact('student', 'dept', 'badge'));
    }

    public function UpdateStudent(Request $request, $id): RedirectResponse
    {
        $defaultPass = $request->username;
        $student = Student::find($id);
        $student->first_name = $request->input('fname');
        $student->last_name = $request->input('lname');
        $student->birthday = $request->input('bday');
        $student->username = $request->input('username');
        $student->email = $request->input('StuEmail');
        $student->phone_number = $request->input('telNum');
        $student->badge = $request->input('StuBadge');
        $student->department = $request->input('StuDepartment');
        $student->gender = $request->input('gender');
        // Check if the checkbox is checked
        if ($request->has('password')) {
            $defaultPass = $request->username;
            $student->password = Hash::make($defaultPass);
        }
        $student->status = $request->input('Stustatus');
        $student->update();
        return redirect()->intended(RouteServiceProvider::ADMINDASHCOPY)->with('status', "Update Successfully!");
    }

    public function DeleteStudent($id)
    {
        $student = Student::find($id);
        $student->delete();
        return redirect()->intended(RouteServiceProvider::ADMINDASHCOPY)->with('status', "Deleted Successfully!");
    }

    public function StudentAllDelete(Request $request)
    {
        $student = $request->selectedItem;  // ids ---name of tha chackbox

        if (!is_array($student)) {
            $student = [$student];
        }
        Student::wherein('id', $student)->delete();
        return redirect()->intended(RouteServiceProvider::ADMINDASHCOPY)->with('status', "Selected Students, Deleted Successfully!.");
    }

    public function confirm()
    {
        $id = Auth::id();
        $student = Student::find($id);
        return View('student.student-confirm-attendance', compact('student'));
    }

    public function saveAttendance($id)
    {
        $student = Student::find($id);
        Attendance::create([
            'username' => $student->username,
            'ModuleCode' => 'ITC2223',
            'attendance' => 1,
        ]);
        return redirect()->intended(RouteServiceProvider::STUDASH)->with('status', "Attendance Marked Successfully!");
    }

    public function StudentAllActive(Request $request)
    {
        $student = $request->selectedItem;  // ids ---name of tha chackbox

        if (!is_array($student)) {
            $student = [$student];
        }
        Student::whereIn('id', $student)->update(['status' => 'active']);
        return redirect()->intended(RouteServiceProvider::ADMINDASHCOPY)->with('status', "Updated Selected Student's Status to Active, Successfully!.");
    }

    public function StudentAllInactive(Request $request)
    {
        $student = $request->selectedItem;  // ids ---name of tha chackbox

        if (!is_array($student)) {
            $student = [$student];
        }
        Student::whereIn('id', $student)->update(['status' => 'inactive']);
        return redirect()->intended(RouteServiceProvider::ADMINDASHCOPY)->with('status', "Updated Selected Student's Status to Inactive, Successfully!.");
    }


    public function StudentAllUpdate(Request $request)
    {
        $studentIds = $request->selectedItem;

        if (!is_array($studentIds)) {
            $studentIds = [$studentIds];
        }

        // Update the student status to active
        Student::whereIn('id', $studentIds)->update(['status' => 'active']);

        return redirect()->intended(RouteServiceProvider::ADMINDASHCOPY)->with('status', "Selected Students Updated Successfully!");
    }

    // /**
    //  * Update the user's profile information.
    //  */
    // public function update(ProfileUpdateRequest $request): RedirectResponse
    // {
    //     $request->user()->fill($request->validated());

    //     if ($request->user()->isDirty('email')) {
    //         $request->user()->email_verified_at = null;
    //     }

    //     $request->user()->save();

    //     return Redirect::route('profile.edit')->with('status', 'profile-updated');
    // }

    // /**
    //  * Delete the user's account.
    //  */
    // public function delete(Request $request): RedirectResponse
    // {
    //     $request->validateWithBag('userDeletion', [
    //         'password' => ['required', 'current_password'],
    //     ]);

    //     $student = $request->user();

    //     Auth::logout();

    //     $student->delete();

    //     $request->session()->invalidate();
    //     $request->session()->regenerateToken();

    //     return Redirect::to('/');
    // }
}
