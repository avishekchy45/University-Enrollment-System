<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminEnrollment extends Controller
{
    public function overlaplist()
    {
        return view('admin.overlap_list');
    }
    public function courselimit()
    {
        return view('admin.courselimitation');
    }
}
