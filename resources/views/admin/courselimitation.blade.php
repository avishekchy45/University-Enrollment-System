@extends('layouts.admin')

@section('head')
<title>PUC-Admin | Course Limitation</title>
@endsection

@section('main')
<ul class='navbar-nav d-flex flex-row mainopt'>
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

<div class="optionline d-none d-sm-block">
    <span></span>
</div>
<br>
<div class="mainpage">
    <form target="_self" enctype="multipart/form-data" method="POST" action="{{ URL::to('updatecourselimit')}}" class="animate__animated animate__zoomIn">
        @csrf
        <h5 class='text-center formheader'>Course Limitation Form</h5><br>
        @foreach($data as $value)
        <div class="form-group row">
            <label for="teaid" class="col-sm-2 col-form-label">Maximum Student per Section</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="maxstudent" name="maxstudent" value="{{ $value->max_student }}" required>
                @if ($errors->has('maxstudent'))
                <div class="form-text alert alert-danger"> {{ $errors->first('maxstudent') }} </div>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="teaid" class="col-sm-2 col-form-label">Maximum Credit per Student</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="maxcredit" name="maxcredit" value="{{ $value->max_credit }}" required>
                @if ($errors->has('maxcredit'))
                <div class="form-text alert alert-danger"> {{ $errors->first('maxcredit') }} </div>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="teaid" class="col-sm-2 col-form-label">Cost per Credit</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="costpercredit" name="costpercredit" value="{{ $value->cost_per_credit }}" required>
                @if ($errors->has('costpercredit'))
                <div class="form-text alert alert-danger"> {{ $errors->first('costpercredit') }} </div>
                @endif
            </div>
        </div>
        @endforeach
        <div class="form-group row text-center">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-outline-info">Save</button>
            </div>
        </div>
    </form>
    <br>
</div>
@endsection