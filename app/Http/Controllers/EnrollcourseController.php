<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Session;
use App\Models\Course;
use App\Models\Enrollment;

class EnrollcourseController extends Controller
{
    public function enrollcourse(request $request)
    {
        $data = Session::select('name')->where("status", "=", 1)->get();
        //dd($data);
        if ($request->has('session')) {
            $data2 = Course::leftJoin('departments as d', 'department_id', 'd.id')
                ->leftJoin('semesters as s', 'semester_id', 's.id')
                ->select('courses.id', 'title', 'code', 'type', 'credit', 'd.fullfrom as department', 's.semester_no as semester')
                ->get();
            return view('student.enroll_course', compact('data2', 'data'));
        }
        return view('student.enroll_course', compact('data'));
    }

    public function store(request $req)
    {
        $totalcredit = Enrollment::leftJoin('courses as c', 'course_id', 'c.id')
            ->where('student_id', '=', session('username'))->sum('c.credit');
        //dd($t);
        $course_id = $req->slectcourse;
        $examtype = $req->examtype;
        $req->validate([
            'examtype' => 'required',
            'slectcourse' => 'required|exists:courses,id|unique:enrollments,course_id,null,id,student_id,' . session('username'),
        ]);
        foreach ($course_id as $key => $value) {
            $obj = new Enrollment;
            $obj->course_id = $value;
            $obj->type = $examtype[$key];
            $obj->session = $req->get('session');
            $obj->student_id = session('username');
            $obj->status = 'pending';
            //dd($obj);
            foreach ($course_id as $key => $value) {
                $totalcredit1[] = Course::where('id', '=', $value)->sum('credit');
                $t = array_sum($totalcredit1);
            }
            $totalcredit = $t + $totalcredit;
            //dd($totalcredit);
            if ($totalcredit <= 8)
                $obj->save();
            else
                return back()->with('errormsg', 'Maximum Credit Exceeded ');
        }
        if ($obj)
            return back()->with('successmsg', 'Enrollment Request Successfull ');

        else
            return back()->with('errormsg', 'Cannot Request');
    }

    public function checkrequest()
    {
        $data = Enrollment::leftJoin('courses as c', 'course_id', 'c.id')
            ->select('c.title as title', 'c.code as code', 'c.type as coursetype', 'c.credit as credit', 'session', 'status', 'enrollments.type')
            ->where('student_id', '=', session('username'))
            ->get();
        $data1 = Course::leftJoin('semesters as s', 'semester_id', 's.id')
            ->leftJoin('enrollments as e', 'courses.id', 'e.course_id')
            ->select('s.semester_no as semester', 's.id as id')->where('student_id', '=', session('username'))
            ->get();
        //dd($data1);
        return view('student.check_requests', compact('data', 'data1'));
    }
}
