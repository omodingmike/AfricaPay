@extends(activeTemp().'layouts.frontend')

@section('content')

        <div id="minimal-bootstrap-carousel" class="carousel slide carousel-fade slider-home-one" data-ride="carousel">
            <!-- Wrapper for slides -->
            <div class="carousel-inner" id="home" role="listbox">

                <div class="item active slide-1" style="display: block">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="box valign-bottom" >
                                <div class="content ">
                                    <div class="row pranto-header">
                                        <div class="col-md-6" style="text-align: left;">
                                            <div class="pranto-margin">
                                                <h2 data-animation="animated fadeInUp">{{__($general->banner_title)}}</h2>
                                                <p data-animation="animated fadeInUp" class="tag-line">{{__($general->banner_sub_title)}}</p><!-- /.tag-line -->
                                                @guest
                                                    <div class="row">
                                                        <div class="col-md-6 col-sm-6 col-xs-6 text-center">
                                                            <a  data-animation="animated fadeInDown" href="{{url('login')}}" class="thm-button">@lang('Sign In')</a>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6 col-xs-6 text-center">
                                                            <a  data-animation="animated fadeInDown" href="{{url('register')}}" class="thm-button borderd">@lang('Sign Up')</a>
                                                        </div>
                                                    </div>
                                                @else
                                                    <a data-animation="animated fadeInDown" href="{{url('/home')}}" class="thm-button">@lang('Dashboard')</a>
                                                    <a data-animation="animated fadeInDown" href="{{ route('logout') }}"  onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="thm-button borderd">@lang('Logout')</a>
                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                        {{ csrf_field() }}
                                                    </form>
                                                @endguest
                                            </div>
                                        </div>
                                        <div class="col-md-6 pranto-img-slider">
                                            <img class="pranto-header-image" width="100%" src="{{asset('assets/images/banner.png')}}" alt="">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

        </div>

        <section class="statics-section">
            <div class="thm-container clearfix">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="single-statics">
                            <div class="icon-box">
                                <i class="fa fa-{{$general->static_icon_1}}"></i>
                            </div><!-- /.icon-box -->
                            <div class="text-box">
                                <h2>{{__($general->static_title_1)}}</h2>
                                <span class="counter">{{__($general->static_number_1)}}</span>
                            </div><!-- /.text-box -->
                        </div><!-- /.single-statics -->
                    </div><!-- /.col-md-4 -->
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="single-statics">
                            <div class="icon-box">
                                <i class="fa fa-{{$general->static_icon_2}}"></i>
                            </div><!-- /.icon-box -->
                            <div class="text-box">
                                <h2>{{__($general->static_title_2)}}</h2>
                                <span class="counter">{{__($general->static_number_2)}}</span>
                            </div><!-- /.text-box -->
                        </div><!-- /.single-statics -->
                    </div><!-- /.col-md-4 -->
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="single-statics no-border">
                            <div class="icon-box">
                                <i class="fa fa-{{$general->static_icon_3}}"></i>
                            </div><!-- /.icon-box -->
                            <div class="text-box">
                                <h2>{{__($general->static_title_3)}}</h2>
                                <span class="counter">{{__($general->static_number_3)}}</span>
                            </div><!-- /.text-box -->
                        </div><!-- /.single-statics -->
                    </div><!-- /.col-md-4 -->
                </div><!-- /.row -->
            </div><!-- /.thm-container -->
        </section><!-- /.statics-section -->

        <section class="about-section sec-pad" id="service">
            <div class="thm-container">
                <div class="row">

                    <div class="col-md-12">
                        <div class="title text-center">

                            <h2>{{__($general->service_title)}}</h2>
                            <p>{{__($general->service_sub_title)}}</p>
                        </div><!-- /.title -->
                        <div class="row">
                            @foreach($service as $data)
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="single-about-box hvr-bounce-to-bottom">
                                    <div class="icon-box">
                                        <i class="fa fa-{{$data->icon}}"></i>
                                    </div><!-- /.icon-box -->
                                    <h3>{{__($data->title)}}</h3>
                                    <p>{{__($data->detail)}}</p>

                                </div><!-- /.single-about-box -->
                            </div><!-- /.col-md-6 -->
                            @endforeach
                        </div><!-- /.row -->

                    </div><!-- /.col-md-6 -->
                </div><!-- /.row -->
            </div><!-- /.thm-container -->
        </section><!-- /.about-section -->

        <section class="our-philoshopy tools-section" id="about" style="color: white;">
            <div class="thm-container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pull-left text-center">
                        <div class="philoshopy-content">
                            <h3 style="color: white">{{__($general->about_title)}}</h3>
                            <p>{{ __($general->about_detail) }}</p>
                            <a href="{{url('register')}}" class="learn-more">@lang('Join Now')</a>
                        </div><!-- /.philoshopy-content -->
                    </div><!-- /.col-md-5 -->

                </div><!-- /.row -->
            </div><!-- /.thm-container -->
        </section><!-- /.our-philoshopy -->
        <!-- /.why-choose-us -->

        <section class="pricing-section sec-pad" id="plan">
            <div class="thm-container">
                <div class="sec-title text-center">
                    <h2>{{__($general->plan_title)}}</h2>
                    <p>{{__($general->plan_subtitle)}}</p>
                </div><!-- /.sec-title -->

                <div class="tab-content">
                    <div class="tab-pane fade in active" >
                        <div class="row">
                            @foreach($plan as $data)
                            @php $time_name = \App\TimeSetting::where('time', $data->times)->first(); @endphp
                            <div class="col-md-4 col-sm-6 col-xs-12" style="margin-top: 20px;">
                                <div class="single-pricing hvr-bounce-to-bottom">
                                    <div class="title">
                                        <h3>{{__($data->name)}}</h3>
                                    </div><!-- /.title -->
                                    <div class="percent">
                                        <span>{{__($data->interest)}} @if($data->interest_status == 1) % @else {{__($general->currency)}} @endif</span>
                                        <p>{{$time_name == ''?$data->times.' Hours' : __($time_name->name) }} /  @if($data->lifetime_status == 0) {{__($data->repeat_time)}} @lang('Times') @else @lang('Lifetime') @endif</p>
                                    </div><!-- /.percent -->
                                    <div class="info">
                                        @if($data->fixed_amount == 0)
                                            <p>@lang('Invest Min-Max Amount'): <br> {{__($general->currency_sym)}} {{__($data->minimum)}} - {{__($general->currency_sym)}} {{__($data->maximum)}}</p>
                                        @else
                                            <p>@lang('Fixed Invest Amount'): <br> {{__($general->currency_sym)}} {{__($data->maximum)}}</p>
                                        @endif
                                        @if($data->capital_back_status == 1)
                                            <p> <span class="badge badge-success" style="background: #65d186">@lang('Capital Will Return Back')</span></p>
                                        @elseif($data->capital_back_status == 0)
                                            <p> <span class="badge badge-warning" style="background: #fa9689">@lang('Capital Will Store')</span></p>
                                        @endif
                                        <p>24/7Support</p>
                                    </div><!-- /.info -->
                                    <div class="btn-box">
                                        @guest
                                            <a href="{{url('register')}}" class="sign-up">@lang('Buy Now')</a>
                                        @else
                                            <a href="{{route('user.plan.index')}}" class="sign-up">@lang('Buy Now')</a>
                                        @endguest
                                    </div><!-- /.btn-box -->
                                </div><!-- /.single-pricing -->
                            </div><!-- /.col-md-4 -->
                            @endforeach
                        </div><!-- /.row -->
                    </div>

                </div><!-- /.tab-content -->
            </div><!-- /.thm-container -->
        </section><!-- /.pricing-section -->

        <!-- /.transaction-performance-section -->
        <section class="call-to-action-style-one">
            <div class="thm-container clearfix">
                <div class="title pull-left">
                    <h2>@lang(\App\Referral::count().' Level Referral Commission System')</h2>
                    <p>@lang('It is simple, quick and easy to register.')</p>
                </div><!-- /.title pull-left -->
                <div class="cta-btn-box pull-right">
                    @guest
                        <a href="{{url('register')}}" class="cta-btn">@lang('JOIN Now')</a>
                    @else
                        <a href="{{url('/home')}}" class="cta-btn">@lang('Dashboard')</a>
                    @endguest
                </div><!-- /.cta-btn pull-right -->
            </div><!-- /.thm-container -->
        </section><!-- /.call-to-action -->

        <section class="team-section sec-pad" id="investors">
            <div class="thm-container">
                <div class="sec-title text-center">

                    <h2>{{__($general->team_title)}}</h2>
                    <p>{{__($general->team_sub_title)}}</p>
                </div><!-- /.sec-title -->
                <div class="row">
                    @foreach($team as $data)
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="single-team">
                            <div class="img-box">
                                <img style="width: 100%" src="{{asset('assets/images/team/'.$data->image)}}" alt="Image"/>
                            </div><!-- /.img-box -->
                            <h3>{{__($data->name)}}</h3>
                            <p>{{__($data->designation)}}</p>
                            <div class="social">
                                <a target="_blank" href="{{$data->fb_link}}" class="icofont icofont-social-facebook"></a>
                                <a target="_blank" href="{{$data->tw_link}}" class="icofont icofont-social-twitter"></a>
                                <a target="_blank" href="{{$data->ln_link}}" class="icofont icofont-brand-linkedin"></a>
                            </div>
                        </div><!-- /.single-team -->
                    </div>
                    @endforeach
                </div><!-- /.row -->

            </div><!-- /.thm-container -->
        </section><!-- /.team-section -->

        <section class="process-section sec-pad">
            <div class="thm-container">
                <div class="sec-title text-center">
                    <span>{{__($general->how_it_work_title)}}</span>
                    <h2>{{__($general->how_it_work_sub_title)}}</h2>
                </div><!-- /.sec-title -->
                <div class="row">

                    @foreach($howitwork as $data)
                        <div class="col-md-4 col-sm-6 col-xs-12" style="margin-bottom: 30px;">
                            <div class="single-process text-center">
                                <div class="icon-box">
                                    <i class="fa fa-{{$data->icon}}"></i>
                                </div><!-- /.icon-box -->
                                <h3>{{__($data->title)}}</h3>
                                <p style="color: #fff; margin-top: 10px;">{{__($data->detail)}}</p>
                            </div><!-- /.single-process -->
                        </div><!-- /.col-md-4 -->
                    @endforeach





                </div><!-- /.row -->
            </div><!-- /.thm-container -->
        </section>

        <section class="testimonial-section sec-pad" style="background: aliceblue" id="testimonials">
            <div class="thm-container">
                <div class="sec-title text-center">
                    <h2>{{__($general->test_title)}}</h2>
                    <p>{{__($general->test_sub_title)}}</p>
                </div><!-- /.sec-title -->
                <div class="testimonial-carousel owl-carousel owl-theme">

                    @foreach($test as $data)
                    <div class="item">
                        <div class="single-tesimonial">

                            <div class="text-box">
                                <h3>{{__($data->name)}}</h3>
                                <p>{{__($data->comment)}}</p>
                                <span>{{__($data->company)}}</span>
                            </div><!-- /.text-box -->
                        </div><!-- /.single-tesimonial -->
                    </div><!-- /.item -->
                    @endforeach

                </div><!-- /.testimonial-carousel -->
            </div><!-- /.thm-container -->
        </section><!-- /.testimonial-section -->


        <section class="faq-section" style="background: white" id="faq">
            <div class="thm-container">
                <div class="sec-title text-center">
                    <span>{{__($general->faq_title)}}</span>
                    <h2>{{__($general->faq_sub_title)}}</h2>
                </div><!-- /.sec-title -->
                <div class="accrodion-grp" data-grp-name="faq-accrodion">
                    @foreach($faq as $key => $data)
                    <div class="accrodion ">
                        <div class="accrodion-title">
                            <h4> {{__($data->title)}}</h4>
                        </div>
                        <div class="accrodion-content">
                            <p>{{__($data->description)}}</p>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div><!-- /.thm-container -->
        </section><!-- /.faq-section -->

        <section class="brand-section">
            <div class="thm-container">
                <div class="title text-center">
                    <h2>{{__($general->payment_title)}}</h2>
                </div><!-- /.title -->
                <div class="brand-carousel owl-carousel owl-theme">
                   @foreach($method as $data)
                    <div class="item">
                        <img style="max-width: 200px" src="{{ asset('assets/images/gateway') }}/{{$data->id}}.jpg" alt="Gateway Image"/>
                    </div><!-- /.item -->
                    @endforeach
                </div><!-- /.brand-carousel owl-carousel owl-theme -->
            </div><!-- /.thm-container -->
        </section><!-- /.brand-section -->

        <section class="our-news-letter" >
            <div class="thm-container">
                <div class="inner">
                    <div class="sec-title text-center">
                        <h2>{{__($general->subscriber_title)}}</h2>
                    </div><!-- /.sec-title -->
                    <form class="news-letter mailchimp-form clearfix">
                        @csrf
                        <input type="email" name="subscribe_email" placeholder="@lang('Enter your email...')" />
                        <button type="submit">@lang('Submit')</button>
                    </form>
                    <div class="result"></div><!-- /.result -->
                </div><!-- /.inner -->
            </div><!-- /.thm-container -->
        </section><!-- /.our-news-letter -->

@stop

@section('script')
<script type="text/javascript">
    $('.news-letter').submit(function(e){
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
