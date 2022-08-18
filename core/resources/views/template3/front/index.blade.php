@extends(activeTemp().'layouts.frontend')
@section('content')

        <!--Start Slider Area-->
        <section class="home-slider-area" id="home">
            <!--Start Slide Items-->
            <div class="slider owl-carousel ">
                <!--Start Slide Item-->
                <div class="slide-item home-two bg-cover" style="background-image: url({{asset('assets/images/banner.png')}})">
                    <div class="overlay"></div>
                    <div class="slide-content">
                        <div class="container">
                            <div class="col-md-12 text-center">
                                <div class="slider-inner">
                                    <h1 class="title"><span class="colored-text">{{__($general->banner_title)}}</span> </h1>
                                    <p class="color-white centeralign">{{__($general->banner_sub_title)}}</p>
                                    <div class="btn-base">
                                        @guest
                                            <a class="btn1" href="{{url('login')}}">@lang('Sign In')</a>
                                            <a class="btn2" href="{{url('register')}}">@lang('Sign Up')</a>
                                        @else
                                            <a class="btn1" href="{{url('/home')}}">@lang('Dashboard')</a>
                                            <a class="btn2" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">@lang('Logout')</a>
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
                <!--End Slide Item-->

            </div>
            <!--End Slide Items-->
        </section>
        <!--End Slider Area-->


        <!-- how we build area start-->
        <div class="we-build-area home-page-two" >
            <div class="container ">
                <div class="row ">
                    <div class="col-md-12">
                        <div class="we-build-area-2-wrapper">
                            <div class="row">
                                <div class="col-md-4 col-sm-6 ">
                                    <div class="single-how-we-build-2"><!-- single how we build -->
                                        <div class="icon">
                                            <i class="fa fa-{{$general->static_icon_1}}"></i>
                                        </div>
                                        <div class="content">
                                            <h4 class="title">{{__($general->static_number_1)}}</h4>
                                            <p>{{__($general->static_title_1)}} </p>
                                        </div>
                                    </div><!-- //.single how we build -->
                                </div>
                                <div class="col-md-4 col-sm-6 ">
                                    <div class="single-how-we-build-2"><!-- single how we build -->
                                        <div class="icon">
                                            <i class="fa fa-{{$general->static_icon_2}}"></i>
                                        </div>
                                        <div class="content">
                                            <h4 class="title">{{__($general->static_number_2)}}</h4>
                                            <p>{{__($general->static_title_2)}} </p>
                                        </div>
                                    </div><!-- //.single how we build -->
                                </div>
                                <div class="col-md-4 col-sm-6 ">
                                    <div class="single-how-we-build-2"><!-- single how we build -->
                                        <div class="icon">
                                            <i class="fa fa-{{$general->static_icon_3}}"></i>
                                        </div>
                                        <div class="content">
                                            <h4 class="title">{{__($general->static_number_3)}}</h4>
                                            <p>{{__($general->static_title_3)}}</p>

                                        </div>
                                    </div><!-- //.single how we build -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- how we build area end -->

        <div class="we-build-area">
            <div class="container">
                <!--Start Section Heading Row-->
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <!--Start Section Heading-->
                        <div class="section-heading text-center">
                            <h2 class="title">{{__($general->how_it_work_title)}}</h2>
                            <p>{{__($general->how_it_work_sub_title)}}</p>
                        </div>
                        <!--End Section Heading-->
                    </div>
                </div>
                <!--End Section Heading Row-->
                <div class="row">

                        @foreach($howitwork as $data)
                    <div class="col-md-4 col-sm-6" style="margin-bottom: 20px">
                        <div class="single-how-we-build"><!-- single how we build -->
                            <div class="thumb">
                                <div class="icon">
                                    <i class="fa fa-{{$data->icon}}"></i>
                                </div>
                            </div>

                            <div class="content">
                                <h4 class="title">{{__($data->title)}}</h4>
                                <p>{{__($data->detail)}}</p>
                            </div>
                        </div><!-- //.single how we build -->
                    </div>
                        @endforeach


                </div>
            </div>
        </div>

        <!--Start Service Area-->
        <section class="pg-content p-0 gray-bg" id="service">


            <!--Start Service Wrap-->
            <div class="service-area">
                <!--Start Container-->
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <!--Start Section Heading-->
                            <div class="section-heading text-center">
                               
                                <h2 class="title">{{__($general->service_title)}}</h2>
                                <p>{{__($general->service_sub_title)}}</p>
                            </div>
                            <!--End Section Heading-->
                        </div>
                    </div>
                    <!--Start Row-->
                    <div class="row">
                    @foreach($service as $data)
                        <!--Start Service Box Col-->
                        <div class="col-md-4 col-sm-6">
                            <!--Start Service Box-->
                            <div class="single-service-box-2">
                                <div class="icon">
                                    <i class="fa fa-{{$data->icon}}"></i>
                                </div>
                                <div class="content">
                                    <h4 class="title">{{__($data->title)}}</h4>
                                    <p> {{__($data->detail)}} </p>
                                </div>
                            </div>
                            <!--End Service Box-->
                        </div>
                        <!--End Service Box Col-->
                    @endforeach

                    </div>
                    <!--End Row-->
                </div>
                <!--End Container-->
            </div>
            <!--End Service Wrap-->
        </section>
        <!--End Service Area-->

        <!--Start Call To Action-->
        <section class="call-to-action bg-main-color">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="left-content-area">
                            <h2></h2>

                            <h2 class="title">@lang(\App\Referral::count().' Level Referral Commission System')</h2>
                        </div>
                        <div class="right-content-area">
                            <div class="btn-base">
                                <a href="{{url('register')}}" class="boxed-btn">@lang('Join Now')</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End Call To Action-->


        <!--Start Why Choose Area-->
        <section class="why-choose-area" id="about">
            <!--Start Container-->
            <div class="container">
                <!--Start Row-->
                <div class="row">
                    <!--Start Col-7-->
                    <div class="col-md-12">
                        <div class="why-choose-content text-center">
                            
                            <h2 class="title">{{__($general->about_title)}}</h2>
                            <p>{{ __($general->about_detail) }}</p>

                        </div>
                    </div>
                    <!--End Col-7-->

                </div>
                <!--End Row-->
            </div>
            <!--End Container-->
        </section>
        <!--End Why Choose Area-->



        <!--Start Testimonial Area-->
        <section class="testimonial-area gray-bg">
            <!--Start Container-->
            <div class="container">
                <!--Start Section Heading Row-->
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <!--Start Section Heading-->
                        <div class="section-heading text-center extra">
                          
                            <h2 class="title">{{__($general->test_title)}}</h2>
                            <p>{{__($general->test_sub_title)}}</p>
                        </div>
                        <!--End Section Heading-->
                    </div>
                </div>
                <!--End Section Heading Row-->

                <!--Start Row-->
                <div class="row">
                    <!--Start Col-->
                    <div class="col-md-12">
                        <!--Start Testimonial Carousel-->
                        <div class="testimonial owl-carousel">
                        @foreach($test as $data)
                            <!--Start Testimonial Item-->
                            <div class="single-testimonial-item">
                                <div class="content">
                                    <p><span class="icon"><i class="icofont icofont-quote-left"></i></span>  {{__($data->comment)}}</p>
                                    <h4 class="title">{{__($data->name)}}</h4>
                                    <span class="post">{{__($data->company)}}</span>
                                </div>
                            </div>
                            <!--End Testimonial Item-->
                        @endforeach
                        </div>
                        <!--End Testimonial Carousel-->
                    </div>
                    <!--End Col-->
                </div>
                <!--End Row-->
            </div>
            <!--End Container-->
        </section>
        <!--End Testimonial Area-->

        <section class="latest-news-are" style="padding: 120px 0;" id="plan">
            <!--Start Container-->
            <div class="container">
                <!--Start Section Heading Row-->
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <!--Start Section Heading-->
                        <div class="section-heading text-center extra">
                          
                            <h2 class="title">{{__($general->plan_title)}}</h2>
                            <p>{{__($general->plan_subtitle)}}</p>
                        </div>
                        <!--End Section Heading-->
                    </div>
                </div>
                <!--End Section Heading Row-->

                <!--Start Row-->
                <div class="row">

                @foreach($plan as $data)

                    @php $time_name = \App\TimeSetting::where('time', $data->times)->first(); @endphp
                    <!--Start Blog Post-->
                        <div class="col-md-4 col-sm-6" style="margin-top: 60px;">
                            <!--Start div-->
                            <div class="blog-post latest single-blog-post home-two">
                                <div class="content">
                                    <div class="post-meta text-center">
                                        <h2 class="post-title">{{__($data->name)}}</h2>
                                        <h4>{{__($data->interest)}} @if($data->interest_status == 1) % @else {{__($general->currency)}} @endif<br /><span>{{$time_name == ''?$data->times.' Hours' : __($time_name->name) }} /  @if($data->lifetime_status == 0) {{__($data->repeat_time)}} @lang('Times') @else @lang('Lifetime') @endif</span></h4>
                                    </div>
                                    <div class="post-content text-center">
                                        <ul class="list-group text-center">

                                            <li class="list-group-item" style="font-weight: bold">@lang('Features')</li>
                                            @if($data->fixed_amount == 0)
                                                <li class="list-group-item">@lang('Invest Min-Max Amount'): <br> {{__($general->currency_sym)}} {{__($data->minimum)}} - {{__($general->currency_sym)}} {{__($data->maximum)}}</li>
                                            @else
                                                <li class="list-group-item">@lang('Fixed Invest Amount'): <br> {{__($general->currency_sym)}} {{__($data->maximum)}}</li>
                                            @endif
                                            @if($data->capital_back_status == 1)

                                                <li class="list-group-item"> <span class="label label-success">@lang('Capital Will Return Back')</span></li>
                                            @elseif($data->capital_back_status == 0)
                                                <li class="list-group-item"> <span class="label label-warning">@lang('Capital Will Store')</span></li>
                                            @endif
                                            <li class="list-group-item">@lang('24/7Support')</li>
                                        </ul>
                                        @guest
                                            <div class="contact-frm-btn text-center">
                                                <a class="readmore text-right" href="{{url('register')}}">@lang('Buy Now')</a>
                                            </div>

                                        @else
                                            <a class="readmore text-right" href="{{route('user.plan.index')}}">@lang('Buy Now')</a>
                                        @endguest

                                    </div>
                                </div>
                            </div>
                            <!--End div-->
                        </div>
                        <!--End Blog Post-->
                    @endforeach
                </div>
                <!--End Row-->
            </div>
            <!--End Container-->
        </section>


        <!--Start Team-->
        <div class="about-team gray-bg">
            <!--Start Container-->
            <div class="container">
                <!--Start Section Heading Row-->
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <!--Start Section Heading-->
                        <div class="section-heading text-center extra">
                            
                            <h2 class="title">{{__($general->team_title)}}</h2>
                            <p>{{__($general->team_sub_title)}}</p>
                        </div>
                        <!--End Section Heading-->
                    </div>
                </div>
                <!--End Section Heading Row-->

                <!--Start Row-->
                <div class="row">
                @foreach($team as $data)
                    <!--Start Team Member Col-->
                    <div class="col-md-3 col-sm-6">
                        <!--Start Team Member-->
                        <div class="team-member text-center">
                            <div class="img-wrapper">
                                <img src="{{asset('assets/images/team/'.$data->image)}}" class="img-responsive" alt="Team Image">
                                <div class="member-details">
                                    <div class="content">
                                        <div class="member-info">
                                            <h4 class="title">{{__($data->name)}}</h4>
                                            <span class="subtitle">{{__($data->designation)}}</span>
                                        </div>
                                        <div class="team-member-social">
                                            <ul>
                                                <li><a href="{{$data->fb_link}}" target="_blank"><i class="icofont icofont-facebook"></i></a></li>
                                                <li><a href="{{$data->tw_link}}" target="_blank"><i class="icofont icofont-twitter"></i></a></li>
                                                <li><a href="{{$data->ln_link}}" target="_blank"><i class="icofont icofont-linkedin"></i></a></li>

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--End Team Member-->
                    </div>
                    <!--End Team Member Col-->
                    @endforeach
                </div>
                <!--End Row-->
            </div>
            <!--End Container-->
        </div>
        <!--End Team-->


        <!--Start Team-->
        <div class="about-team" style="padding: 110px 0;" id="faq">
            <!--Start Row-->
            <div class="faq-wrap">
                <!--Start container-->
                <div class="container">

                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <!--Start Section Heading-->
                            <div class="section-heading text-center extra">
                              
                                <h2 class="title">{{__($general->faq_title)}}</h2>
                                <p>{{__($general->faq_sub_title)}}</p>
                            </div>
                            <!--End Section Heading-->
                        </div>
                    </div>
                    <!--Start Row-->
                    <div class="row">
                        <div class="col-md-12 ">
                            <!--Start Faq Content-->
                            <div class="faq-content">
                                <div class="row">
                                @foreach($faq as $key => $data)
                                    <!--Start Question-->
                                    <div class="col-sm-6">
                                        <div class="question-single">
                                            <h5 class="title">Q.{{$key+1}}: {{__($data->title)}}</h5>
                                            <p>{{__($data->description)}} </p>
                                        </div>
                                    </div>
                                    <!--End Question-->
                                @endforeach
                            </div>
                            <!--End Faq Content-->
                        </div>
                    </div>
                    <!--End Row-->
                </div>
                <!--End container-->
            </div>
            <!--End Row-->
            <!--End Container-->
        </div>
        <!--End Team-->
        </div>




        <!--Start Partner Area-->
        <div class="partner-area">
            <!--Start Container-->
            <div class="container">
                <!--Start Partner Items-->
                <div class="partner-items owl-carousel">

                        @foreach($method as $data)
                    <div class="single-partner"><!-- single partner -->
                        <a href="#"><img src="{{ asset('assets/images/gateway') }}/{{$data->id}}.jpg" class="img-responsive" alt="Gateway Image"></a>
                    </div><!-- //.single partner -->
                        @endforeach

                </div>
                <!--End Partner Items-->
            </div>
            <!--End Container-->
        </div>
        <!--End Partner Area-->


        <!--Newsletter Section-->
        <div class="newsletter-section section-padding dark--bg">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <h2 class="sub-title cl-white m-0 mb-2">{{__($general->subscriber_title)}}</h2>
                    </div>
                </div>
                <div class="newsletter-area">
                    <form class="newsletter-form">
                        @csrf
                        <input type="text" name="subscribe_email" placeholder="@lang('Enter Your Email')" required>
                        <button type="submit"><i class="fa fa-paper-plane"></i></button>
                    </form>
                </div>
            </div>
        </div>
        <!--Newsletter Section-->


        <!--Start Latest News Area-->
        <section class="latest-news-area bg-aliceblue">
            <!--Start Container-->
            <div class="container">
                <!--Start Section Heading Row-->
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <!--Start Section Heading-->
                        <div class="section-heading text-center extra">
                          
                            <h2 class="title">{{__($general->blog_title)}}</h2>
                            <p>{{__($general->blog_sub_title)}}</p>
                        </div>
                        <!--End Section Heading-->
                    </div>
                </div>
                <!--End Section Heading Row-->

                <!--Start Row-->
                <div class="row">

                    @foreach($know as $data)
                    <!--Start Blog Post-->
                    <div class="col-md-4 col-sm-6">
                        <!--Start div-->
                        <div class="blog-post latest single-blog-post home-two">
                            <div class="post-media">
                                <a href="{{route('blog.detail', ['id'=>$data->id,'any'=> Replace($data->title)])}}">
                                    <img class="img-responsive" src="{{asset('assets/images/blog/'.$data->image)}}" alt="blog image">
                                </a>
                            </div>
                            <div class="content">
                                <div class="post-meta">
                                    <h2 class="post-title">
                                        <a href="{{route('blog.detail', ['id'=>$data->id,'any'=> Replace($data->title)])}}">{{ __($data->title) }}</a>
                                    </h2>
                                    <span><a href="{{route('blog.detail', ['id'=>$data->id,'any'=> Replace($data->title)])}}"><i class="icofont icofont-ui-calendar"></i> {{date('d M, Y', strtotime($data->created_at)) }}</a></span>
                                </div>
                                <div class="post-content">
                                    <p>{!! short_text($data->text, 50) !!}</p>
                                    <a class="readmore" href="{{route('blog.detail', ['id'=>$data->id,'any'=> Replace($data->title)])}}">@lang('Read More')</a>
                                </div>
                            </div>
                        </div>
                        <!--End div-->
                    </div>
                    <!--End Blog Post-->
                    @endforeach
                </div>
                <!--End Row-->
            </div>
            <!--End Container-->
        </section>
        <!--End Latest News Area-->


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