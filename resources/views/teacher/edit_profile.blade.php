@extends('layouts.teacher')

@section('head')
<title>PUC-Teacher | Edit Profile</title>
@endsection

@section('profilepicture')
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
                <a class='nav-link text-uppercase options mr-1 mt-2 mb-0 px-5' href='teacher'> Wall </a>
            </li>
        </ul>
    </div>
</nav>
<div class="optionline d-none d-sm-block">
    <span></span>
</div>
<br>
<div class="mainpage">
<form  enctype="multipart/form-data" method="POST" action="{{URL::to('updateteacherprofile')}}" class="animate__animated animate__zoomIn">
        @csrf
        <h5 class='text-center formheader'>Update Profile</h5><br>
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name" value="{{ $data->name }}" required>
                @if ($errors->has('name'))
                <div class="form-text alert alert-danger"> {{ $errors->first('name') }} </div>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="email" name="email" value="{{$data->email }}" required>
                @if ($errors->has('email'))
                <div class="form-text alert alert-danger"> {{ $errors->first('email') }} </div>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="password" name="password" value="{{$data1->password }}" required>
                @if ($errors->has('password'))
                <div class="form-text alert alert-danger"> {{ $errors->first('password') }} </div>
                @endif
            </div>  
        </div>
        <div class="form-group row">
            <label for="phone" class="col-sm-2 col-form-label">Phone Number</label>
            <div class="col-sm-10">
                <input type="tel" class="form-control" id="phone" name="phone" value="{{ $data->phone_num }}">
                @if ($errors->has('phone'))
                <div class="form-text alert alert-danger"> {{ $errors->first('phone') }} </div>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="address" class="col-sm-2 col-form-label">Address</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="address" name="address" value="{{$data->address }}">
                @if ($errors->has('address'))
                <div class="form-text alert alert-danger"> {{ $errors->first('address') }} </div>
                @endif
            </div>
        </div>
        <div class="form-group row text-center">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-outline-info">Save</button>
            </div>
        </div>
    </form>
</div>
</div>

@endsection