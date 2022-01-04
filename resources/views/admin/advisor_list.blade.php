@extends('layouts.admin')

@section('head')
<title>PUC-Admin | Advisor List</title>
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
                <a class='nav-link text-uppercase options mr-1 mt-2 mb-0 px-5' href='addadvisor'> Add Advisor </a>
            </li>
            <li class='nav-item'>
                <a class='nav-link text-uppercase options mr-1 mt-2 mb-0 px-5' href='advisorlist'> Advisors List </a>
            </li>
        </ul>
    </div>
</nav>
<div class="optionline d-none d-sm-block">
    <span></span>
</div>
<br>
<div class="mainpage">
    <!-- <span style="float: left; font-family: Palatino Linotype, Verdana; font-size: 12pt">
        List of all Advisors ({{$data->count()}} Entries)
    </span> -->
    <table class='compact table table-sm table-striped table-hover table-responsive-sm text-center list' id='advisorlist'>
        <thead class="tableheader">
            <th>No.</th>
            <th>ID</th>
            <th>Batch</th>
            <th>Actions</th>
        </thead>
        <tbody class="table-bordered">
            @if($data->count())
            @foreach($data as $value)
            <tr>
                <td class='animate__animated animate__fadeIn animate__slower'>{{$loop->iteration}}</td>
                <td class='animate__animated animate__fadeIn animate__slower'>{{$value->teacher_id}}</td>
                <td class='animate__animated animate__fadeIn animate__slower'>{{$value->batch}}</td>
                <td>
                    <a href="{{ URL::to('editadvisor/'.$value->id)}}" class="btn btn-warning btn-sm animate__animated animate__fadeIn animate__fast">Update</a>&nbsp;
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
                                    Are you sure you want to Delete {{$value->teacher_id}}?
                                </div>
                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <a href="" class="btn btn-success">No</a>
                                    <a href="{{ URL::to('deleteadvisor/'.$value->id)}}" class="btn btn-danger">Yes</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
            @else
            <tr class="text-center">
                <td colspan="4" class="alert alert-danger animate__animated animate__fadeIn animate__slower">No Advisor Found</td>
            </tr>
            @endif
        </tbody>
    </table>
    <script>
        $(document).ready(function() {
            $('#advisorlist').DataTable();
        });
        $('#advisorlist').dataTable({
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
                "lengthMenu": "Show _MENU_ Entries<br><br>List of all Advisors ({{$data->count()}} Entries)",
                // "info": "",
            },
            "order": [],
            "lengthMenu": [5, 10, 20, 50, 100],
            columnDefs: [{
                orderable: false,
                targets: [0, 3]
            }],
        });
    </script>
</div>
@endsection