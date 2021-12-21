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
        <p class="text-right"><b>Session:</b> {{$sessionname}}</p>
        <p class="text-right"><b>Exam Type:</b> Regular, Recourse</p>
    </div>
    <hr>
    <table class='table table-sm table-striped table-hover table-responsive-sm text-center list' id='overlaplist'>
        <thead class="tableheader">
            <th>Course</th>
            <th>Overlapped Course</th>
            <th>Overlapped Students</th>
        </thead>
        <tbody class="table-bordered">
            @if(count($overlap) > 0)
            @foreach(array_values($course) as $i)
                @foreach (array_values($course) as $j)
                    @if($i === $j)
                        @continue
                    @endif
                    <tr>
                        <td class='animate__animated animate__fadeIn animate__slower'>
                            {{ array_keys($course)[$i-1] }}<br>
                        </td>
                        <td class="animate__animated animate__fadeIn animate__slower">
                            {{ array_keys($course)[$j-1] }}
                        </td>
                        <td class="animate__animated animate__fadeIn animate__slower">
                            {{ $overlap[$i][$j] }}
                        </td>
                    </tr>
                @endforeach
            @endforeach
            @else
            <tr class="text-center">
                <td colspan="9">No Overlap Found</td>
            </tr>
            @endif
        </tbody>
    </table>
    @endif
    <script>
        $(document).ready(function() {
            $('#overlaplist').DataTable();
        });
        $('#overlaplist').dataTable({
            "pagingType": "full_numbers",
            language: {
                paginate: {
                    first: '«',
                    previous: '‹',
                    next: '›',
                    last: '»'
                },
                aria: {
                    paginate: {
                        first: 'First',
                        previous: 'Previous',
                        next: 'Next',
                        last: 'Last'
                    }
                },
                "lengthMenu": "Show _MENU_ Entries<br><br>List of Overlapped Corses",
                // "info": "",
            },
            "order": [],
            "lengthMenu": [20, 50, 100],
            columnDefs: [{
                orderable: false,
                targets: [0, 1]
            }],
        });
    </script>
</div>
@endsection