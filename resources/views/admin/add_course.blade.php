@extends('layouts.admin')

@section('head')
<title>PUC-Admin | Add Course</title>
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
                <a class='nav-link text-uppercase options mr-1 mt-2 mb-0 px-5' href='addcourse'> Add Course </a>
            </li>
            <li class='nav-item'>
                <a class='nav-link text-uppercase options mr-1 mt-2 mb-0 px-5' href='courselist'> Courses List </a>
            </li>
        </ul>
    </div>
</nav>
<div class="optionline d-none d-sm-block">
    <span></span>
</div>
<br>
<div class="mainpage">
    <form target="_self" enctype="multipart/form-data" method="POST" action="{{ URL::to('createcourse')}}" class="animate__animated animate__zoomIn">
        @csrf
        <h5 class='text-center formheader'>Course Add Form</h5><br>
        <div class="form-group row">
            <label for="code" class="col-sm-2 col-form-label">Course Code</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="code" name="code" value="{{ old('code') }}" placeholder="Example: CSE 123" required>
                @if ($errors->has('teaid'))
                <div class="form-text alert alert-danger"> {{ $errors->first('code') }} </div>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="title" class="col-sm-2 col-form-label">Course Title</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
                @if ($errors->has('title'))
                <div class="form-text alert alert-danger"> {{ $errors->first('title') }} </div>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="type" class="col-sm-2 col-form-label">Course Type</label>
            <div class="col-sm-10">
                <select type="text" class="form-control" id="type" name="type" value="{{ old('type') }}">
                    <option value="" disabled selected> Select Type</option>
                    <option value="Theory"> Theory </option>
                    <option value="Laboratory"> Laboratory</option>
                </select>
                @if ($errors->has('type'))
                <div class="form-text alert alert-danger"> {{ $errors->first('type') }} </div>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="credit" class="col-sm-2 col-form-label">Credit</label>
            <div class="col-sm-10">
                <input type="tel" class="form-control" id="credit" name="credit" value="{{ old('credit') }}">
                @if ($errors->has('credit'))
                <div class="form-text alert alert-danger"> {{ $errors->first('credit') }} </div>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="department" class="col-sm-2 col-form-label">Department</label>
            <div class="col-sm-10">
                <select type="text" class="form-control" id="department" name="department" value="{{ old('department') }}">
                    <option value="" disabled selected> Select Department</option>
                    @foreach($department as $d)
                    @if (old('department')==$d->id)
                    <option value={{$d->id}} selected>{{$d->fullfrom }}</option>
                    @else
                    <option value="{{$d->id}}"> {{$d->fullfrom}}</option>
                    @endif
                    @endforeach
                </select>
                @if ($errors->has('department'))
                <div class="form-text alert alert-danger"> {{ $errors->first('department') }} </div>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="semester" class="col-sm-2 col-form-label">Semester</label>
            <div class="col-sm-10">
                <select type="text" class="form-control" id="semester" name="semester" value="{{ old('semester') }}">
                    <option value="" disabled selected> Select Semester</option>
                    @foreach($semester as $s)
                    @if (old('semester')==$s->id)
                    <option value={{$s->id}} selected>{{$s->semester_no }}</option>
                    @else
                    <option value="{{$s->id}}"> {{$s->semester_no}}</option>
                    @endif
                    @endforeach
                </select>
                @if ($errors->has('semester'))
                <div class="form-text alert alert-danger"> {{ $errors->first('semester') }} </div>
                @endif
            </div>
        </div>
        <div class="form-group row text-center">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-outline-info">ADD Course</button>
            </div>
        </div>
    </form>
    <br>
</div>
@endsection