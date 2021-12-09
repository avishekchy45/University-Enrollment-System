<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('login');
});

// Admin Pages
Route::get('/admin', function () {
    return view('admin.profile');
});
Route::get('/addcourse', function () {
    return view('admin.add_course');
});
Route::get('/updateadvisor', function () {
    return view('admin.update_advisor');
});
Route::get('/addteacher', function () {
    return view('admin.add_teacher');
});
Route::get('/addstudent', function () {
    return view('admin.add_student');
});
Route::get('/enrollmentlist', function () {
    return view('admin.enrollment_list');
});
Route::get('/overlaplist', function () {
    return view('admin.overlap_list');
});
Route::get('/teacherlist', function () {
    return view('admin.teacher_list');
});
Route::get('/studentlist', function () {
    return view('admin.student_list');
});
Route::get('/advisorlist', function () {
    return view('admin.teacher_list');
});
Route::get('/courselist', function () {
    return view('admin.student_list');
});

// Teacher Pages
Route::get('/teacher', function () {
    return view('teacher.profile');
});
Route::get('/enrollstudent', function () {
    return view('teacher.enroll_student');
});
Route::get('/checkrequest', function () {
    return view('teacher.check_request');
});

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
