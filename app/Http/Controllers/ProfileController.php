<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use App\Models\Teacher;
use App\Models\Student;
use App\Models\UserAccount;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function adminprofile(request $request)
    {
        $data = Admin::where('admin_id','=', session('username'))->first();
        $data1 = UserAccount::where('username','=', session('username'))->first();
        return view('admin.edit_profile', compact('data','data1'));
    }
    public function updateadminprofile(request $req)
    {
       
        $req->validate([
            'name' => 'required',
            'email' => 'email|required',
            'password' => 'required|min:4',
        ]);

        $obj = Admin::where('admin_id','=',session('username'))->first();
        $obj1 = UserAccount::where('username','=',session('username'))->first();
        $obj->name = $req->name;
        $obj->email = $req->email;
        $obj->phone_num = $req->phone;
        $obj->address = $req->address;
        $obj1->password=Hash::make($req->password);
        $obj->save();
        $obj1->save();
        return back()->with('successmsg', 'Profile Successfully Updated');
    }
    public function teacherprofile(request $request)
    {
        $data = Teacher::where('teacher_id','=', session('username'))->first();
        $data1 = UserAccount::where('username','=', session('username'))->first();
        return view('teacher.edit_profile', compact('data','data1'));
    }
    public function updateteacherprofile(request $req)
    {
       
        $req->validate([
            'name' => 'required',
            'email' => 'email|required',
            'password' => 'required|min:4',
        ]);

        $obj = Teacher::where('teacher_id','=',session('username'))->first();
        $obj1 = UserAccount::where('username','=',session('username'))->first();
        $obj->name = $req->name;
        $obj->email = $req->email;
        $obj->phone_num = $req->phone;
        $obj->address = $req->address;
        $obj1->password=Hash::make($req->password);
        $obj->save();
        $obj1->save();
        return back()->with('successmsg', 'Profile Successfully Updated');
    }
    public function studentprofile(request $request)
    {
        $data = Student::where('student_id','=', session('username'))->first();
        $data1 = UserAccount::where('username','=', session('username'))->first();
        return view('student.edit_profile', compact('data','data1'));
    }
    public function updatestudentprofile(request $req)
    {
       
        $req->validate([
            'name' => 'required',
            'email' => 'email|required',
            'password' => 'required|min:4',
        ]);

        $obj = Student::where('student_id','=',session('username'))->first();
        $obj1 = UserAccount::where('username','=',session('username'))->first();
        $obj->name = $req->name;
        $obj->email = $req->email;
        $obj->phone_num = $req->phone;
        $obj->address = $req->address;
        $obj1->password=Hash::make($req->password);
        $obj->save();
        $obj1->save();
        return back()->with('successmsg', 'Profile Successfully Updated');
    }
}
