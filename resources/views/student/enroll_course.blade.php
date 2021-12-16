@extends('layouts.student')

@section('head')
<title>PUC-Student Home | Student</title>
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
                <a class='nav-link text-uppercase options mr-1 mt-2 mb-0 px-5' href='enrollcourse'> Enrollment </a>
            </li>
            <li class='nav-item'>
                <a class='nav-link text-uppercase options mr-1 mt-2 mb-0 px-5' href='checkrequests'> Check Requests </a>
            </li>
        </ul>
    </div>
</nav>
<div class="optionline d-none d-sm-block">
    <span></span>
</div>
<br>
<div class="mainpage">
    @if($data->count())
    <form target="_self" enctype="multipart/form-data" method="get" id="form1" class="animate__animated animate__zoomIn">
        @csrf
        <div class="form-group row">
            <label for="teaid" class="col-sm-2 col-form-label">Select Available Session </label>
            <div class="col-sm-10">
                <select type="text" class="form-control" id="session" name="session" value="{{ old('session') }}" required>
                    <option value="" disabled selected>Select Session</option>
                    @foreach($data as $d)
                    @if (old('session')==$d->name)
                    <option value={{$d->name}} selected>{{$d->name }}</option>
                    @else
                    <option value="{{$d->name}}"> {{$d->name}}</option>
                    @endif
                    @endforeach
                </select>
                @if ($errors->has('session'))
                <div class="form-text alert alert-danger"> {{ $errors->first('session') }} </div>
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
    <style>
        #form1 {
            display: none;
        }
    </style>
    @php($sessionname=$_GET['session'])
    <div>
        <p>Session: {{$sessionname}}</p>
        <p>Exam Type: Regula,Recourse,Retake</p>
    </div>

    <form target="_self" enctype="multipart/form-data" method="post" id="form2" action="{{ URL::to('enrollment')}}" class="animate__animated animate__zoomIn">
        @csrf
        <span style="float: left; font-family: Palatino Linotype, Verdana; font-size: 12pt">
            List of all Courses({{$data->count()}} Entries)
        </span>
        <table class='table table-sm table-striped table-hover table-responsive-sm text-center list' id='counterlist'>
            <thead class="tableheader">
                <th>No.</th>
                <th></th>
                <th> Title</th>
                <th> Code</th>
                <th> Type</th>
                <th>Credit</th>
                <th>Department</th>
                <th>Semester</th>
                <th>Exam Type</th>
                <th>Action</th>
            </thead>
            <tbody class="table-bordered">
                @if($data2->count())
                @foreach($data2 as $value)
                <tr>
                    <td class='animate__animated animate__fadeIn animate__slower'>{{$loop->iteration}}</td>
                    <td><input id="check" type="checkbox" name="slectcourse[]" value="{{$value->id}}"></td>
                    <td class='animate__animated animate__fadeIn animate__slower'>{{$value->title}}</td>
                    <td class='animate__animated animate__fadeIn animate__slower'>{{$value->code}}</td>
                    <td class='animate__animated animate__fadeIn animate__slower'>{{$value->type}}</td>
                    <td class='animate__animated animate__fadeIn animate__slower' name="">{{$value->credit}}</td>
                    <td class='animate__animated animate__fadeIn animate__slower'>{{$value->department}}</td>
                    <td class='animate__animated animate__fadeIn animate__slower'>{{$value->semester}}</td>
                    <td class='animate__animated animate__fadeIn animate__slower'>
                        <select type="text" class="form-control" id="examtype" name="examtype[]" value="">
                            <option value="" disabled selected> Select Type</option>
                            <option value="Regular"> Regular </option>
                            <option value="Recourse"> Recourse</option>
                        </select>
                    </td>
                    <input type="hidden" name="session" class="session" value="{{$sessionname}}">
                    <td>
                        <a href="{{ URL::to('update/'.$value->id)}}" class="btn btn-warning btn-sm animate__animated animate__fadeIn animate__fast">Update</a>&nbsp;
                        <a href="" class="btn btn-danger btn-sm animate__animated animate__fadeIn animate__slower" data-toggle="modal" data-target="#myModal{{$value->id}}">Delete</a>
                        <!-- Button to Open the Modal -->
                        <!-- The Modal -->
                        <div class="modal" id="myModal{{$value->id}}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">Delete Confirmation</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        Are you sure you want to Delete {{$value->title}}?
                                    </div>
                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <a href="" class="btn btn-success">No</a>
                                        <a href="{{ URL::to('delete/'.$value->id)}}" class="btn btn-danger">Yes</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
                @else
                <tr class="text-center">
                    <td colspan="9">No Course Found</td>
                </tr>
                @endif
            </tbody>
        </table>
        @if ($errors->has('examtype'))
        <div class="form-text alert alert-danger"> {{ $errors->first('examtype') }} </div>
        @endif
        <div>
            @if ($errors->has('slectcourse'))
            <div class="form-text alert alert-danger"> {{ $errors->first('slectcourse') }} </div>
            @endif
        </div>
        <div class="form-group row text-center">
            <div class="col-sm-10">
                <button type="submit" name="submit" class="btn btn-outline-info">Submit</button>
            </div>
        </div>
    </form>
    @endif
</div>
@endsection