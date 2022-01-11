<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Session;
use App\Models\Course;
use App\Models\CourseLimitation;
use App\Models\Enrollment;

class StudentEnrollment extends Controller
{
    public function enrollcourse(request $request)
    {
        $data = Session::select('name')->where("status", "=", 1)->get();
        // dd($data);
        if ($request->has('session')) {
            $data2 = Course::leftJoin('departments as d', 'department_id', 'd.id')
                ->leftJoin('semesters as s', 'semester_id', 's.id')
                ->select('courses.id', 'title', 'code', 'type', 'credit', 'd.fullfrom as department', 's.semester_no as semester')
                ->get();

            return view('student.enroll_course', compact('data2', 'data'));
        }
        session()->forget('successmessage');
        session()->forget('errormessage');
        return view('student.enroll_course', compact('data'));
    }

    public function enrollmentfinal(request $req)
    {
        $enrolledcredit = Enrollment::leftJoin('courses as c', 'course_id', 'c.id')
            ->where('student_id', '=', session('username'))->sum('c.credit');
        //dd($t);
        $course_id = $req->slectcourse;
        $examtype = $req->examtype;
        // dd(count($course_id));
        if (!$course_id) {
            return redirect()->back()->with('errormsg', 'Select at least One Course');
        }
        $limit = CourseLimitation::all()->first();
        // dd($limit);
        foreach ($course_id as $value) {
            // dd($examtype[$value]);
            $req->validate([
                "examtype"    => "required|array",
                "examtype.$value"  => "required",
                "slectcourse"    => "required|array",
                "slectcourse.$value" => 'required|exists:courses,id|unique:enrollments,course_id,null,id,student_id,' . session('username'),
            ]);
            $obj = new Enrollment;
            $obj->course_id = $value;
            $obj->type = $examtype[$value];
            $obj->session = $req->get('session');
            $obj->student_id = session('username');
            $obj->status = 'Pending';
            // dd($obj);
            $credit = Course::where('id', '=', $value)->select('credit')->first();
            $enrolledcredit = $credit->credit + $enrolledcredit;
            $enrolledstudent = Enrollment::where('course_id', '=', $value)->count();
            // dd($enrolled);
            // echo $credit->credit;
            if ($enrolledstudent < $limit->max_student) {
                if ($enrolledcredit <= $limit->max_credit) {
                    $obj->save();
                    // $message[$value] = "Successfully Added";
                    session()->forget("errormessage.$value");
                    session()->put("successmessage.$value", "Successfully Added");
                } else {
                    // $message[$value] = "Maximum Credit Exceeded";
                    session()->forget("successmessage.$value");
                    session()->put("errormessage.$value", "Maximum Credit Exceeded");
                    // dd(compact('message'));
                    // return redirect()->back()->with('message',array($message));
                    // return back();
                }
            } else {
                // $message[$value] = "Maximum Credit Exceeded";
                session()->forget("successmessage.$value");
                session()->put("errormessage.$value", "Maximum Student Already Enrolled");
                // dd(compact('message'));
                // return redirect()->back()->with('message',array($message));
                // return back();
            }
        }
        // dd($enrolledcredit);
        // return redirect()->back()->with('message',array($message));
        return back();
    }

    public function checkrequests()
    {
        $data = Enrollment::leftJoin('courses as c', 'course_id', 'c.id')
            ->select('c.title as title', 'c.code as code', 'c.type as coursetype', 'c.credit as credit', 'session', 'status', 'enrollments.type', 'enrollments.id')
            ->where('student_id', '=', session('username'))
            ->orderby('enrollments.created_at')
            ->get();
        $enrolledcredit = 0;
        $data1 = Course::leftJoin('semesters as s', 'semester_id', 's.id')
            ->leftJoin('enrollments as e', 'courses.id', 'e.course_id')
            ->select('s.semester_no as semester', 's.id as id')->where('student_id', '=', session('username'))
            ->get();
        foreach ($data as $value) {
            $enrolledcredit += $value->credit;
        }
        $data->enrolledcredit = $enrolledcredit;
        // dd($enrolledcredit);
        return view('student.check_requests', compact('data', 'data1'));
    }
    public function deletecourse($id)
    {
        // UserAccount::find($id)->delete();
        Enrollment::where('id', '=', $id)->delete();
        return redirect()->back()->with('successmsg', 'Course Deleted Successfully');
    }
}
