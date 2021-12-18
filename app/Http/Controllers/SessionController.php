<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Session;

class SessionController extends Controller
{
    public function createsession(request $req)
    {
        $req->validate([
            'session' => 'required|unique:sessions,name',
        ]);
        $obj1 = new Session();
        $obj1->name = $req->session;
        // $obj1->status = '0';
        // dd($obj1);
        $obj1->save();
        if ($obj1)
            return back()->with('successmsg', 'Session Successfully Created');
        else
            return back()->with('errorsmsg', 'Cannot Create Session');
    }
    public function updatesession(request $req, $id)
    {
        $status = $req->status;
        Session::where('id', $id)->update(['status' => $status]);
        if ($status == 1) {
            $statuschange = "Running";
        } else if ($status == 0) {
            $statuschange = "Closed";
        }
        echo "Status Updated to $statuschange";
        // return back()->with('successmsg', 'Session Successfully Updated');
    }
}
