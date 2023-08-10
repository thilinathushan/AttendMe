<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use App\Models\Lecturer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Auth\Events\Registered;
use App\Models\Department;
use App\Models\GeneratedOtp;
use App\Models\Module;
/* USED FOR QR GENERATION */
use Carbon\Carbon;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Queue;

class LecturerController extends Controller
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
        $request->authenticateLecturer();
        $request->session()->regenerate();
        return redirect()->intended(RouteServiceProvider::LECDASH);
    }



    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('lecturer')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    /* LAKSHAN CODE HERE */

    public function createLecturer(): View
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
            'username' => ['required', 'string', 'max:255', 'unique:' . Lecturer::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $lecturer = Lecturer::create([
            'first_name' => $request->fname,
            'last_name' => $request->lname,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($lecturer));

        return redirect()->back();
    }
    /* END LAKSHAN CODE */


    public function edit(Request $request): View
    {
        // The department is given to the Dropdown box
        $data = Department::all();
        // $mdr = $request->input('department');
        // $moduleData = Module::where('Department', $mdr)->get();


        return view('lecturer.profile.edit', compact('data'));


        $lecturer = Lecturer::find($request->user()->id); // Retrieve the student record using the authenticated user's ID

        return view('lecturer.profile.edit', [
            'lecturer' => $lecturer, // Pass the student record to the view
        ]);
    }

    public function UpdateLecturerProfile(Request $request, $id): RedirectResponse
    {
        $lecturer = Lecturer::find($id);
        $lecturer->first_name = $request->input('fname');
        $lecturer->last_name = $request->input('lname');
        $lecturer->birthday = $request->input('bday');
        $lecturer->username = $request->input('username');
        $lecturer->email = $request->input('email');
        $lecturer->phone_number = $request->input('telNum');
        $lecturer->department = $request->input('department');
        $lecturer->gender = $request->input('gender');
        $lecturer->update();
        return redirect()->intended(RouteServiceProvider::LECDASH)->with('status', "Your Profile Updated Successfully!");
    }

    public function showQR(): View
    {
        return view('lecturer.lecturer-generate-qr');
    }

    public function generateQR()
    {
        // Generate a random OTP pin
        $otpPin = mt_rand(100000, 999999);
        // $otp = 'otp:';
        // // Generate the QR code content
        // $content = $otp . '' . $otpPin;

        // // Set up the QR code renderer
        // $renderer = new ImageRenderer(
        //     new RendererStyle(400),
        //     new ImagickImageBackEnd()
        // );
        // $writer = new Writer($renderer);

        // $qr_image = base64_encode($writer->writeString($content));

        // Save the OTP in the database
        GeneratedOtp::create([
            'otp' => $otpPin,
            'created_at' => Carbon::now(),
        ]);

        $oneMinuteAgo = Carbon::now()->subMinutes(1);
        GeneratedOtp::where('created_at', '<', $oneMinuteAgo)->delete();

        return view('lecturer.lecturer-generate-qr-code', compact('otpPin'));
    }

    public function AddLecturer(Request $request)
    {
        $data = Department::all();
        return view('admin.admin-lecturer', compact('data'));
    }

    public function saveLec(Request $request)
    {
        $defaultPass = $request->username;

        // Check if the checkbox is checked
        if ($request->has('password')) {
            $defaultPass = $request->username;
        } else {
            $defaultPass = null; // Set password to null if checkbox is not checked
        }
        Lecturer::create([
            'first_name' => $request->fname,
            'last_name' => $request->lname,
            'birthday' => $request->bday,
            'username' => $request->username,
            'email' => $request->LecEmail,
            'phone_number' => $request->telNum,
            'department' => $request->department,
            'gender' => $request->gender,
            'password' => Hash::make($defaultPass),
        ]);
        return redirect()->intended(RouteServiceProvider::ADMINDASHCOPY)->with('status', "Lecturer Created Successfully!");
    }

    public function ManageLecturer()
    {
        $lecturer = Lecturer::all();
        return view('admin.admin-lecturer-manage', compact('lecturer'));
    }

    public function EditLecturer(Request $request, $id)
    {
        $lecturer = Lecturer::find($id);
        $data = Department::all();
        return view('admin.admin-lecturer-edit', compact('lecturer', 'data'));
    }

    public function UpdateLecturer(Request $request, $id): RedirectResponse
    {
        $defaultPass = $request->username;
        $lecturer = Lecturer::find($id);
        $lecturer->first_name = $request->input('fname');
        $lecturer->last_name = $request->input('lname');
        $lecturer->birthday = $request->input('bday');
        $lecturer->username = $request->input('username');
        $lecturer->email = $request->input('LecEmail');
        $lecturer->phone_number = $request->input('telNum');
        $lecturer->department = $request->input('department');
        $lecturer->gender = $request->input('gender');
        // Check if the checkbox is checked
        if ($request->has('password')) {
            $defaultPass = $request->username;
            $lecturer->password = Hash::make($defaultPass);
        }
        $lecturer->status = $request->input('status');
        $lecturer->update();
        return redirect()->intended(RouteServiceProvider::ADMINDASHCOPY)->with('status', "Update Successfully!");
    }

    public function DeleteLecturer($id)
    {
        $lecturer = Lecturer::find($id);
        $lecturer->delete();
        return redirect()->intended(RouteServiceProvider::ADMINDASHCOPY)->with('status', "Deleted Successfully!");
    }

    public function LecturerAllDelete(Request $request)
    {
        $lecturer = $request->selectedItem;  // ids ---name of tha chackbox

        if (!is_array($lecturer)) {
            $lecturer = [$lecturer];
        }
        Lecturer::wherein('id', $lecturer)->delete();
        return redirect()->intended(RouteServiceProvider::ADMINDASHCOPY)->with('status', "Selected Lecturers, Deleted Successfully!.");
    }

    public function statusLecturer($id)
    {
        $lecturer = Lecturer::find($id);
        $lec = $lecturer->status;
        if ($lec == 'inactive') {
            $lecturer->status = 'active';
            $lecturer->update();
            return redirect()->intended(RouteServiceProvider::ADMINDASHCOPY)->with('status', "Activeted Successfully!");
        } else {
            $lecturer->status = 'inactive';
            $lecturer->update();
            return redirect()->intended(RouteServiceProvider::ADMINDASHCOPY)->with('status', "Inactiveted Successfully!");
        }
    }

    public function LecturerAllActive(Request $request)
    {
        $lecturer = $request->selectedItem;  // ids ---name of tha chackbox

        if (!is_array($lecturer)) {
            $lecturer = [$lecturer];
        }
        Lecturer::whereIn('id', $lecturer)->update(['status' => 'active']);
        return redirect()->intended(RouteServiceProvider::ADMINDASHCOPY)->with('status', "Updated Selected Lecturer's Status to Active, Successfully!.");
    }

    public function LecturerAllInactive(Request $request)
    {
        $lecturer = $request->selectedItem;  // ids ---name of tha chackbox

        if (!is_array($lecturer)) {
            $lecturer = [$lecturer];
        }
        Lecturer::whereIn('id', $lecturer)->update(['status' => 'inactive']);
        return redirect()->intended(RouteServiceProvider::ADMINDASHCOPY)->with('status', "Updated Selected Lecturer's Status to Inactive, Successfully!.");
    }

    public function resetGeneratedOtp()
    {
        GeneratedOtp::query()->truncate();
        return redirect()->route('show.qr');
    }
}
