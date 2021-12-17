<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserAccount;
use App\Models\Teacher;

class TeacherController extends Controller
{
    public function addteacher()
    {
        return view('admin.add_teacher');
    }
    public function createteacher(request $req)
    {
        $req->validate([
            'teaid' => 'required|unique:user_accounts,username|min:4|max:13',
            'name' => 'required',
            'email' => 'email|unique:teachers,email',
        ]);
        $obj1 = new UserAccount();
        $obj2 = new Teacher();
        $obj1->username = $req->teaid;
        $obj1->role = 'teacher';
        $obj2->teacher_id = $req->teaid;
        $obj2->name = $req->name;
        $obj2->email = $req->email;
        $obj2->phone_num = $req->phone;
        $obj2->address = $req->address;
        // dd($obj2);
        $obj1->save();
        $obj2->save();
        if ($obj1 and $obj2)
            return back()->with('successmsg', 'Teacher ID Successfully Created with Default Password');
        else
            return back()->with('errorsmsg', 'Cannot Create Teacher');
    }
    public function teacherlist()
    {
        $data = Teacher::all();
        return view('admin.teacher_list', compact('data'));
    }
}
