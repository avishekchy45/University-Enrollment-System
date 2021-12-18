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
    <form target="_self" enctype="multipart/form-data" method="POST" action="{{ URL::to('createsession')}}" class="animate__animated animate__zoomIn">
        @csrf
        <h5 class='text-center formheader'>Session Registration Form</h5><br>
        <div class="form-group row">
            <label for="teaid" class="col-sm-2 col-form-label">Session Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="session" name="session" value="{{ old('session') }}" required>
                @if ($errors->has('session'))
                <div class="form-text alert alert-danger"> {{ $errors->first('session') }} </div>
                @endif
            </div>
        </div>
        <div class="form-group row text-center">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-outline-info">Create Session</button>
            </div>
        </div>
    </form>
    <br>
    <span style="float: left; font-family: Palatino Linotype, Verdana; font-size: 12pt">
        List of available Sessions ( {{$data->count()}} Entries)
    </span>
    <table class='table table-sm table-striped table-hover table-responsive-sm text-center list' id='counterlist'>
        <thead class="tableheader">
            <th>No.</th>
            <th>Session</th>
            <th>Status</th>
            <th>Actions</th>
        </thead>
        <tbody class="table-bordered">
            @if($data->count())
            @foreach($data as $value)
            <!-- <form method="POST" action="{{ URL::to('updatesession/'.$value->id) }}" class="animate__animated animate__zoomIn">
                @csrf -->
            <tr>
                <td class='animate__animated animate__fadeIn animate__slower'>{{$loop->iteration}}</td>
                <td class='animate__animated animate__fadeIn animate__slower'>{{$value->name}}</td>
                <td class='animate__animated animate__fadeIn animate__slower'><span class="status" id='status{{$value->id}}'>{{$value->status=='1'?'Running':'Closed'}}</span></td>
                <td>
                    <label class="status">
                        <input type="checkbox" name="status" {{$value->status=='1'?'checked':''}} onclick=changestatus(this,{{$value->id}})>
                        <span class="slider round"></span>
                    </label>
                </td>
            </tr>
            <!-- </form> -->
            @endforeach
            @else
            <tr class="text-center">
                <td colspan="9" class="alert alert-danger animate__animated animate__fadeIn animate__slower">No Session Found</td>
            </tr>
            @endif
        </tbody>
    </table>
    <script>
        var status;

        function changestatus(item, id) {
            var url = "updatesession/" + id;
            // alert(url);
            if (item.checked) {
                status = 1;
            } else {
                status = 0;
            }
            // alert(status);
            $.ajax({
                url: url,
                method: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    status: status,
                },
                success: function(response) {
                    alert(response);
                },
                error: function(jqXHR, exception) {
                    if (jqXHR.status === 0) {
                        alert('Not connect.\n Verify Network.');
                    } else if (jqXHR.status == 404) {
                        alert('Requested page not found. [404]');
                    } else if (jqXHR.status == 500) {
                        alert('Internal Server Error [500].');
                    } else if (exception === 'parsererror') {
                        alert('Requested JSON parse failed.');
                    } else if (exception === 'timeout') {
                        alert('Time out error.');
                    } else if (exception === 'abort') {
                        alert('Ajax request aborted.');
                    } else {
                        alert('Uncaught Error.\n' + jqXHR.responseText);
                    }
                }
            })
            var statuschange;
            var statusid = "status" + id
            // alert(status);
            if (status == 1) {
                statuschange = "Running";
            } else if (status == 0) {
                statuschange = "Closed";
            }
            document.getElementById(statusid).innerHTML = statuschange;
        }
    </script>
</div>
@endsection