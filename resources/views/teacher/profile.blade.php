@extends('layouts.teacher')

@section('head')
<title>PUC-Teacher Home | Teacher</title>
@endsection

@section('profilepicture')
<img class="pp" alt="Profile Picture" src="uploads/default.png" style="width:200px;height:150px;border-width:0px;float:left;">
@endsection

@section('main')
<ul class='navbar-nav d-flex flex-row mainopt'>
    <li class='nav-item'>
        <a class='nav-link text-uppercase options mr-1 mt-2 mb-0 px-5' href='teacher'> Wall </a>
    </li>
</ul>
<div class="optionline d-none d-sm-block">
    <span></span>
</div>
<br>
<div class="mainpage">

</div>

@endsection