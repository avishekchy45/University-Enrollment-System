<?php

namespace App\Http\Controllers;

use App\Models\CourseLimitation;
use Illuminate\Http\Request;

class AdminEnrollment extends Controller
{
    public function overlaplist()
    {
        return view('admin.overlap_list');
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
        $id =1;
        $maxcredit = $req->maxcredit;
        $maxstudent = $req->maxstudent;
        $costpercredit = $req->costpercredit;
        $data = CourseLimitation::where('id', $id)
            ->update([
                'max_credit' => $maxcredit,
                'max_student' => $maxstudent,
                'cost_per_credit' => $costpercredit
            ]);
        return redirect()->back()->with('successmsg', 'Suuccessfully Updated Course Limitation');
    }
}
