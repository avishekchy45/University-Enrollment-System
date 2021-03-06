<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\AdvisorController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\TeacherEnrollment;
use App\Http\Controllers\StudentEnrollment;
use App\Http\Controllers\AdminEnrollment;
use App\Http\Controllers\ProfileController;

use App\Models\Teacher;
use App\Models\Student;
use App\Models\Admin;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/logout', [LoginController::class, 'logout']);

Route::group(['middleware' => 'checkloggedout'], function () {
    Route::get('/', [LoginController::class, 'login']);
    Route::post('/loginvalidation', [LoginController::class, 'loginvalidation']);
});

Route::group(['middleware' => 'checkloggedin'], function () {
    Route::group(['middleware' => 'isadmin'], function () {
        // Admin Pages
        Route::get('/admin', function () {
            $user = Admin::where('admin_id', '=', session('username'))->first();
            if ($user) {
                session()->put('name', $user->name);
                // $req->session()->put('photo', $user->photo);
            }
            return view('admin.profile');
        });
        Route::get('/addteacher', [TeacherController::class, 'addteacher']);
        Route::post('/createteacher', [TeacherController::class, 'createteacher']);
        Route::get('/teacherlist', [TeacherController::class, 'teacherlist']);
        Route::get('/addstudent', [StudentController::class, 'addstudent']);
        Route::post('/createstudent', [StudentController::class, 'createstudent']);
        Route::get('/studentlist', [StudentController::class, 'studentlist']);
        Route::get('/addadvisor', [AdvisorController::class, 'addadvisor']);
        Route::post('/createadvisor', [AdvisorController::class, 'createadvisor']);
        Route::get('/advisorlist', [AdvisorController::class, 'advisorlist']);
        Route::get('/addcourse', [CourseController::class, 'addcourse']);
        Route::post('/createcourse', [CourseController::class, 'createcourse']);
        Route::get('/courselist', [CourseController::class, 'courselist']);
        Route::get('/sessionlist', [SessionController::class, 'sessionlist']);
        Route::post('/createsession', [SessionController::class, 'createsession']);
        Route::post('/updatesession/{id}', [SessionController::class, 'updatesession']);
        Route::get('/overlaplist', [AdminEnrollment::class, 'overlaplist']);
        Route::get('/courselimit', [AdminEnrollment::class, 'courselimit']);
        Route::post('/updatecourselimit', [AdminEnrollment::class, 'updatecourselimit']);
        Route::get('/editteacher/{id}', [TeacherController::class, 'editteacher']);
        Route::post('/updateteacher/{id}', [TeacherController::class, 'updateteacher']);
        Route::get('/deleteteacher/{teacher_id}', [TeacherController::class, 'deleteteacher']);
        Route::get('/editstudent/{id}', [StudentController::class, 'editstudent']);
        Route::post('/updatestudent/{id}', [StudentController::class, 'updatestudent']);
        Route::get('/deletestudent/{student_id}', [StudentController::class, 'deletestudent']);
        Route::get('/editcourse/{id}', [CourseController::class, 'editcourse']);
        Route::post('/updatecourse/{id}', [CourseController::class, 'updatecourse']);
        Route::get('/deletecourse/{student_id}', [CourseController::class, 'deletecourse']);
        Route::get('/editadvisor/{id}', [AdvisorController::class, 'editadvisor']);
        Route::post('/updateadvisor/{id}', [AdvisorController::class, 'updateadvisor']);
        Route::get('/deleteadvisor/{student_id}', [AdvisorController::class, 'deleteadvisor']);
        Route::get('admin/editprofile', [ProfileController::class, 'adminprofile']);
        Route::post('/updateadminprofile', [ProfileController::class, 'updateadminprofile']);
    });

    Route::group(['middleware' => 'isteacher'], function () {
        // Teacher Pages
        Route::get('/teacher', function () {
            $user = Teacher::where('teacher_id', '=', session('username'))->first();
            if ($user) {
                session()->put('name', $user->name);
                // $req->session()->put('photo', $user->photo);
            }
            return view('teacher.profile');
        });
        Route::get('/enrollstudent', [TeacherEnrollment::class, 'enrollstudent']);
        Route::post('/manualenroll', [TeacherEnrollment::class, 'manualenroll']);
        Route::get('/updaterequests', [TeacherEnrollment::class, 'updaterequests']);
        route::get('teacher/editprofile', [ProfileController::class, 'teacherprofile']);
        route::post('/updateteacherprofile', [ProfileController::class, 'updateteacherprofile']);
        Route::get('/updaterequests/{id}', [TeacherEnrollment::class, 'updaterequestsfinal']);
    });

    Route::group(['middleware' => 'isstudent'], function () {
        // Student Pages
        Route::get('/student', function () {
            $user = Student::where('student_id', '=', session('username'))->first();
            if ($user) {
                session()->put('name', $user->name);
                // $req->session()->put('photo', $user->photo);
            }
            return view('student.profile');
        });
        Route::get('/enrollcourse', [StudentEnrollment::class, 'enrollcourse']);
        Route::post('/enrollmentfinal', [StudentEnrollment::class, 'enrollmentfinal']);
        Route::get('/checkrequests', [StudentEnrollment::class, 'checkrequests']);
        route::get('student/editprofile', [ProfileController::class, 'studentprofile']);
        route::post('/updatestudentprofile', [ProfileController::class, 'updatestudentprofile']);
        route::get('/deleteencourse/{id}', [StudentEnrollment::class, 'deletecourse']);
    });
});
