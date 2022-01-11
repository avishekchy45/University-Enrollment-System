@extends('layouts.admin')

@section('head')
<title>PUC-Admin | Update Advisor</title>
@endsection

@section('main')
<ul class='navbar-nav d-flex flex-row mainopt'>
    <li class='nav-item'>
        <a class='nav-link text-uppercase options mr-1 mt-2 mb-0 px-5' href="{{ URL::to('addadvisor')}}"> Add Advisor </a>
    </li>
    <li class='nav-item'>
        <a class='nav-link text-uppercase options mr-1 mt-2 mb-0 px-5' href="{{ URL::to('advisorlist')}}">Advisor List </a>
    </li>
</ul>
<div class="optionline d-none d-sm-block">
    <span></span>
</div>
<br>
<div class="mainpage">

    <form enctype="multipart/form-data" method="POST" action="{{ URL::to('updateadvisor/'.$data->id)}}" class="animate__animated animate__zoomIn">
        @csrf
        <h5 class='text-center formheader'>Update Advisor Form</h5><br>
        <div class="form-group row">
            <label for="teaid" class="col-sm-2 col-form-label">ID</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="teaid" name="teaid" value="{{ $data->teacher_id}}" readonly required>
                @if ($errors->has('teaid'))
                <div class="form-text alert alert-danger"> {{ $errors->first('teaid') }} </div>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Batch</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="batch" name="batch" value="{{ $data->batch }}" required>
                @if ($errors->has('batch'))
                <div class="form-text alert alert-danger"> {{ $errors->first('batch') }} </div>
                @endif
            </div>
        </div>

</div>
<div class="form-group row text-center">
    <div class="col-sm-10">
        <button type="submit" class="btn btn-outline-info">Update Advisor</button>
    </div>
</div>
</form>
<br>
</div>
@endsection