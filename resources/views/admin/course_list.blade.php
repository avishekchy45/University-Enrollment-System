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
    <span style="float: left; font-family: Palatino Linotype, Verdana; font-size: 12pt">
        List of all Courses({{$data->count()}} Entries)
    </span>
    <table class='table table-sm table-striped table-hover table-responsive-sm text-center list' id='counterlist'>
        <thead class="tableheader">
            <th>No.</th>
            <th> Title</th>
            <th> Code</th>
            <th> Type</th>
            <th>Credit</th>
            <th>Department</th>
            <th>Semester</th>
            <th>Action</th>
        </thead>
        <tbody class="table-bordered">
            @if($data->count())
            @foreach($data as $value)
            <tr>
                <td class='animate__animated animate__fadeIn animate__slower'>{{$loop->iteration}}</td>
                <td class='animate__animated animate__fadeIn animate__slower'>{{$value->title}}</td>
                <td class='animate__animated animate__fadeIn animate__slower'>{{$value->code}}</td>
                <td class='animate__animated animate__fadeIn animate__slower'>{{$value->type}}</td>
                <td class='animate__animated animate__fadeIn animate__slower'>{{$value->credit}}</td>
                <td class='animate__animated animate__fadeIn animate__slower'>{{$value->department}}</td>
                <td class='animate__animated animate__fadeIn animate__slower'>{{$value->semester}}</td>
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
</div>
@endsection