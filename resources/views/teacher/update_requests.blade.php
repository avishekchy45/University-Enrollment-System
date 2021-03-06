@extends('layouts.teacher')

@section('head')
<title>PUC-Teacher | Requests</title>
@endsection


@section('main')
<ul class='navbar-nav d-flex flex-row mainopt'>
    <li class='nav-item'>
        <a class='nav-link text-uppercase options mr-1 mt-2 mb-0 px-5' href='enrollstudent'> Manual Entry </a>
    </li>
    <li class='nav-item'>
        <a class='nav-link text-uppercase options mr-1 mt-2 mb-0 px-5' href='updaterequests'> Update Requests </a>
    </li>
</ul>
<div class="optionline d-none d-sm-block">
    <span></span>
</div>
<br>
<div class="mainpage">
    @if($data->count())
    <form target="_self" enctype="multipart/form-data" method="get" id="form1" class="animate__animated animate__zoomIn">
        @csrf
        <div class="form-group row">
            <label for="teaid" class="col-sm-2 col-form-label"> Select Available Session </label>
            <div class="col-sm-10">
                <select type="text" class="form-control" id="session" name="sessionname" value="{{ old('sessionname') }}" required>
                    <option value="" disabled selected>Select Session</option>
                    @foreach($data as $d)
                    @if (old('sessionname')==$d->name)
                    <option value={{$d->name}} selected>{{$d->name }}</option>
                    @else
                    <option value="{{$d->name}}"> {{$d->name}}</option>
                    @endif
                    @endforeach
                </select>
                @if ($errors->has('sessionname'))
                <div class="form-text alert alert-danger"> {{ $errors->first('sessionname') }} </div>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="teaid" class="col-sm-2 col-form-label">Select Batch </label>
            <div class="col-sm-10">
                <select type="text" class="form-control" id="batch" name="batch" value="{{ old('batch') }}" required>
                    <option value="" disabled selected>Select batch</option>
                    @foreach($data2 as $d)
                    @if (old('batch')==$d->batch)
                    <option value={{$d->batch}} selected>{{$d->batch }}</option>
                    @else
                    <option value="{{$d->batch}}"> {{$d->batch}}</option>
                    @endif
                    @endforeach
                </select>
                @if ($errors->has('batch'))
                <div class="form-text alert alert-danger"> {{ $errors->first('batch') }} </div>
                @endif
            </div>
        </div>
        <div class="form-group row text-center">
            <div class="col-sm-10">
                <button type="submit" name="search" class="btn btn-outline-info">Submit</button>
            </div>
        </div>
    </form>
    @else
    <p class="alert alert-danger text-center">Enrollment Closed</p>
    @endif
    @if(isset($_GET['search']))
    @php($sessionname=$_GET['sessionname'])
    @php($batch=$_GET['batch'])
    <div>
        <p class="text-right"><b>Session:</b> {{$sessionname}} </p>
        <p class="text-right"><b>Exam Type:</b> Regular, Recourse </p>
        <p class="text-right"><b>Batch:</b> {{$batch}} </p>
    </div>
    <hr>
    <style>
        #form1 {
            display: none;
        }
    </style>
    <span style="float: left; font-family: Palatino Linotype, Verdana; font-size: 12pt">
        List of all Enrollments({{$data3->count()}} Entries)
    </span>
    <table class='table table-sm table-striped table-hover table-responsive-sm text-center list' id='counterlist'>
        <thead class="tableheader">
            <th>No.</th>
            <th>Student ID</th>
            <th>Title</th>
            <th>Code</th>
            <th>Course Type</th>
            <th>Credit</th>
            <th>Exam Type</th>
            <th>Status</th>
            <th>Actions</th>
        </thead>
        <tbody class="table-bordered">
            @if($data3->count())
            @foreach($data3 as $key => $value)
            <tr>
                <td class='animate__animated animate__fadeIn animate__slower'>{{$loop->iteration}}</td>
                <td class='animate__animated animate__fadeIn animate__slower'>{{$value->student_id}}</td>
                <td class='animate__animated animate__fadeIn animate__slower'>{{$value->title}}</td>
                <td class='animate__animated animate__fadeIn animate__slower'>{{$value->code}}</td>
                <td class='animate__animated animate__fadeIn animate__slower'>{{$value->coursetype}}</td>
                <td class='animate__animated animate__fadeIn animate__slower'>{{$value->credit}}</td>
                <td class='animate__animated animate__fadeIn animate__slower'>{{$value->type}}</td>
                <td class='animate__animated animate__fadeIn animate__slower'>{{$value->status}}</td>
                <td>
                    <a href="{{ URL::to('updaterequests/'.$value->id)}}" class="btn btn-warning btn-sm animate__animated animate__fadeIn animate__fast">Accept</a>&nbsp;
                    <a href="" class="btn btn-danger btn-sm animate__animated animate__fadeIn animate__fast">Reject</a>&nbsp;
                </td>
                @endforeach
                @else
            <tr class="text-center">
                <td colspan="9" class="alert alert-danger animate__animated animate__fadeIn animate__slower">No Course Found</td>
            </tr>
            @endif
        </tbody>
    </table>
    @endif
</div>
@endsection