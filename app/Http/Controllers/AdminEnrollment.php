<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Session;
use App\Models\Enrollment;
use App\Models\Course;
use App\Models\CourseLimitation;

class AdminEnrollment extends Controller
{
    public function overlaplist(request $request)
    {
        $data = Session::select('name')->get();
        if ($request->has('session')) {
            // $data2 = Enrollment::groupBy('course_id')
            //     ->select('course_id', Enrollment::raw("count(student_id) as enrolled"))
            //     ->get();
            $data3 = Course::all();
            $course = array();
            $semester = array();
            foreach ($data3 as $d) {
                $course[$d->title] = $d->id;
                // array_push($course, $d->id);
                $semester[$d->id] = $d->semester_id;
            }
            // dd($course);
            // dd($semester);
            // $coursenumber = count($data3);
            $data2 = Enrollment::where('session', '=', $request->session)->get();
            $enrolled = array();
            foreach ($data2 as $d) {
                // print_r($d->student_id);
                // array_push($enrolled[$d->student_id], $d->course_id);
                $enrolled[$d->student_id][] = $d->course_id;
            }
            // dd($enrolled);
            $overlap = array();
            // dd($request->session);
            // print_r($course);
            // print("<br>");
            // print_r(array_values($course));
            foreach (array_values($course) as $i) {
                foreach (array_values($course) as $j) {
                    if ($semester[$i] == $semester[$j]) {
                        $overlap[$i][$j] = 'Same Semester';
                    } else
                        $overlap[$i][$j] = 0;
                }
            }
            foreach (array_keys($enrolled) as $key) {
                $taken = count($enrolled[$key]);
                for ($i = 0; $i < $taken - 1; $i++) {
                    for ($j = $i + 1; $j < $taken; $j++) {
                        $course1 = $enrolled[$key][$i];
                        $course2 = $enrolled[$key][$j];
                        if ($course1 > $course2) {
                            $course1 = $course1 + $course2;
                            $course2 = $course1 - $course2;
                            $course1 = $course1 - $course2;
                        }
                        if ($overlap[$course1][$course2] == 'Same Semester')
                            continue;
                        $overlap[$course1][$course2] += 1;
                        $overlap[$course2][$course1] = 'Already Counted';
                    }
                }
            }
            // dd($overlap);
            // dd(array_keys($course)[1]);
            // dd($enrolled);
            // dd($data2);
            return view('admin.overlap_list', compact('semester','course', 'overlap', 'data'));
        }
        return view('admin.overlap_list', compact('data'));
    }

    public function courselimit()
    {
        $data = CourseLimitation::all();
        return view('admin.courselimitation', compact('data'));
    }

    public function updatecourselimit(request $req)
    {
        $req->validate([
            'maxcredit' => 'required|integer',
            'maxstudent' => 'required|integer',
            'costpercredit' => 'required|integer',
        ]);
        $id = 1;
        $maxcredit = $req->maxcredit;
        $maxstudent = $req->maxstudent;
        $costpercredit = $req->costpercredit;
        $data = CourseLimitation::where('id', $id)
            ->update([
                'max_credit' => $maxcredit,
                'max_student' => $maxstudent,
                'cost_per_credit' => $costpercredit
            ]);
        return redirect()->back()->with('successmsg', 'Successfully Updated Course Limitation');
    }
}
