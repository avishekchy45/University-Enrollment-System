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
            <div class="row no-gutters">
                <div class="col-sm text-center">
                    @include('includes.header')
                </div>
            </div>
        </div>

        <!-- MENU,MAIN,SIDEBAR -->
        <div class="container-fluid">
            <div class="row">
                <!-- MENU -->
                <div class="col-sm-2 text-left">
                    @yield('menu')
                </div>
                <!-- MAIN -->
                <div class="col-sm-8 text-center">
                    @yield('main')
                </div>
                <!-- SIDEBAR -->
                <div class="col-sm-2 text-right">
                    @yield('sidebar')
                </div>
            </div>
        </div>
    </div>

    <!-- FOOTER -->
    <div class="container-fluid p-0">
        <div class="row no-gutters">
            <div class="col-sm">
                @include('includes.footer')
            </div>
        </div>
    </div>

</body>

</html>