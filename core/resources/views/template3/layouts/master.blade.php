
<!DOCTYPE html>
<html lang="zxx">

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0">
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title> {{__($general->sitename)}} {{  '| '.__($pt) }}</title>
<!--Favicon-->
<link rel="shortcut icon" href="{{asset('assets/images/logo/favicon.png')}}" type="image/x-icon">
<!--Bootstrap Stylesheet-->
<link rel="stylesheet" type="text/css" href="{{url('/')}}/assets/front3/css/bootstrap.css">
<!--Owl Carousel Stylesheet-->
<link rel="stylesheet" type="text/css" href="{{url('/')}}/assets/front3/css/owl.carousel.min.css">
<!--Magnific PopUp Stylesheet-->
<link rel="stylesheet" type="text/css" href="{{url('/')}}/assets/front3/css/magnific-popup.css">
<!-- fontawesome icon  -->
<link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/font-awesome.min.css')}}">
<!--Animate Stylesheet-->
<link rel="stylesheet" type="text/css" href="{{url('/')}}/assets/front3/css/icofont.css">

<link rel="stylesheet" type="text/css" href="{{url('/')}}/assets/front3/css/animate.css">
<!--Menu Stylesheet-->
<link rel="stylesheet" type="text/css" href="{{url('/')}}/assets/front3/css/menu.css">
<!--Main Stylesheet-->
<link rel="stylesheet" type="text/css" href="{{url('/')}}/assets/front3/css/style.css">
<!--Responsive Stylesheet-->
<link rel="stylesheet" type="text/css" href="{{url('/')}}/assets/front3/css/responsive.css">

<link rel="stylesheet" href="{{asset('assets/admin/css/sweetalert.css')}}">

<!--Modanizr JS-->
<script src="{{url('/')}}/assets/front3/js/modernizr.custom.js"></script>
    <!--[if IE]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<link rel="stylesheet" href="{{url('/')}}/assets/front3/css/color.php?color={{$general->color}}&color2={{$general->color_two}}">
@yield('style')
</head>

<body>
<!--Start Preloader-->
<div class="site-preloader">
    <div class="spinner">
        <div class="double-bounce1"></div>
        <div class="double-bounce2"></div>
    </div>
</div>
<!--End Preloader-->

<!--Start Body Wrap-->
<div id="body-wrap">
    <!--Start Header-->
    <header class="header">
        <!--Start Header Top-->
        <div class="header-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="header-top-left">
                            <ul>
                                <li><a href="mailto:{{$general->email}}"><i class="fa fa-envelope"></i> {{$general->email}}</a></li>
                                <li><a href="tel:{{$general->phone}}"><i class="fa fa-phone"></i> {{__($general->phone)}}</a></li>
                                <li><select id="langSel">
                                    <option style="color: black" value="en"> English</option>
                                    @foreach($lang as $data)
                                    <option value="{{$data->code}}" @if(Session::get('lang') === $data->code) selected  @endif style="color: black"><img src="{{ asset('assets/images/'.$data->icon)  }}"> {{$data->name}}</option>
                                    @endforeach
                                </select></li>
                            </ul>
                        </div>
                        <div class="header-top-right">
                            <ul>
                                <li class="title">Follow Us:</li>
                                @foreach($social as $key => $data)
                                <li> <a href="{{$data->link}}" target="_blank"><i class="fa fa-{{$data->icon}}"></i></a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!--End Header Top-->

        <!-- Start Navigation -->
        <nav class="navbar navbar-default bootsnav" data-spy="affix" data-offset-top="10">

            <div class="container">
                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                        <i class="icofont icofont-navigation-menu"></i>
                    </button>
                    <a class="navbar-brand" href="{{url('/')}}"><img style="max-width: 160px;" src="{{asset('assets/images/logo/logo.png')}}" class="logo" alt=""></a>
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav navbar-right" data-in="fadeIn">
                        
                        <li><a  href="{{url('/home')}}">@lang('Dashboard')</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">@lang('Investment')</a>
                            <ul class="dropdown-menu">
                                <li><a href="{{route('user.plan.index')}}">@lang('Investment Plans')</a></li>
                                <li><a href="{{route('user.interest.log')}}">@lang('Interest Log')</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">@lang('Deposit')</a>
                            <ul class="dropdown-menu">
                                <li><a href="{{route('user.deposit')}}">@lang('Deposit Now')</a></li>
                                <li><a href="{{route('pin.recharge')}}">@lang('E-Pin Recharge')</a></li>
                                <li><a href="{{route('user.deposit.history')}}">@lang('Deposit History')</a></li>
                            </ul>
                        </li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">@lang('Withdraw')</a>
                            <ul class="dropdown-menu">
                                <li><a href="{{route('user.withdraw')}}">@lang('Withdraw Now')</a></li>
                                <li><a href="{{route('withdraw.history')}}">@lang('Withdraw History')</a></li>
                            </ul>
                        </li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">@lang('Transaction')</a>
                            <ul class="dropdown-menu">
                                <li><a href="{{route('user.balance.transfer')}}">@lang('Balance Transfer')</a></li>
                                <li><a href="{{route('user.transaction')}}">@lang('Transaction History')</a></li>
                                <li><a href="{{route('my.referral.com')}}">@lang('Referral Statistic')</a></li>
                                <li><a href="{{route('user.referral.com')}}">@lang('Referral Commission')</a></li>
                            </ul>
                        </li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"> {{ Auth::user()->name }}</a>
                            <ul class="dropdown-menu">
                                <li><a href="{{route('user.profile')}}">@lang('Profile')</a></li>
                                <li><a href="{{route('support.index.customer')}}">@lang('Support Ticket')</a></li>
                                <li><a href="{{route('two.factor.index')}}">@lang('2Fa Security')</a></li>
                                <li>
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">@lang('Logout')</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
        </nav>
        <!-- End Navigation -->
        <div class="clearfix"></div>
    </header>
    <!--End Header-->


    <div id="app">
        @yield('content')
    </div>

    <!--Start Footer-->
    <footer class="footer">
        <!--Start Container-->
        <div class="container">
            <!--Start Row-->
            <div class="row">
                <!--Start Footer Top-->
                <div class="footer-top">
                    <!--Start About Widget-->
                    <div class="col-md-3 col-sm-6">
                        <div class="footer-about">
                            <a href="{{url('/')}}" class="footer-logo"><img style="max-width: 180px" src="{{asset('assets/images/logo/logo.png')}}" class="img-responsive" alt="Image"></a>
                            <p>{{__($general->footer_text)}}  </p>
                            <div class="footer-social">
                                <h4 class="footer-social-title">@lang('Follow Us')</h4>
                                <ul>
                                    @foreach($social as $key=> $data)
                                    <li><a href="{{$data->link}}"><i class="fa fa-{{$data->icon}}"></i></a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!--End About Widget-->


                    <div class="col-md-3 col-sm-6">
                        <div class="footer-usefull-links">
                            <h3 class="widget-title"> @lang('Terms & Condition')</h3>
                            <div class="widget-body">
                                <ul class="footer-nav">
                                    @foreach($menu as $data)
                                    <li>
                                        <a href="{{route('menu.index.front', ['id'=>$data->id,'any'=> Replace($data->name)])}}"> <i class="icofont icofont-caret-right"></i> {{__($data->name)}}</a>
                                    </li><br>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <div class="footer-usefull-links">
                            <h3 class="widget-title"> @lang('Links')</h3>
                            <div class="widget-body">
                                <ul class="footer-nav">
                                    <li>
                                        <a @if(request()->path() == '/') href="#home" @else href="{{url('/')}}#home" @endif>
                                            <i class="icofont icofont-caret-right"></i>  @lang('Home')
                                        </a>
                                    </li><br>
                                    <li>
                                        <a @if(request()->path() == '/') href="#about" @else href="{{url('/')}}#about"  @endif>
                                            <i class="icofont icofont-caret-right"></i> @lang('About')
                                        </a>
                                    </li><br>
                                    <li>
                                        <a @if(request()->path() == '/') href="#service" @else href="{{url('/')}}#service"  @endif>
                                            <i class="icofont icofont-caret-right"></i>  @lang('Services')
                                        </a>
                                    </li><br>
                                    <li>
                                        <a @if(request()->path() == '/') href="#faq" @else href="{{url('/')}}#faq"  @endif>
                                            <i class="icofont icofont-caret-right"></i> @lang('FAQ')
                                        </a>
                                    </li><br>
                                    <li>
                                        <a href="{{route('contact.front')}}">
                                            <i class="icofont icofont-caret-right"></i> @lang('Contact')
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <div class="footer-usefull-links">
                            <h3 class="widget-title"> @lang('Contact Us')</h3>
                            <div class="widget-body">
                                <ul class="footer-nav">

                                    <li>
                                        <a href="#">
                                            <i class="icofont icofont-location-pin"></i> {{__($general->address)}}
                                        </a>
                                    </li><br>
                                    <li>
                                        <a href="mailto:{{$general->email}}">
                                            <i class="icofont icofont-envelope"></i> {{$general->email}}
                                        </a>
                                    </li><br>
                                    <li>
                                        <a href="tel:{{$general->phone}}">
                                            <i class="icofont icofont-phone"></i> {{__($general->phone)}}
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>


                </div>
                <!--End Footer Top-->
            </div>
            <!--End Row-->
        </div>
        <!--End Container-->

        <!--Start Footer Bottom-->
        <div class="footer-bottom">
            <p class="font-500 text-center color-white">{{__($general->footer)}}</p>
        </div>
        <!--End Footer Bottom-->
    </footer>
    <!--End Footer-->
    <!--Start ClickToTop-->
    <div class="click-top">
        <a href="#top"><i class="icofont icofont-simple-up"></i></a>
    </div>
    <!--End ClickToTop-->
</div>
<!--End Body Wrap-->

<!--jQuery JS-->
<script src="{{url('/')}}/assets/front3/js/jquery.min.js"></script>
<!--Counter JS-->
<script src="{{url('/')}}/assets/front3/js/waypoints.js"></script>

<script src="{{url('/')}}/assets/front3/js/jquery.counterup.min.js"></script>
<!--Bootstrap JS-->
<script src="{{url('/')}}/assets/front3/js/bootstrap.min.js"></script>
<!--Magnic PopUp JS-->
<script src="{{url('/')}}/assets/front3/js/magnific-popup.min.js"></script>
<!--Isotope JS-->
<script src="{{url('/')}}/assets/front3/js/isotope.min.js"></script>
<!--Image Loded JS-->
<script src="{{url('/')}}/assets/front3/js/images-loded.min.js"></script>
<!--Owl Carousel JS-->
<script src="{{url('/')}}/assets/front3/js/owl.carousel.min.js"></script>
<!--Menu JS-->
<script src="{{url('/')}}/assets/front3/js/menu.js"></script>

<script src="{{asset('assets/admin/js/sweetalert.js')}}"></script>
<!--Main-->
<script src="{{url('/')}}/assets/front3/js/custom.js"></script>


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