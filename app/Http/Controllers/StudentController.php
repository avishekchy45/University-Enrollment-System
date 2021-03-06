<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserAccount;
use App\Models\Student;
use App\Models\Advisor;


class StudentController extends Controller
{
    public function addstudent(request $request)
    {
        $advisor = Advisor::select('batch')->get();
        //dd($advisor);
        return view('admin.add_student', compact('advisor'));
    }
    public function createstudent(request $req)
    {
        $req->validate([
            'stuid' => 'required|unique:user_accounts,username|min:4|max:13',
            'batch' => 'required|integer|exists:advisors,batch',
            'name' => 'required',
            'email' => 'email|unique:students,email',
            
        ]);
        $obj1 = new UserAccount();
        $obj2 = new Student();
        $obj1->username = $req->stuid;
        $obj1->role = 'student';
        $obj2->student_id = $req->stuid;
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
    public function editstudent($id)
    {
        $data = Student::find($id);
        return view('admin.update_student', compact('data'));
    }
    public function updatestudent(Request $req, $id)
    {
        $req->validate([
            'name' => 'required',
            'email' => 'email|required|unique:students,email',
        ]);
        $obj = Student::find($id);
        $obj->name = $req->name;
        $obj->email = $req->email;
        $obj->phone_num = $req->phone;
        $obj->address = $req->address;
        $obj->save();
        return back()->with('successmsg', 'Student Successfully Updated');
    }
    public function deletestudent($id)
    {
        // UserAccount::find($id)->delete();
        UserAccount::where('username','=',$id)->delete();
        return redirect()->back()->with('successmsg', 'Deleted Successfully');
    }
}
