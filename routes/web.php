<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnalyticsController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\LecturerController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\BadgeController;
use App\Http\Controllers\ConnectionsController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\ScanQrController;
use App\Http\Controllers\TimeController;
use App\Http\Controllers\TimetableController;
use SimpleSoftwareIO\QrCode\Facades\QrCode;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/* COMMON LOGIN ROUTES FOR STUDENT AND LECTURER*/

Route::middleware('guest')->group(function () {
    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');
    Route::post('login', [StudentController::class, 'Dashboard'])->name('login.student');
    Route::post('confirm', [StudentController::class, 'LoginConfirmAttendance'])->name('loginConfirmAttendance.student');
    Route::post('lecturer/login', [LecturerController::class, 'Dashboard'])->name('signinLec_form');
});

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('register/student', [StudentController::class, 'save'])->name('register.student');
    Route::post('register/lecturer', [LecturerController::class, 'save'])->name('signupLec_form');
});

Route::controller(TimeController::class)->group(function () {
    Route::get('/AdminCalander', 'Admin')->middleware(['auth:administrator'])->name('admin.calander');
    Route::post('/AdminFilter', 'AdminFilter')->middleware(['auth:administrator'])->name('admin.filter');
});

Route::controller(TimeController::class)->group(function () {
    Route::get('/lec_calnder/{id}', 'lec')->name('lec');
    Route::post('/lec_filter', 'lec_filter')->name('lec.filter');
    Route::get('/student_calnder', 'student')->name('student');
    Route::post('/student.filter', 'student_filter')->name('student.filter');
});


/* Student Routes */
Route::middleware(['auth:student'])->group(function () {
    Route::get('/student-dashboard', function () {
        return view('student.student-dashboard');
    })->name('student-dashboard');
    Route::put('/UpdateStudentProfile/{id}', [StudentController::class, 'UpdateStudentProfile'])->name('update.student.profile');
    Route::post('logout/student', [StudentController::class, 'destroy'])->name('logout.student');
});

Route::get('/profile/student', [StudentController::class, 'edit'])->middleware(['auth:student'])->name('profile.student');
Route::get('/confirm-attendance', [StudentController::class, 'confirm'])->middleware(['auth:student'])->name('confirm.student');
Route::get('/saveAttendance/{id}', [StudentController::class, 'saveAttendance'])->middleware(['auth:student'])->name('save.attendance');

/* Lecturer Routes */
Route::middleware(['auth:lecturer'])->group(function () {
    Route::get('/lecturer-dashboard', function () {
        return view('lecturer.lecturer-dashboard');
    })->name('lecturer-dashboard');
    Route::put('/UpdateLecturerProfile/{id}', [LecturerController::class, 'UpdateLecturerProfile'])->name('update.lecturer.profile');
    Route::post('/logout/lecturer', [LecturerController::class, 'destroy'])->name('logout.lecturer');
    Route::get('/generate-qr', [LecturerController::class, 'showQR'])->name('show.qr');
});

Route::get('/profile/lecturer', [LecturerController::class, 'edit'])->middleware(['auth:lecturer'])->name('edit.lecturer');
Route::get('/generate-qr-code', [LecturerController::class, 'generateQR'])->middleware(['auth:lecturer'])->name('generate.qr');
Route::get('/statusLecturer/{id}', [LecturerController::class, 'statusLecturer'])->name('status.lecturer');
Route::get('/delete-all-records', [LecturerController::class, 'resetGeneratedOtp'])->name('delete.all.records');


/* Admin Routes */
Route::middleware('guest')->group(function () {
    Route::get('admin/login', [AdminController::class, 'create'])->name('signinAdmin_form');
    Route::post('logged/admin', [AdminController::class, 'Dashboard'])->name('signinAdmin');
});

Route::middleware(['auth:administrator'])->group(function () {
    Route::get('/admin-dashboard', function () {
        return view('admin.admin-dashboard-copy');
    });

    Route::put('/updateAdmin/{id}', [AdminController::class, 'UpdateAdmin'])->name('admin.update');
    Route::post('logout/administrator', [AdminController::class, 'destroy'])->name('logout.admin');
    Route::get('get-counts', [AnalyticsController::class, 'getCounts'])->name('get.counts');
});
Route::get('/profile', [AdminController::class, 'edit'])->middleware(['auth:administrator'])->name('admin.edit');

/* added middlewares but not checked*/
Route::controller(ConnectionsController::class)->group(function () {
    Route::get('/registrationConnections', 'index')->middleware(['auth:administrator'])->name('connection.registration');
    Route::post('/addConnections', 'save')->middleware(['auth:administrator'])->name('add.connections');
});

Route::controller(TimetableController::class)->group(function () {
    Route::get('/registrationTimetables', 'index')->name('timetables.registration');
    Route::post('/addTimetables', 'save')->name('add.timetables');
});

/* Department */
Route::controller(DepartmentController::class)->group(function () {
    Route::get('/AddDepartment', 'AddDepartment')->middleware(['auth:administrator'])->name('Dept.add');
    Route::post('/saveDepartment', 'save')->middleware(['auth:administrator'])->name('Department.save');
    Route::get('/manageDepartment', 'ManageDepartment')->middleware(['auth:administrator'])->name('department.name');
    Route::get('/editDepartment/{id}', 'EditDepartment')->middleware(['auth:administrator'])->name('department.edit');
    Route::put('/updateDepartment/{id}', 'UpdateDepartment')->middleware(['auth:administrator'])->name('department.update');
    Route::get('/deleteDepartment/{id}', 'DeleteDepartment')->middleware(['auth:administrator'])->name('department.delete');
    Route::get('/deleteAllDepartments', 'DepartmentAllDelete')->middleware(['auth:administrator'])->name('department.alldelete');
});

/* Module */
Route::controller(Modulecontroller::class)->group(function () {
    Route::get('/AddModuler', 'AddModuler')->middleware(['auth:administrator'])->name('Module.add');
    Route::post('/saveModuler', 'save')->middleware(['auth:administrator'])->name('Moduler.save');
    Route::get('/manageModule', 'ManageModule')->middleware(['auth:administrator'])->name('module.name');
    Route::get('/editModule/{id}', 'EditModule')->middleware(['auth:administrator'])->name('module.edit');
    Route::put('/updateModule/{id}', 'UpdateModule')->middleware(['auth:administrator'])->name('module.update');
    Route::get('/deleteModule/{id}', 'DeleteModule')->middleware(['auth:administrator'])->name('module.delete');
    Route::get('/deleteAllModules', 'ModuleAllDelete')->middleware(['auth:administrator'])->name('module.alldelete');
});

/* Badge */
Route::controller(BadgeController::class)->group(function () {
    Route::get('/addBadge', 'AddBadge')->middleware(['auth:administrator'])->name('Badge.add');
    Route::post('/saveBadge', 'save')->middleware(['auth:administrator'])->name('Badge.save');
    Route::get('/manageBadge', 'ManageBadge')->middleware(['auth:administrator'])->name('badge.name');
    Route::get('/editBadge/{id}', 'EditBadge')->middleware(['auth:administrator'])->name('badge.edit');
    Route::put('/updateBadge/{id}', 'UpdateBadge')->middleware(['auth:administrator'])->name('badge.update');
    Route::get('/deleteBadge/{id}', 'DeleteBadge')->middleware(['auth:administrator'])->name('badge.delete');
    Route::get('/deleteAllBadges', 'BadgeAllDelete')->middleware(['auth:administrator'])->name('badge.alldelete');
});

/* Lecturer */
Route::controller(LecturerController::class)->group(function () {
    Route::get('/addLecturer', 'AddLecturer')->middleware(['auth:administrator'])->name('Lecturer.add');
    Route::post('/saveLecturer', 'saveLec')->middleware(['auth:administrator'])->name('lecturer.save');
    Route::get('/manageLecturer', 'ManageLecturer')->middleware(['auth:administrator'])->name('lecturer.name');
    Route::get('/editLecturer/{id}', 'EditLecturer')->middleware(['auth:administrator'])->name('lecturer.edit');
    Route::put('/updateLecturer/{id}', 'UpdateLecturer')->middleware(['auth:administrator'])->name('lecturer.update');
    Route::get('/deleteLecturer/{id}', 'DeleteLecturer')->middleware(['auth:administrator'])->name('lecturer.delete');
    Route::get('/activeLecturer/{id}', 'ActiveLecturer')->middleware(['auth:administrator'])->name('lecturer.active');
    Route::get('/deleteAllLecturers', 'LecturerAllDelete')->middleware(['auth:administrator'])->name('lecturer.alldelete');
    Route::get('activeAllLecturers', 'LecturerAllActive')->middleware(['auth:administrator'])->name('lecturer.allactive');
    Route::get('inactiveAllLecturers', 'LecturerAllInactive')->middleware(['auth:administrator'])->name('lecturer.allinactive');
});

/* Student */
Route::controller(StudentController::class)->group(function () {
    Route::get('/addStudent', 'AddStudent')->middleware(['auth:administrator'])->name('Student.add');
    Route::post('/saveStudent', 'saveStu')->middleware(['auth:administrator'])->name('student.save');
    Route::get('/manageStudent', 'ManageStudent')->middleware(['auth:administrator'])->name('student.name');
    Route::get('/editStudent/{id}', 'EditStudent')->middleware(['auth:administrator'])->name('student.edit');
    Route::put('/updateStudent/{id}', 'UpdateStudent')->middleware(['auth:administrator'])->name('student.update');
    Route::get('/deleteStudent/{id}', 'DeleteStudent')->middleware(['auth:administrator'])->name('student.delete');
    Route::get('/activeStudent/{id}', 'ActiveStudent')->middleware(['auth:administrator'])->name('student.active');
    Route::get('/deleteAllStudents', 'StudentAllDelete')->middleware(['auth:administrator'])->name('student.alldelete');
    Route::get('activeAllStudents', 'StudentAllActive')->middleware(['auth:administrator'])->name('student.allactive');
    Route::get('inactiveAllStudents', 'StudentAllInactive')->middleware(['auth:administrator'])->name('student.allinactive');
});

Route::controller(ScanQrController::class)->group(function () {
    Route::post('/scanned-data', 'handleScannedData');
    Route::get('/scan-qr', 'ScanQr')->middleware(['auth:student'])->name('scan.qr');
    Route::get('/scan-qr-code', 'ScanQrCode')->middleware(['auth:student'])->name('scan.qr.code');
});

Route::controller(AnalyticsController::class)->group(function () {
    Route::get('analytics', 'ShowAnalytics')->middleware(['auth:administrator'])->name('show.analytics');
});




Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });







require __DIR__ . '/auth.php';
