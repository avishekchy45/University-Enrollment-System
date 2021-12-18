@extends('layouts.admin')

@section('head')
<title>PUC-Admin Home | Admin</title>
@endsection

@section('main')
<nav class='navbar navbar-expand-sm navbar-light mainopt'>
    <!-- <div class="d-block d-md-none">
        <span>Click here for more options</span>
    </div> -->
    <button class='navbar-toggler' style="background-image: url(images/3.png);" type='button' data-toggle='collapse' data-target='#collapsibleNavbar'>
        <span class='navbar-toggler-icon'></span>
    </button>
    <div class='collapse navbar-collapse' style="text-align: center;" id='collapsibleNavbar'>
        <ul class='navbar-nav'>
            <li class='nav-item'>
                <a class='nav-link text-uppercase options mr-1 mt-2 mb-0 px-5' href='sessionlist'> Session List </a>
            </li>
            <li class='nav-item'>
                <a class='nav-link text-uppercase options mr-1 mt-2 mb-0 px-5' href='overlaplist'> Overlap List </a>
            </li>
            <li class='nav-item'>
                <a class='nav-link text-uppercase options mr-1 mt-2 mb-0 px-5' href='courselimit'> Course Limitations </a>
            </li>
        </ul>
    </div>
</nav>
<div class="optionline d-none d-sm-block">
    <span></span>
</div>
<br>
<div class="mainpage">

</div>
@endsection