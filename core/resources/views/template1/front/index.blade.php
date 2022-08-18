<?php
Artisan::call('config:cache');
Artisan::call('route:cache');
Artisan::call('view:cache');
?>
@extends(activeTemp().'layouts.frontend')
@section('content')
    <!-- banner begin-->
    <div id="home" class="banner">
        <div class="banner-content">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-xl-6 col-lg-9 d-flex align-items-center">
                        <div class="part-text">
                            <h1>{{__($general->banner_title)}}</h1>
                            <p>{{__($general->banner_sub_title)}}</p>

                            @guest
                                <div class="row ">
                                    <div class="col-md-6 text-center">
                                        <a href="{{url('login')}}">@lang('Sign In')</a>
                                    </div>
                                    <div class="col-md-6 text-center">
                                        <a href="{{url('register')}}">@lang('Sign Up')</a>
                                    </div>
                                </div>

                            @else
                                <a href="{{url('/home')}}">@lang('Dashboard')</a>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();document.getElementById('logout-form').submit();">@lang('Logout')</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            @endguest

                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 ">
                        <div class="part-img">
                            <img src="{{asset('assets/images/banner.png')}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- banner end -->
    <!-- counter begin-->
    <div class="counter">
        <div class="container">
            <div class="row d-flex">
                <div class="col-xl-4 col-lg-4 col-md-6 d-flex align-items-center">
                    <div class="single-counter">
                        <div class="part-icon">
                            <i class="fa fa-{{$general->static_icon_1}}"></i>
                        </div>
                        <div class="part-text">
                            <h3>{{__($general->static_number_1)}}</h3>
                            <h4>{{__($general->static_title_1)}}</h4>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="single-counter">
                        <div class="part-icon">
                            <i class="fa fa-{{$general->static_icon_2}}"></i>
                        </div>
                        <div class="part-text">
                            <h3>{{__($general->static_number_2)}}</h3>
                            <h4>{{__($general->static_title_2)}}</h4>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-6 d-flex align-items-center">
                    <div class="single-counter">
                        <div class="part-icon">
                            <i class="fa fa-{{$general->static_icon_3}}"></i>
                        </div>
                        <div class="part-text">
                            <h3>{{__($general->static_number_3)}}</h3>
                            <h4>{{__($general->static_title_3)}}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- counter end -->
    <!-- about begin -->
    <div id="service" class="about">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-8">
                    <div class="section-title">
                        <h2>Referral commission</h2>
                        <p>When you refer someone to us, you get a commission of <span style="color: #0F86AD;font-weight: bold">8%</span>
                            referral
                            commission,
                            and when that person refers someone else you get <span style="color: #0F86AD;font-weight: bold">3%</span>
                            referral commission.
                            and when that person also refers someone you again get <span style="color: #0F86AD;font-weight:
                            bold">2%</span> referral commission.
                        </p>
                        <?php

                        ?>
                    </div>
                </div>
            </div>
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
                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <div class="single-about">
                            <div class="heading">
                                <div class="part-icon">
                                    <i class="fa fa-{{$data->icon}}"></i>
                                </div>
                                <div class="part-text">
                                    <h3>{{__($data->title)}}</h3>
                                </div>
                            </div>
                            <p>{{__($data->detail)}}</p>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- about end -->
    <!-- we think global begin-->
    <div id="about" class="we-think-global">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-xl-12 col-lg-12 col-md-12 text-center">
                    <div class="part-left">
                        <h2>{{__($general->about_title)}}</h2>
                        <p>{{ __($general->about_detail) }}</p>
                        <a href="{{url('register')}}">@lang('Join Now')</a>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <!-- we think global end -->

    <!-- choosing resons begin-->
    <div class="choosing-reason">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-8">
                    <div class="section-title">
                        <h2>{{__($general->test_title)}}</h2>
                        <p>{{__($general->test_sub_title)}}</p>
                    </div>
                </div>
            </div>

            <div class="row">
                @foreach($test as $data)
                    <div class="col-xl-4 col-lg-4 col-md-6 text-center">
                        <div class="single-reason">

                            <div class="part-text">
                                <h3 style="margin-bottom: 0;">{{__($data->name)}}</h3>
                                <small>{{__($data->company)}}</small>
                                <br>
                                <br>
                                <p>{{__($data->comment)}}</p>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- choosing resons end -->

    <div class="choosing-reason" style="background: aliceblue">
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
                        <div class="single-reason">
                            <div class="part-img text-center">
                                <i style="font-size:35px" class="fa fa-{{$data->icon}}"></i>
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


    <div class="transaction">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-8">
                    <div class="section-title text-center">
                        <h2>{{__($general->transaction_title)}}</h2>
                        <p style="color: #575f84">{{__($general->transaction_sub_title )}}</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="transaction-area">

                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="deposit" role="tabpanel" aria-labelledby="home-tab">

                                <div class="row">
                                    <div class="col-md-6">
                                        <h2 class="text-center">@lang('Latest Deposits')</h2>
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th scope="col">@lang('Transaction Id')</th>
                                                <th scope="col">@lang('Name')</th>
                                                <th scope="col">@lang('Amount')</th>
                                                <th scope="col">@lang('Currency')</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            @foreach($latest_deposit as $data)
                                                <tr>
                                                    <td>{{__($data->trx)}}</td>
                                                    <td>{{$data->user->name}}</td>
                                                    <td>{{$general->currency_sym}}{{$data->amount}}</td>
                                                    <td>{{__($data->gateway->name)}}</td>
                                                </tr>
                                            @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-md-6">
                                        <h2 class="text-center">@lang('Latest Withdraw')</h2>
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th scope="col">@lang('Transaction Id')</th>
                                                <th scope="col">@lang('Name')</th>
                                                <th scope="col">@lang('Amount')</th>
                                                <th scope="col">@lang('Currency')</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            @foreach($latest_withdaw as $data)
                                                <tr>
                                                    <td>{{$data->withdraw_id}}</td>
                                                    <td>{{ $data->user->name}}</td>
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
            </div>
        </div>
    </div>

    <!-- price begin-->
    <div id="plan" style="background: aliceblue" class="price">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-6">
                    <div class="section-title text-center">
                        <h2>{{__($general->plan_title)}}</h2>
                        <p>{{__($general->plan_subtitle)}}</p>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-xl-12 col-lg-12">

                    <div class="tab-content" id="myTabContent2">

                        <div class="tab-pane fade show active" id="monthly" role="tabpanel" aria-labelledby="monthly-tab">
                            <div class="row">

                                @foreach($plan as $data)
                                    @php $time_name = \App\TimeSetting::where('time', $data->times)->first(); @endphp
                                    <div class="col-xl-4 col-lg-4 col-md-6 mb-5">
                                        <div class="single-price">
                                            <div class="part-top">
                                                <h3>{{__($data->name)}}</h3>
                                                <h4>{{__($data->interest)}} @if($data->interest_status == 1)
                                                        %
                                                    @else
                                                        {{__($general->currency)}}
                                                    @endif<br/><span>{{$time_name == ''?$data->times.' Hours' : __($time_name->name) }} /  @if($data->lifetime_status == 0)
                                                            {{__($data->repeat_time)}} @lang('Times')
                                                        @else
                                                            @lang('Lifetime')
                                                        @endif</span></h4>
                                            </div>


                                            <div class="part-bottom">
                                                <ul>

                                                    <li>@lang('Features')</li>
                                                    @if($data->fixed_amount == 0)
                                                        <li>@lang('Invest Min-Max Amount'):
                                                            <br> {{__($general->currency_sym)}} {{__($data->minimum)}}
                                                            - {{__($general->currency_sym)}} {{__($data->maximum)}}</li>
                                                    @else
                                                        <li>@lang('Fixed Invest Amount'):
                                                            <br> {{__($general->currency_sym)}} {{__($data->maximum)}}</li>
                                                    @endif
                                                    @if($data->capital_back_status == 1)

                                                        <li><span class="badge badge-success">@lang('Capital Will Return Back')</span></li>
                                                    @elseif($data->capital_back_status == 0)
                                                        <li><span class="badge badge-warning">@lang('Capital Will Store')</span></li>
                                                    @endif
                                                    <li>@lang('24/7Support')</li>
                                                </ul>
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
                </div>

            </div>
        </div>
    </div>
    <!-- price end -->

    <!-- inventor begin-->
    <div id="investors">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-6">
                    <div class="section-title text-center">
                        <h2>{{__($general->team_title)}}</h2>
                        <p>{{__($general->team_sub_title)}}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($team as $data)
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                        <div class="box">
                            <div class="image">
                                <img class="img-fluid" src="{{asset('assets/images/team/'.$data->image)}}" alt="">
                                <div class="social_icon">
                                    <ul>
                                        <li>
                                            <a target="_blank" href="{{$data->tw_link}}">
                                                <i class="fa fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a target="_blank" href="{{$data->fb_link}}">
                                                <i class="fa fa-facebook-f"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a target="_blank" href="{{$data->ln_link}}">
                                                <i class="fa fa-linkedin"></i>
                                            </a>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                            <div class="info">
                                <h5>{{__($data->name)}}</h5>
                                <p>{{__($data->designation)}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- inventor end -->

    <!-- faq begin-->
    <div id="faq" class="faq">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-6">
                    <div class="section-title text-center">
                        <h2>{{__($general->faq_title)}}</h2>
                        <p>{{__($general->faq_sub_title)}}</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="accordion" id="accordionExample">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12">
                                @foreach($faq as $key => $data)
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed"
                                                        type="button" data-toggle="collapse"
                                                        data-target="#collapseOne{{$data->id}}"
                                                        aria-expanded="false" aria-controls="collapseOne">
                                                    {{__($data->title)}}
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseOne{{$data->id}}" class="collapse {{ $key++ == 1 ? 'show': '' }}"
                                             data-parent="#accordionExample">
                                            <div class="card-body">
                                                {{__($data->description)}}
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
    </div>
    <!-- faq end -->

    <!-- newsletter begin-->
    <div class="newsletter" style="background: url({{asset('assets/images/footer.jpg')}})">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-7">
                    <div class="section-title text-center">
                        <h2>{{__($general->subscriber_title)}}</h2>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-7">
                    <form class="newsletter-form">
                        @csrf
                        <input type="email" name="subscribe_email" placeholder="@lang('Enter your email...')">
                        <button type="submit">@lang('Subscribe Now')</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- newsletter end -->
    <div class="blog-post">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-8">
                    <div class="section-title text-center">
                        <h2 class="extra-margin">{{__($general->blog_title)}}</h2>
                        <p>{{__($general->blog_sub_title)}}</p>
                    </div>
                </div>
            </div>

            <div class="row">
                @foreach($know as $data)
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="single-blog">
                            <div class="part-img">
                                <img src="{{asset('assets/images/blog/'.$data->image)}}" alt="">
                            </div>
                            <div class="part-text">
                                <h3>
                                    <a href="{{route('blog.detail', ['id'=>$data->id,'any'=> Replace($data->title)])}}">{{__($data->title)}}</a>
                                </h3>
                                <h4>
                                    <span class="admin">@lang('By Admin') </span>.
                                    <span class="date">{{date('d M, Y', strtotime($data->created_at)) }} </span>

                                </h4>
                                <p> {!! short_text($data->text, 50) !!}</p>
                                <br>
                                <a class="read-more" href="{{route('blog.detail', ['id'=>$data->id,'any'=> Replace($data->title)])}}"><span><i
                                                class="fas fa-book-reader"></i></span> @lang('Read More')</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@stop
@section('script')
    <script>

        $('.newsletter-form').submit(function (e) {
            e.preventDefault();
            data = $(this).serialize();
            $.post('{{route('subscriber.store')}}', data, function (response) {
                if (response.success == true) {
                    swal(response.message, "", "success");
                    app.newdata.subscribe_email = '';
                } else {
                    swal(response.message, "", "warning");
                }
            });
        });

    </script>
@stop
