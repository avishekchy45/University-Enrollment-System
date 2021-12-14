<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserAccount;
use App\Models\Student;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function studentfrom(request $request)
    {
        $advisor = DB::table('advisors')
            ->select('batch')
            ->get();
        //dd($advisor);
        return view('admin.add_student', compact('advisor'));
    }
    public function createstudent(request $req)
    {
        $req->validate([
            'stid' => 'required|unique:user_accounts,username',
            'batch' => 'required',
            'name' => 'required',
            'email' => 'required|unique:students,email',
            
        ]);
        $obj1 = new UserAccount();
        $obj2 = new Student();
        $obj1->username = $req->stid;
        $obj1->role = 'student';
        $obj2->student_id = $req->stid;
        $obj2->name = $req->name;
        $obj2->email = $req->email;
        $obj2->phone_num = $req->phone;
        $obj2->address = $req->address;
        $obj2->batch = $req->batch;
        // dd($obj2);
        $obj1->save();
        $obj2->save();
        if ($obj1 and $obj2)
            return back()->with('successmsg', 'Student ID Successfully Created with Default Password');
        else
            return back()->with('errorsmsg', 'Cannot Create Student');
    }
    public function studentlist()
    {
        $data = Student::all();
        return view('admin.student_list', compact('data'));
    }
}
