<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Session;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Advisor;
use App\Models\Student;

class TeacherEnrollment extends Controller
{
  public function enrollstudent(request $request)
    {
        
        $data = Session::select('name')->where("status", "=", 1)->get();
        $data1 = Advisor::select('batch')->where("teacher_id", "=", session('username'))->get();
        if ($request->has('search')) {
            $request->validate([
                'batch' => 'required|exists:advisors,batch',
                'session' => 'required|exists:sessions,name',
            ]);
            $data3 = Student::select('student_id')->where("batch", "=", $request->batch)->get();
            return view('teacher.enroll_student', compact('data3', 'data', 'data1'));
        }
      
        if ($request->has('stuselect')) {
            $request->validate([
                'stuid' => 'required|exists:students,student_id',
               
            ]);
            $data2 = Course::leftJoin('departments as d', 'department_id', 'd.id')
                ->leftJoin('semesters as s', 'semester_id', 's.id')
                ->select('courses.id', 'title', 'code', 'type', 'credit', 'd.fullfrom as department', 's.semester_no as semester')
                ->get();
            // dd($request->batch1);
            return view('teacher.enroll_student', compact('data2', 'data', 'data1'));
        }

        return view('teacher.enroll_student', compact('data', 'data1'));
    }
    public function manualenroll(request $req)
    {
        $course_id = $req->slectcourse;
        $examtype = $req->examtype;
        $student_id = $req->stuid;
        $req->validate([
            'examtype' => 'required',
            'slectcourse' => 'required|exists:courses,id|unique:enrollments,course_id,null,id,student_id,' . $student_id,
        ]);
        foreach ($course_id as $key => $value) {
            $obj = new Enrollment;
            $obj->course_id = $value;
            $obj->type = $examtype[$key];
            $obj->student_id = $student_id;
            $obj->session = $req->get('session');
            $obj->status = 'pending';
            $obj->save();
        }
        if ($obj)
            return back()->with('successmsg', 'Enrollment Request Successfull ');

        else
            return back()->with('errormsg', 'Cannot Request');
    }
    public function updaterequests()
    {
       
        $data3=Advisor::select('batch')->where('teacher_id', '=',  session('username'))->get();
        foreach($data3 as $value)
        $data2=Student::select('student_id')->where('batch', '=', $value->batch)->get();
        //dd($data2);
        //$d=array_sum($data2);
        //for($i=0;$i<=$d;$i++)
        foreach($data2 as $value1)
     // dd(($key));
        $data = Enrollment::leftJoin('courses as c', 'course_id', 'c.id')
            ->select('c.title as title', 'c.code as code', 'c.type as coursetype', 'c.credit as credit', 'session', 'status', 'enrollments.type','enrollments.student_id')
            ->where('student_id', '=',$value1->student_id)
            ->get();
          //dd($data);
        $data1 = Course::leftJoin('semesters as s', 'semester_id', 's.id')
            ->leftJoin('enrollments as e', 'courses.id', 'e.course_id')
            ->select('s.semester_no as semester', 's.id as id')->where('student_id', '=', $value1->student_id)
            ->get();
           // dd($data1);
        return view('teacher.update_requests', compact('data', 'data1'));
       
    }
}
