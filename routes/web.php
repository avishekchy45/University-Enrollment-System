<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
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
            return view('admin.profile');
        });
        Route::get('/addteacher', function () {
            return view('admin.add_teacher');
        });
        Route::get('/teacherlist', function () {
            return view('admin.teacher_list');
        });
        Route::get('/addstudent', function () {
            return view('admin.add_student');
        });
        Route::get('/studentlist', function () {
            return view('admin.student_list');
        });
        Route::get('/addadvisor', function () {
            return view('admin.add_advisor');
        });
        Route::get('/advisorlist', function () {
            return view('admin.advisor_list');
        });
        Route::get('/addcourse', function () {
            return view('admin.add_course');
        });
        Route::get('/courselist', function () {
            return view('admin.course_list');
        });
        Route::get('/enrollmentlist', function () {
            return view('admin.enrollment_list');
        });
        Route::get('/overlaplist', function () {
            return view('admin.overlap_list');
        });
    });

    Route::group(['middleware' => 'isteacher'], function () {
        // Teacher Pages
        Route::get('/teacher', function () {
            return view('teacher.profile');
        });
        Route::get('/enrollstudent', function () {
            return view('teacher.enroll_student');
        });
        Route::get('/updaterequests', function () {
            return view('teacher.update_requests');
        });
    });

    Route::group(['middleware' => 'isstudent'], function () {
        // Student Pages
        Route::get('/student', function () {
            return view('student.profile');
        });
        Route::get('/enrollcourse', function () {
            return view('student.enroll_course');
        });
        Route::get('/checkrequests', function () {
            return view('student.check_requests');
        });
    });
});
