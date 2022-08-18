@extends(activeTemp().'layouts.frontend')

@section('content')

        <!-- banner begin-->
        <div class="banner" id="home" style="background-image: url({{asset('assets/images/banner.png')}})">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-10 col-lg-10">
                        <div class="banner-content">
                            <h1>{{__($general->banner_title)}}</h1>
                            <p>{{__($general->banner_sub_title)}}</p>
                            <div class="content-button">
                                @guest
                                    <a  href="{{url('login')}}">@lang('Sign In')</a>
                                    <a  href="{{url('register')}}">@lang('Sign Up')</a>
                                @else
                                    <a  href="{{url('/home')}}">@lang('Dashboard')</a>
                                    <a  href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">@lang('Logout')</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                @endguest
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- banner end -->

        <!-- how it works begin-->
        <div class="how-it-works">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-lg-8">
                        <div class="section-title">
                            <h2>{{__($general->how_it_work_title)}}</h2>
                            <p>{{__($general->how_it_work_sub_title)}}</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach($howitwork as $data)
                    <div class="col-xl-4 col-lg-4 col-md-6" style="margin-bottom: 30px;">
                        <div class="single-works">
                            <div class="part-icon">
                                <i class="fa fa-{{$data->icon}}"></i>
                            </div>
                            <div class="part-text">
                                <h3>{{__($data->title)}}</h3>
                                <p>{{__($data->detail)}}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
        <!-- how it works end -->

        <!-- about begin-->
        <div class="about" id="about" style="background: url({{asset('assets/images/about.jpg')}})">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-10 col-lg-10">
                        <div class="about-content">
                            <div class="part-text">
                                <h3>{{__($general->about_title)}}</h3>
                                <p>{{ __($general->about_detail) }}</p>
                            </div>
                            <div class="part-play-video">
                                <div class="play-video">
                                    <a class="play-button venobox mfp-iframe" href="{{$general->video_url}}"><i class="fa fa-play"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- about begin -->

        <!-- feature begin-->
        <div class="feature" id="service">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-lg-8">
                        <div class="section-title">
                            <h2>{{__($general->service_title)}}</h2>
                            <p>{{__($general->service_sub_title)}}</p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    @foreach($service as $data)
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="single-feature">
                            <div class="part-icon">
                                <i class="fa fa-{{$data->icon}}"></i>
                            </div>
                            <div class="part-text">
                                <h3>{{__($data->title)}}</h3>
                                <p>{{__($data->detail)}}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- feature end -->

        <!-- plan begin-->
        <div class="plan" id="plan">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-lg-8">
                        <div class="section-title">
                            <h2>{{__($general->plan_title)}}</h2>
                            <p>{{__($general->plan_subtitle)}}</p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    @foreach($plan as $data)
                        @php $time_name = \App\TimeSetting::where('time', $data->times)->first(); @endphp
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="single-plan">
                            <h3>{{__($data->name)}}</h3>
                            <div class="part-parcent">
                                <h4>{{__($data->interest)}} @if($data->interest_status == 1) % @else {{__($general->currency)}} @endif</h4>
                                <span class="parcent-info">{{$time_name == ''?$data->times.' Hours' : __($time_name->name) }} / @if($data->lifetime_status == 0) {{__($data->repeat_time)}} @lang('Times') @else @lang('Lifetime') @endif</span>
                            </div>
                            <div class="part-feature">

                                @if($data->fixed_amount == 0)
                                <div class="single-plan-feature">
                                    <span class="small-text">@lang('Invest Min-Max Amount')</span>
                                    <span class="large-text">{{__($general->currency_sym)}} {{__($data->minimum)}} - {{__($general->currency_sym)}} {{__($data->maximum)}}</span>
                                </div>
                                @else
                                <div class="single-plan-feature">
                                    <span class="small-text">@lang('Fixed Invest Amount')</span>
                                    <span class="large-text">{{__($general->currency_sym)}} {{__($data->maximum)}}</span>
                                </div>
                                @endif
                                @if($data->capital_back_status == 1)
                                    <div class="single-plan-feature">
                                        <span class="small-text"><span class="badge badge-success" style="display: initial">@lang('Capital Will Return Back')</span></span>
                                    </div>
                                @elseif($data->capital_back_status == 0)
                                    <div class="single-plan-feature">
                                        <span class="small-text"><span class="badge badge-warning" style="display: initial">@lang('Capital Will Store')</span></span>
                                    </div>
                                @endif
                                <div class="single-plan-feature">
                                    <span class="large-text">@lang('24/7 Support')</span>
                                </div>
                            </div>
                            <div class="part-button">
                                @guest
                                <a href="{{url('register')}}">@lang('Buy Now')</a>
                                @else
                                    <a href="{{route('user.plan.index')}}">@lang('Buy Now')</a>
                                @endguest
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
        <!-- plan end -->

        <!-- referral begin-->
        <div class="referral">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-lg-10">
                        <div class="section-title">
                            <h2 class="add-space">{{__($general->referral_title)}}</h2>
                            <p>{{__($general->referral_sub_title)}}</p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    @foreach($level as $key => $data)
                    <div class="col-xl-2 col-lg-2 col-md-2" style="margin-bottom: 30px">
                        <div class="left-side">
                            <div class="single-level">
                                <div class="part-parcent">
                                    <span class="level-no">LEVEL {{$key+1}}</span>
                                    <h4>{{$data->percent}}%</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- referral end -->

        <!-- counter begin-->
        <div class="counter" style="background: url({{asset('assets/images/footer.jpg')}})">
            <div class="container">
                <div class="row">

                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="single-counter">
                            <div class="part-icon">
                                <i class="fa fa-{{$general->static_icon_1}}"></i>
                            </div>
                            <div class="part-text">
                                <h3 class="count-up">{{__($general->static_number_1)}}</h3>
                                <span class="count-name">{{__($general->static_title_1)}}</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="single-counter">
                            <div class="part-icon">
                                <i class="fa fa-{{$general->static_icon_2}}"></i>
                            </div>
                            <div class="part-text">
                                <h3 class="count-up">{{__($general->static_number_2)}}</h3>
                                <span class="count-name">{{__($general->static_title_2)}}</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="single-counter">
                            <div class="part-icon">
                                <i class="fa fa-{{$general->static_icon_3}}"></i>
                            </div>
                            <div class="part-text">
                                <h3 class="count-up">{{__($general->static_number_3)}}</h3>
                                <span class="count-name">{{__($general->static_title_3)}}</span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- counter end -->

        <!-- inventor begin-->
        <div class="inventor">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-lg-8">
                        <div class="section-title">
                            <h2 class="add-space">{{__($general->team_title)}}</h2>
                            <p>{{__($general->team_sub_title)}}</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach($team as $data)
                    <div class="col-xl-3 col-lg-3 col-md-6">
                        <div class="single-inventor">
                            <div class="part-img">
                                <img src="{{asset('assets/images/team/'.$data->image)}}" alt="Team Image">
                            </div>
                            <div class="part-text">
                                <span class="name">{{__($data->name)}}</span>
                                <span class="number">{{__($data->designation)}}</span>

                                <div class="team-member-social">
                                    <ul>
                                        <li><a href="{{$data->fb_link}}" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="{{$data->tw_link}}" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="{{$data->ln_link}}" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                                    </ul>
                                </div>
                            </div>


                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- inventor end -->

        <!-- transaction begin-->
        <div class="transaction">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-lg-8">
                        <div class="section-title">
                            <h2>{{__($general->transaction_title)}}</h2>
                            <p>{{__($general->transaction_sub_title )}}</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-6 col-lg-6">
                        <div class="single-transaction">
                            <div class="table-title">
                                <h3>@lang('Latest Deposits')</h3>
                            </div>
                            <div class="parent-table">
                                <table class="table">
                                    <tbody>
                                    @foreach($latest_deposit as $data)
                                    <tr>
                                        <td>{{ '@'.$data->user->username}}</td>
                                        <td>{{$general->currency_sym}}{{$data->amount}}</td>
                                        <td>{{__($data->gateway->name)}}</td>
                                    </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6 col-lg-6">
                        <div class="single-transaction second">
                            <div class="table-title">
                                <h3>@lang('Latest Withdraw')</h3>
                            </div>
                            <div class="parent-table">
                                <table class="table">
                                    <tbody>
                                    @foreach($latest_withdaw as $data)
                                        <tr>
                                            <td>{{ '@'.$data->user->username}}</td>
                                            <td>{{$general->currency_sym}}{{$data->amount}}</td>
                                            <td>{{__($data->withdraw_method->name)}}</td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- transaction end -->

        <!-- testimonial begin-->
        <div class="testimonial">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-lg-8">
                        <div class="section-title">
                            <h2 class="add-space">{{__($general->test_title)}}</h2>
                            <p>{{__($general->test_sub_title)}}</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12 col-lg-12">
                        <div class="testimonial-slider">

                            @foreach($test as $data)
                            <div class="single-testimonial">
                                <div class="testimonial-top">
                                    <div class="part-icon">
                                        <i class="fa fa-quote-left"></i>
                                    </div>
                                    <div class="part-text">
                                        <p>{{__($data->comment)}}</p>
                                    </div>

                                    <div class="part-details">
                                        <br>
                                        <hr>
                                        <div class="user-data">
                                            <span class="name">{{__($data->name)}}</span>
                                            <span class="profession">{{__($data->company)}}</span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- testimonial end -->

        <!-- faq begin-->
        <div class="faq" id="faq">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-10 col-lg-10">
                        <div class="section-title">
                            <h2 class="add-space">{{__($general->faq_title)}}</h2>
                            <p>{{__($general->faq_sub_title)}}</p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-12 col-lg-12">
                        <div class="accordion" id="accordionExample">
                            <div class="row">
                                @foreach($faq as $key => $data)
                                <div class="col-xl-6 col-lg-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseOne{{$data->id}}" aria-expanded="false" aria-controls="collapseOne">
                                                    <p class="pranto-break">{{__($data->title)}}</p>
                                                </button>
                                            </h5>
                                        </div>

                                        <div id="collapseOne{{$data->id}}" class="collapse" data-parent="#accordionExample">
                                            <div class="card-body">
                                                {{__($data->description)}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- faq end -->


        <!--Newsletter Section-->
        <div class="newsletter-section pt-80 pb-80 dark--bg">
            <div class="container">
                <div class="row justify-content-center text-center">
                    <div class="col-md-8">
                        <h2 class="sub-title cl-white m-0 mb-3">{{__($general->subscriber_title)}}</h2>
                    </div>
                </div>
                <div class="newsletter-area">
                    <form class="newsletter-form">
                        <input type="text" name="subscribe_email" placeholder="Enter Your Email" required>
                        <button type="submit"><i class="fa fa-paper-plane"></i></button>
                    </form>
                </div>
            </div>
        </div>
        <!--Newsletter Section-->


        <!-- payment begin-->
        <div class="payment">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-lg-8">
                        <div class="section-title">
                            <h2 class="add-space">{{__($general->payment_title)}}</h2>
                            <p>{{__($general->payment_sub_title)}}</p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    @foreach($method as $data)
                    <div class="col-xl-2 col-lg-2 col-md-2">
                        <div class="single-payment">
                            <img src="{{ asset('assets/images/gateway') }}/{{$data->id}}.jpg" alt="{{$data->name}}">
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- payment end -->

@stop
@section('script')
<script type="text/javascript">
    $('.newsletter-form').submit(function(e){
        e.preventDefault();
        data = $(this).serialize();
        $.post('{{route('subscriber.store')}}', data, function(response){
            if (response.success == true){
                swal(response.message,"", "success");
                app.newdata.subscribe_email = '';
            }else {
                swal(response.message,"", "warning");
            }
        });
    });
</script>
@stop