<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{$general->sitename}} | {{$page_title}}</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="{{asset('assets/images/logo/favicon.png')}}" />
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/main.css')}}">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/font-awesome.min.css')}}">
    <link href="{{asset('assets/admin/css/bootstrap-toggle.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/admin/css/bootstrap-fileinput.css')}}" rel="stylesheet">
    <link href="{{asset('assets/admin/css/toastr.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/admin/css/table.css')}}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/custom.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/css/sweetalert.css')}}">

    <link rel="stylesheet" href="{{asset('assets/admin/css/date-time.css')}}">

    <link href="{{asset('assets/admin/color.php?color='.$general->color)}}" rel="stylesheet">



    @yield('css')
</head>
<body class="app sidebar-mini rtl">


<!-- Navbar-->
<header class="app-header"><a class="app-header__logo" href="{{url('/')}}">{{$general->sitename}}</a>
    <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
    <!-- Navbar Right Menu-->
    <ul class="app-nav">
        <!-- User Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu">{{Auth::guard('admin')->user()->username}} <i class="fa fa-chevron-down" aria-hidden="true"></i></a>
            <ul class="dropdown-menu settings-menu dropdown-menu-right">
                <li><a class="dropdown-item" href="{{route('admin.changePass')}}"><i class="fa fa-cog fa-lg"></i> Change Password</a></li>
                <li><a class="dropdown-item" href="{{route('admin.profile')}}"><i class="fa fa-user fa-lg"></i> Profile</a></li>
                <li><a class="dropdown-item" href="{{route('admin.logout')}}"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
            </ul>
        </li>
    </ul>
</header>

<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
@include('admin.layout.sidebar')


<main class="app-content">
    <div class="app-title">
        <div>
            <h1>{{$page_title}}</h1>
        </div>
    </div>
    @yield('body')



</main>

<!-- Essential javascripts for application to work-->
<script src="{{asset('assets/admin/js/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('assets/admin/js/popper.min.js')}}"></script>
<script src="{{asset('assets/admin/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/admin/js/bootstrap-toggle.min.js')}}"></script>
<script src="{{asset('assets/admin/js/bootstrap-fileinput.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/admin/js/main.js')}}"></script>
<script src="{{asset('assets/admin/js/pace.min.js')}}"></script>

<script type="text/javascript" src="{{asset('assets/admin/js/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/admin/js/dataTables.bootstrap.min.js')}}"></script>
<script src="{{asset('assets/admin/js/sweetalert.js')}}"></script>

<script src="{{asset('assets/admin/js/nicEdit-latest.js')}}" type="text/javascript"></script>
<script type="text/javascript" src="{{asset('assets/admin/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('assets/admin/js/date-time.js')}}" type="text/javascript"></script>
<script type="text/javascript">
    $('#sampleTable').DataTable();
</script>

@if(request()->path() == 'admin/general/email' || request()->path() == 'admin/knowledge-base/create')
<script>
bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
</script>
@endif

@yield('script')



<script type="text/javascript">
    $(".form_datetime").datetimepicker({
        format: 'yyyy-mm-dd hh:ii',
        minuteStep: 1,
        autoclose: true,
    });
</script>

@if (Session::has('message'))
    <script type="text/javascript">
        $(document).ready(function () {
            swal("{{ Session::get('message') }}","", "success");
        });
    </script>
@endif

@if (Session::has('success'))
    <script type="text/javascript">
        $(document).ready(function () {
            swal("{{ Session::get('success') }}","", "success");
        });
    </script>
@endif

@if (Session::has('alert'))
    <script type="text/javascript">
        $(document).ready(function () {
            swal("{{ Session::get('alert') }}","", "warning");
        });
    </script>
@endif
</body>
</html>
