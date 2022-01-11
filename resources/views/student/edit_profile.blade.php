@extends('layouts.student')

@section('head')
<title>PUC-Student | Edit Profile</title>
@endsection

@section('profilepicture')
@endsection

@section('main')
<ul class='navbar-nav d-flex flex-row mainopt'>
    <li class='nav-item'>
        <a class='nav-link text-uppercase options mr-1 mt-2 mb-0 px-5' href="/{{session('userrole')}}/editprofile"> Edit Profile </a>
    </li>
</ul>
<div class="optionline d-none d-sm-block">
    <span></span>
</div>
<br>
<div class="mainpage">
    <form enctype="multipart/form-data" method="POST" action="{{URL::to('updatestudentprofile')}}" class="animate__animated animate__zoomIn">
        @csrf
        <h6 class='text-center text-danger'> (For any changes old password is required)</h6><br>
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name" value="{{ $data->name }}">
                @if ($errors->has('name'))
                <div class="form-text alert alert-danger"> {{ $errors->first('name') }} </div>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="email" name="email" value="{{$data->email }}">
                @if ($errors->has('email'))
                <div class="form-text alert alert-danger"> {{ $errors->first('email') }} </div>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label">New Password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="password" name="newpassword">
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
        <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label text-danger">Old Password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="password" name="oldpassword" required>
                @if ($errors->has('oldpassword'))
                <div class="form-text alert alert-danger"> {{ $errors->first('oldpassword') }} </div>
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
@endsection