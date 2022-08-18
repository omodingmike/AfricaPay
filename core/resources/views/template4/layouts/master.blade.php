
<!DOCTYPE html>
<html lang="zxx">

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
    <link rel="stylesheet" href="{{url('/')}}/assets/front4/css/bootstrap.min.css">
    <!-- fontawesome icon  -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/font-awesome.min.css')}}">
    <!-- flaticon css -->
    <link rel="stylesheet" href="{{url('/')}}/assets/front4/fonts/flaticon.css">
    <!-- animate.css -->
    <link rel="stylesheet" href="{{url('/')}}/assets/front4/css/animate.css">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="{{url('/')}}/assets/front4/css/owl.carousel.min.css">

    <link rel="stylesheet" href="{{asset('assets/admin/css/sweetalert.css')}}">
    <!-- magnific popup -->
    <link rel="stylesheet" href="{{url('/')}}/assets/front4/css/magnific-popup.css">
    <!-- stylesheet -->
    <link rel="stylesheet" href="{{url('/')}}/assets/front4/css/style.css">
    <!-- responsive -->
    <link rel="stylesheet" href="{{url('/')}}/assets/front4/css/responsive.css">

    <link rel="stylesheet" href="{{url('/')}}/assets/front4/css/color.php?color={{$general->color}}&color2={{$general->color_two}}">
    @yield('style')
</head>

<body>
<!-- preloader begin-->
<div class="sec">
    <div class="loader">
        <div class="circle item0"></div>
        <div class="circle item1"></div>
        <div class="circle item2"></div>
    </div>
</div>
<!-- preloader end -->

<!-- header begin-->
<div class="header">
    <div class="header-top">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-xl-7 col-lg-7">
                    <div class="support-bar-left">
                        <ul>
                            <li><span><i class="fa fa-phone-square"></i></span>{{__($general->phone)}}</li>
                            <li><span><i class="fa fa-envelope"></i></span>{{$general->email}}</li>

                        </ul>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-5">
                    <div class="support-bar-right">
                        <ul>
                            <li>@lang('Server Time'): <span id="time"></span></li>
                            <li><i class="fa fa-language"></i>
                                <select id="langSel">
                                    <option style="color: black" value="en"> English</option>
                                    @foreach($lang as $data)
                                        <option value="{{$data->code}}" @if(Session::get('lang') === $data->code) selected  @endif style="color: black"><img src="{{ asset('assets/images/'.$data->icon)  }}"> {{$data->name}}</option>
                                    @endforeach
                                </select>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-xl-2 col-lg-2 d-xl-flex d-lg-flex d-block align-items-center">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-7 d-xl-block d-lg-block d-flex align-items-center">
                            <div class="logo-img">
                                <a href="{{url('/')}}"> <img style="max-width: 160px;" src="{{asset('assets/images/logo/logo.png')}}" alt="logo image"></a>
                            </div>
                        </div>
                        <div class="d-xl-none d-lg-none d-block col-5">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"
                                    aria-expanded="false" aria-label="Toggle navigation">
                                <i class="fa fa-bars"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-10 d-xl-flex d-lg-flex d-block align-items-center">
                    <div class="mainmenu">
                        <nav class="navbar navbar-expand-lg">

                            <div class="collapse navbar-collapse" id="navbarNav">
                                <ul class="navbar-nav">

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
            </div>
        </div>
    </div>
</div>
<!-- header end -->

<div id="app">
    @yield('content')
</div>

<!-- footer begin-->
<div class="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="about-area">
                        <img src="{{asset('assets/images/logo/logo.png')}}" alt="logo">
                        <p>{{__($general->footer_text)}}</p>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-3">
                    <div class="useful-link">
                        <h3>@lang('Links')</h3>
                        <ul>
                            <li>
                                <a @if(request()->path() == '/') href="#home" @else href="{{url('/')}}#home" @endif>
                                    <span><i class="fa fa-chevron-right"></i></span> @lang('Home')
                                </a>
                            </li>
                            <li>
                                <a @if(request()->path() == '/') href="#about" @else href="{{url('/')}}#about"  @endif>
                                    <span><i class="fa fa-chevron-right"></i></span>  @lang('About')
                                </a>
                            </li>
                            <li>
                                <a @if(request()->path() == '/') href="#service" @else href="{{url('/')}}#service"  @endif>
                                    <span><i class="fa fa-chevron-right"></i></span>  @lang('Services')
                                </a>
                            </li>
                            <li>
                                <a @if(request()->path() == '/') href="#faq" @else href="{{url('/')}}#faq"  @endif>
                                    <span><i class="fa fa-chevron-right"></i></span>  @lang('FAQ')
                                </a>
                            </li>
                            <li>
                                <a href="{{route('contact.front')}}">
                                    <span><i class="fa fa-chevron-right"></i></span> @lang('Contact')
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3">
                    <div class="useful-link">
                        <h3>@lang('Terms & Condition')</h3>
                        <ul>
                            @foreach($menu as $data)
                            <li><a href="{{route('menu.index.front', ['id'=>$data->id,'any'=> Replace($data->name)])}}"><span><i class="fa fa-chevron-right"></i></span>{{__($data->name)}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6">
                    <div class="secure-area">
                        <h3>@lang('Contact Us')</h3>
                        <div class="logo">
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-logo">
                                    <div class="single-logo">
                                        <p style="color:#fff;">
                                            <i class="fa fa-map-marker"></i> {{__($general->address)}}
                                        </p>
                                    </div>
                                </div>

                                <div class="col-xl-12 col-lg-12 col-logo">
                                    <div class="single-logo">
                                        <p>
                                            <a style="color:#fff;" href="mailto:{{$general->email}}">
                                                <i class="fa fa-envelope"></i>  {{$general->email}}
                                            </a>
                                        </p>
                                    </div>
                                </div>

                                <div class="col-xl-12 col-lg-12 col-logo">
                                    <div class="single-logo">
                                        <p>
                                            <a style="color:#fff;" href="tel:{{$general->phone}}">
                                                <i class="fa fa-phone"></i> {{__($general->phone)}}
                                            </a>
                                        </p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 d-xl-flex d-lg-flex align-items-center">
                    <div class="copyright">
                        <p>{{__($general->footer)}}</p>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="social">
                        @foreach($social as $key=> $data)
                        <a href="{{$data->link}}"><i class="fa fa-{{$data->icon}}"></i></a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- footer end -->

<!-- jquery -->
<script src="{{url('/')}}/assets/front4/js/jquery-3.3.1.min.js"></script>

<script src="{{url('/')}}/assets/front4/js/jquery-migrate-3.0.1.js"></script>
<!-- bootstrap -->
<script src="{{url('/')}}/assets/front4/js/bootstrap.min.js"></script>
<!-- owl carousel -->
<script src="{{url('/')}}/assets/front4/js/owl.carousel.js"></script>
<!-- magnific popup -->
<script src="{{url('/')}}/assets/front4/js/jquery.magnific-popup.js"></script>
<!-- counter up js -->
<script src="{{url('/')}}/assets/front4/js/jquery.counterup.min.js"></script>
<!-- way poin js-->
<script src="{{url('/')}}/assets/front4/js/waypoints.min.js"></script>
<!-- wow js-->
<script src="{{url('/')}}/assets/front4/js/wow.min.js"></script>
<!-- main -->
<script src="{{url('/')}}/assets/front4/js/main.js"></script>

<script src="{{asset('assets/admin/js/sweetalert.js')}}"></script>

<script>
    function checkTime(i) {
        if (i < 10) {
            i = "0" + i;
        }
        return i;
    }

    function startTime() {
        var today = new Date();
        var h = today.getHours();
        var m = today.getMinutes();
        var s = today.getSeconds();
        // add a zero in front of numbers<10
        m = checkTime(m);
        s = checkTime(s);
        document.getElementById('time').innerHTML = h + ":" + m + ":" + s;
        t = setTimeout(function() {
            startTime()
        }, 500);
    }
    startTime();
</script>
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
