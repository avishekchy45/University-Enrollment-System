<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AdvisorController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollcourseController;
use App\Http\Controllers\ManualenrollcourseController;
use Illuminate\Http\Request;

use App\Models\Teacher;
use App\Models\Student;
use App\Models\Admin;
use App\Models\Session;

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
        /*Route::get('/addcourse', function () {
            return view('admin.add_course');
        });
        Route::get('/courselist', function () {
            return view('admin.course_list');
        });*/
        Route::get('/enrollmentlist', function () {
            $data = Session::orderBy('created_at', 'DESC')->get();
            return view('admin.enrollment_list', compact('data'));
        });
        Route::post('/createsession', [SessionController::class, 'createsession']);
        Route::post('/updatesession/{id}', [SessionController::class, 'updatesession']);
        Route::get('/overlaplist', function () {
            return view('admin.overlap_list');
        });
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
        Route::get('/enrollstudent', [ManualenrollcourseController::class, 'enrollcourse']);
        Route::post('/manualenrollment', [ManualenrollcourseController::class, 'store']);
        Route::get('/updaterequests', [ManualenrollcourseController::class, 'checkrequest']);
        // Route::get('/enrollstudent', function () {
        //     return view('teacher.enroll_student');
        // });
        // Route::get('/updaterequests', function () {
        //     return view('teacher.update_requests');
        // });
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
        Route::get('/enrollcourse', [EnrollcourseController::class, 'enrollcourse']);
        Route::post('/enrollment', [EnrollcourseController::class, 'store']);
        Route::get('/checkrequests', [EnrollcourseController::class, 'checkrequest']);
    });
});
