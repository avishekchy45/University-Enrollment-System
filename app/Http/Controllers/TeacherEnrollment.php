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
        $data = Session::select('name')->get();
        $data1 = Advisor::select('batch')->where("teacher_id", "=", session('username'))->get();
        if ($request->has('search')) {
            $request->validate([
                'batch' => 'required|exists:advisors,batch',
                'sessionname' => 'required|exists:sessions,name',
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
        session()->forget('successmessage');
        session()->forget('errormessage');
        return view('teacher.enroll_student', compact('data', 'data1'));
    }
    public function manualenroll(request $req)
    {
        // dd($req);
        $student_id = $req->student_id;
        $session = $req->get('sessionname');
        $course_id = $req->slectcourse;
        $examtype = $req->examtype;
        // dd(count($course_id));
        if (!$course_id) {
            return redirect()->back()->with('errormsg', 'Select at least One Course');
        }
        foreach ($course_id as $value) {
            // dd($examtype[$value]);
            $req->validate([
                "sessionname" => "exists:sessions,name,status,1",
                "examtype"    => "required|array",
                "examtype.$value"  => "required",
                "slectcourse"    => "required|array",
                "slectcourse.$value" => 'required|exists:courses,id|unique:enrollments,course_id,NULL,id,student_id,' . $student_id . ',session,' . $session,
            ]);
            $obj = new Enrollment;
            $obj->course_id = $value;
            $obj->type = $examtype[$value];
            $obj->session = $req->get('sessionname');
            $obj->student_id = $student_id;
            $obj->status = 'Pending';
            // dd($obj);
            $obj->save();
            // $message[$value] = "Successfully Added";
            session()->forget("errormessage.$value");
            session()->put("successmessage.$value", "Successfully Added");
        }
        return back();
    }
    public function updaterequests(request $request)
    {
        $data = Session::select('name')->get();
        $data2 = Advisor::select('batch')->where('teacher_id', '=',  session('username'))->get();

        // dd($data);
        if ($request->has('search')) {
            // dd($request);
            $request->validate([
                'batch' => 'required|exists:advisors,batch',
                'sessionname' => 'required|exists:sessions,name',
            ]);
            $data3 = Enrollment::leftJoin('students as s', 'enrollments.student_id', 's.student_id')
                ->leftJoin('courses as c', 'enrollments.course_id', 'c.id')
                ->where('batch', '=', $request->batch)
                ->where('session', '=', $request->sessionname)
                ->select('enrollments.id', 'c.title as title', 'c.code as code', 'c.type as coursetype', 'c.credit as credit', 'session', 'status', 'enrollments.type', 'enrollments.student_id')
                ->get();
            // dd($data3);
            return view('teacher.update_requests', compact('data', 'data2', 'data3'));
        }
        return view('teacher.update_requests', compact('data', 'data2'));
    }
    public function updaterequestsfinal(request $req, $id)
    {
        $obj = Enrollment::find($id);
        $obj->status = "Accepted";
        $obj->save();
        return back()->with('successmsg', 'Enrollment Request Successfully Updated');
    }
}
