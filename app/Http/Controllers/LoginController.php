<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserAccount;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login()
    {
        return view('login');
    }
    public function logout()
    {
        // session()->forget('username');
        session()->flush();
        return redirect('/')->with('successmsg', 'You have been successfully Logged Out.');
    }
    public function loginvalidation(request $req)
    {
        $req->validate([
            'username' => 'required',
            'pass' => 'required',
        ]);
        $username = $req->username;
        $pass = $req->pass;
        // $pass = Hash::make($pass);
        $data = UserAccount::where('username', '=', $username)
            // ->where('password', '=', $pass)
            ->first();
        // dd($pass);
        if (!$data)
            return redirect()->back()->with('errormsg', 'Invalid Username or Password');
        else if (Hash::check($pass, $data->password)) {
            $req->session()->put('username', $data->username);
            $req->session()->put('userrole', $data->role);
            return redirect('/' . session('userrole'))->with('successmsg', 'You have been successfully Logged In.');
        }
        return redirect()->back()->with('errormsg', 'Invalid Username or Password');
    }
}
