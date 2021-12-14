<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    public function addcourse(request $request)
    {
        $department = DB::table('departments')
            ->select('id', 'fullfrom')
            ->get();
        $semester = DB::table('semesters')
            ->select('id', 'semester_no')
            ->get();
        //dd($advisor);
        return view('admin.add_course', compact('department', 'semester'));
    }
    public function createcourse(request $req)
    {
        $req->validate([
            'code' => 'required',
            'title' => 'required',
            'type' => 'required|in:Theory,Laboratory',
            'credit' => 'required|numeric',
            'department' => 'required|exists:departments,id',
            'semester' => 'required|exists:semesters,id',
        ]);
        $obj2 = new Course();
        $obj2->code = $req->code;
        $obj2->title = $req->title;
        $obj2->type = $req->type;
        $obj2->credit = $req->credit;
        $obj2->department_id = $req->department;
        $obj2->semester_id = $req->semester;
        //dd($obj2);
        $obj2->save();
        if ($obj2)
            return back()->with('successmsg', 'Course Successfully Created');
        else
            return back()->with('errorsmsg', 'Cannot Create Course');
    }
    public function Courselist()
    {
        /*$data = Course::all();
        return view('admin.course_list', compact('data'));*/
        // dd($data);
        $data = DB::table('courses as c')
            ->leftJoin('departments as d', 'c.department_id', 'd.id')
            ->leftJoin('semesters as s', 'c.semester_id', 's.id')
            ->select('c.id', 'c.title', 'c.code', 'c.type', 'c.credit', 'd.fullfrom as department', 's.semester_no as semester')
            ->get();

        return view('admin.course_list', compact('data'));
    }
}
