<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> {{__($general->sitename)}} {{  '| '.__($pt) }} </title>
    <!-- favicon -->
    <link rel="shortcut icon" href="{{asset('assets/images/logo/favicon.png')}}" type="image/x-icon">
    <!-- bootstrap -->
    <link rel="stylesheet" href="{{url('/')}}/assets/front/css/bootstrap.min.css">
    <!-- fontawesome icon  -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/font-awesome.min.css')}}">
    <!-- flaticon css -->
    <link rel="stylesheet" href="{{url('/')}}/assets/front/fonts/flaticon.css">
    <!-- animate.css -->
    <link rel="stylesheet" href="{{url('/')}}/assets/front/css/animate.css">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="{{url('/')}}/assets/front/css/owl.carousel.min.css">
    <!-- magnific popup -->
    <link rel="stylesheet" href="{{url('/')}}/assets/front/css/magnific-popup.css">

    <link rel="stylesheet" href="{{asset('assets/admin/css/sweetalert.css')}}">
    <!-- stylesheet -->
    <link rel="stylesheet" href="{{url('/')}}/assets/front/css/style.css">
    <!-- responsive -->
    <link rel="stylesheet" href="{{url('/')}}/assets/front/css/responsive.css">

    <link rel="stylesheet" href="{{url('/')}}/assets/front/css/color.php?color={{$general->color}}&color2={{$general->color_two}}">

    @yield('style')
</head>
<body>
<!-- preloader begin-->
<div class="preloader">
    <div class='loader'>
        <div class='loader--dot'></div>
        <div class='loader--dot'></div>
        <div class='loader--dot'></div>
        <div class='loader--dot'></div>
        <div class='loader--dot'></div>
        <div class='loader--dot'></div>
        <div class='loader--text'></div>
    </div>
</div>

<!-- preloader end -->

<!-- header begin-->
<header class="header">
    <div class="header-top">
        <div class="container">
            <div class="row justify-content-between d-flex">
                <div class="col-xl-6 col-lg-6 d-flex align-items-center">
                    <div class="support-bar">
                        <ul>
                            <li><span class="icon"><i class="fa fa-envelope"></i></span>{{$general->email}}</li>
                            <li><span class="icon"><i class="fa fa-phone"></i></span>{{__($general->phone)}}</li>

                            <li><span class="icon"><i class="fa fa-language"></i></span>
                                <select id="langSel">
                                    <option style="color: black" value="en"> @lang('English')</option>
                                    @foreach($lang as $data)
                                        <option value="{{$data->code}}" @if(Session::get('lang') === $data->code) selected  @endif style="color: black"> {{__($data->name)}}</option>
                                    @endforeach
                                </select>
                                <i class="fa fa-angle-down"></i>
                            </li>
                        </ul>

                    </div>
                </div>
                <div class="col-xl-2 col-lg-2">
                    <div class="social">

                        @foreach($social as $key => $data)
                        <a href="{{$data->link}}" style="background-color: rgba(255, 255, 255, 0.8);" target="_blank"><i style="color: #{{$general->color}}" class="fa fa-{{$data->icon}}"></i></a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom">
        <div class="container">
            <div class="row d-flex">
                <div class="col-xl-2 col-lg-2 col-12 d-block d-xl-flex d-lg-flex align-items-center">
                    <div class="mobile-special">
                        <div class="row d-flex">
                            <div class="col-6 col-xl-12 col-lg-12 d-flex align-items-center">
                                <div class="logo">
                                    <a href="{{url('/')}}">
                                        <img style="max-width: 160px;" src="{{asset('assets/images/logo/logo.png')}}" alt="logo image">
                                    </a>
                                </div>
                            </div>
                            <div class="col-6 d-block d-xl-none d-lg-none">
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"><i class="fa fa-bars"></i></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div @guest class="col-xl-8 col-lg-8" @else class="col-xl-10 col-lg-10" @endif>
                    <div class="mainmenu">
                        <nav class="navbar navbar-expand-lg">

                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul id="navbar-nav" class="navbar-nav mr-auto justify-content-center">
                                    

                                    <li class="nav-item active">
                                        <a class="nav-link" href="{{url('/home')}}">@lang('Dashboard') </a>
                                    </li>


                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                                           aria-expanded="false">
                                            @lang('Investment')
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{route('user.plan.index')}}">@lang('Investment Plans')</a>
                                            <a class="dropdown-item" href="{{route('user.interest.log')}} ">@lang('Return Interest Log')</a>
                                        </div>
                                    </li>

                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                                           aria-expanded="false">
                                            @lang('Deposit')
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{route('user.deposit')}}">@lang('Deposit Now')</a>
                                            <a class="dropdown-item" href="{{route('pin.recharge')}} ">@lang('E-Pin Recharge')</a>
                                            <a class="dropdown-item" href="{{route('user.deposit.history')}} ">@lang('Deposit History')</a>
                                        </div>
                                    </li>

                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                                           aria-expanded="false">
                                            @lang('Withdraw')
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{route('user.withdraw')}}">@lang('Withdraw Now')</a>
                                            <a class="dropdown-item" href="{{route('withdraw.history')}}">@lang('Withdraw History')</a>
                                        </div>
                                    </li>


                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                                           aria-expanded="false">
                                            @lang('Transaction')
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{route('user.balance.transfer')}}">@lang('Balance Transfer')</a>
                                            <a class="dropdown-item" href="{{route('user.transaction')}}">@lang('Transaction History')</a>
                                            <a class="dropdown-item" href="{{route('my.referral.com')}}">@lang('Referral Statistic')</a>
                                            <a class="dropdown-item" href="{{route('user.referral.com')}}">@lang('Referral Commission')</a>
                                        </div>
                                    </li>


                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                                           aria-expanded="false">
                                             {{ Auth::user()->name }}
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{route('user.profile')}}">@lang('Profile')</a>
                                            <a class="dropdown-item" href="{{route('support.index.customer')}}">@lang('Support Ticket')</a>
                                            <a class="dropdown-item" href="{{route('two.factor.index')}}">@lang('2Fa Security')</a>
                                            <a href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();" class="dropdown-item">@lang('Logout')
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </div>
                                    </li>


                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
                @guest
                <div class="col-xl-2 col-lg-2 d-flex align-items-center">
                    <div class="join-us">
                        <a href="{{url('login')}}">@lang('Sign In')</a>
                    </div>

                    &nbsp;
                    &nbsp;
                    &nbsp;
                    &nbsp;

                    <div class="join-us">
                        <a href="{{url('register')}}">@lang('Sign Up')</a>
                    </div>
                </div>


                @endguest

            </div>
        </div>
    </div>
</header>
<!-- header end -->

<div id="app">
    @yield('content')
</div>

<!-- footer begin -->
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-xl-5 col-lg-5 col-md-6">
                <div class="box">
                    <div class="logo">
                        <a href="{{url('/')}}">
                            <img style="max-width: 180px" src="{{asset('assets/images/logo/logo.png')}}" alt="">
                        </a>
                    </div>
                    <p>{{__($general->footer_text)}}</p>
                    <div class="social_links">
                        <ul>
                            @foreach($social as $key=> $data)
                                <li><a href="{{$data->link}}" style="background-color: rgba(255, 255, 255, 0.8);"><i style="color: #{{$general->color}}" class="fa fa-{{$data->icon}}"></i></a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-lg-2 col-md-6">
                <div class="box box2">
                    <h2>
                        @lang('Links')
                    </h2>
                    <ul>

                        <li>
                            <a @if(request()->path() == '/') href="#home" @else href="{{url('/')}}#home" @endif>
                                @lang('Home')
                            </a>
                        </li>
                        <li>
                            <a @if(request()->path() == '/') href="#about" @else href="{{url('/')}}#about"  @endif>
                                @lang('About')
                            </a>
                        </li>
                        <li>
                            <a @if(request()->path() == '/') href="#service" @else href="{{url('/')}}#service"  @endif>
                                @lang('Services')
                            </a>
                        </li>
                        <li>
                            <a @if(request()->path() == '/') href="#faq" @else href="{{url('/')}}#faq"  @endif>
                                @lang('FAQ')
                            </a>
                        </li>
                        <li>
                            <a href="{{route('contact.front')}}">
                                @lang('Contact')
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
            <div class="col-xl-2 col-lg-2 col-md-6">
                <div class="box box3">
                    <h2>
                        @lang('Terms & Condition')
                    </h2>
                    <ul>
                        @foreach($menu as $data)
                            <li>
                                <a href="{{route('menu.index.front', ['id'=>$data->id,'any'=> Replace($data->name)])}}">  {{__($data->name)}}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6">
                <div class="box box4">
                    <h2>
                        @lang('Contact Us')
                    </h2>
                    <p>
                        {{__($general->address)}}
                    </p>
                    <a href="mailto:{{$general->email}}">
                        {{$general->email}}
                    </a>
                    <a href="tel:{{$general->phone}}">
                        {{__($general->phone)}}
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright">
        <p class="text-center">
            {{__($general->footer)}}
        </p>
    </div>
</footer>
<!-- footer end -->

<!-- scroll top button begin -->
<div class="scroll-to-top">
    <a><i class="fa fa-long-arrow-up"></i></a>
</div>
<!-- scroll top button end -->

<!-- jquery -->
<script src="{{url('/')}}/assets/front/js/jquery.js"></script>
<!-- bootstrap -->
<script src="{{url('/')}}/assets/front/js/bootstrap.min.js"></script>
<!-- owl carousel -->
<script src="{{url('/')}}/assets/front/js/owl.carousel.js"></script>
<!-- magnific popup -->
<script src="{{url('/')}}/assets/front/js/jquery.magnific-popup.js"></script>
<!-- way poin js-->
<script src="{{url('/')}}/assets/front/js/waypoints.min.js"></script>
<!-- wow js-->
<script src="{{url('/')}}/assets/front/js/wow.min.js"></script>

<script src="{{asset('assets/admin/js/sweetalert.js')}}"></script>
<!-- main -->
<script src="{{url('/')}}/assets/front/js/main.js"></script>

<script>
    $(document).on('change', '#langSel', function () {
        var code = $(this).val();
        window.location.href = "{{url('/')}}/change-lang/"+code ;
    });
</script>
@yield('script')
<script>
    window.Laravel = {!! json_encode([
        'csrfToken' => csrf_token(),
    ]) !!};
</script>
<script>
    $(document).ready(function(){
        var winheight = $(window).height() -150;
        $('#justify-height').css('min-height',winheight+'px');
    });
</script>
@if (Session::has('message'))
    <script type="text/javascript">
        $(document).ready(function () {
            swal("{{ __(Session::get('message')) }}","", "success");
        });
    </script>
@endif
@if (Session::has('success'))
    <script type="text/javascript">
        $(document).ready(function () {
            swal("{{ __(Session::get('success')) }}","", "success");
        });
    </script>
@endif
@if (Session::has('alert'))
    <script type="text/javascript">
        $(document).ready(function () {
            swal("{{ __(Session::get('alert')) }}","", "warning");
        });
    </script>
@endif
</body>
</html>