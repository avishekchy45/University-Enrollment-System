@extends('layouts.admin')

@section('head')
<title>PUC-Admin | Update Course</title>
@endsection

@section('main')
<ul class='navbar-nav d-flex flex-row mainopt'>
    <li class='nav-item'>
        <a class='nav-link text-uppercase options mr-1 mt-2 mb-0 px-5' href="{{URL::to('addcourse')}}"> Add Course </a>
    </li>
    <li class='nav-item'>
        <a class='nav-link text-uppercase options mr-1 mt-2 mb-0 px-5' href="{{URL::to('courselist')}}"> Courses List </a>
    </li>
</ul>
<div class="optionline d-none d-sm-block">
    <span></span>
</div>
<br>
<div class="mainpage">
    <form target="_self" enctype="multipart/form-data" method="POST" action="{{ URL::to('updatecourse/'.$data->id)}}" class="animate__animated animate__zoomIn">
        @csrf
        <h5 class='text-center formheader'>Course Update Form</h5><br>
        <div class="form-group row">
            <label for="code" class="col-sm-2 col-form-label">Course Code</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="code" name="code" value="{{$data->code }}" placeholder="Example: CSE 123" required>
                @if ($errors->has('teaid'))
                <div class="form-text alert alert-danger"> {{ $errors->first('code') }} </div>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="title" class="col-sm-2 col-form-label">Course Title</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="title" name="title" value="{{$data->title }}" required>
                @if ($errors->has('title'))
                <div class="form-text alert alert-danger"> {{ $errors->first('title') }} </div>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="type" class="col-sm-2 col-form-label">Course Type</label>
            <div class="col-sm-10">
                <select type="text" class="form-control" id="type" name="type" value="{{ $data->type }}">
                    <option value="Theory" {{$data->type=='Theory'?'selected': "" }}> Theory </option>
                    <option value="Laboratory" {{$data->type=='Laboratory'?'selected': "" }}> Laboratory</option>
                </select>
                @if ($errors->has('type'))
                <div class="form-text alert alert-danger"> {{ $errors->first('type') }} </div>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="credit" class="col-sm-2 col-form-label">Credit</label>
            <div class="col-sm-10">
                <input type="tel" class="form-control" id="credit" name="credit" value="{{ $data->credit }}">
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
                    @if ($data->department_id==$d->id)
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
                    @if ($data->semester_id==$s->id)
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
                <button type="submit" class="btn btn-outline-info">Update Course</button>
            </div>
        </div>
    </form>
    <br>
</div>
@endsection