<!DOCTYPE html>
<html lang="en">

<head>
    @include('includes.head')
    @yield('head')
</head>

<body>
    <div class="content">
        <!-- HEADER -->
        <div class="container-fluid p-0">
            <div class="row no-gutters header">
                <div class="col-sm text-center">
                    @if(Session::has('errormsg'))
                    <div class="alert alert-danger" role="alert">
                        {{Session::get('errormsg')}}
                    </div>
                    @elseif(Session::has('successmsg'))
                    <div class="alert alert-success" role="alert">
                        {{Session::get('successmsg')}}
                    </div>
                    @endif
                    @include('includes.header')
                    @yield('header')
                </div>
            </div>
        </div>

        <!-- NAVBAR -->
        <div class="container-fluid p-0">
            <div class="row no-gutters navbar">
                <div class="col-sm text-center">
                    @include('includes.navbar')
                </div>
            </div>
        </div>

        <!-- SIDEBAR,MAIN -->
        <div class="container-fluid">
            <div class="row">
                <!-- SIDEBAR -->
                <div class="col-sm-2 text-left sidebar">
                    @include('includes.teasidebar')
                </div>
                <!-- MAIN -->
                <div class="col-sm-10 text-left main">
                    @yield('main')
                </div>
            </div>
        </div>
    </div>
    <!-- FOOTER -->
    <div class="container-fluid p-0">
        <div class="row no-gutters footer">
            <div class="col-sm">
                @include('includes.footer')
                @yield('footer')
            </div>
        </div>
    </div>

</body>

</html>