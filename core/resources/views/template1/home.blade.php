@extends(activeTemp().'layouts.master')
@section('style')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/front/css/custom.css')}}">
@stop
@section('content')
    <!-- page title begin-->
    <div class="page-title">
        <div class="container">
            <div class="blog-post" style="padding:0">
                <div class="row ">
                    <div class="col-xl-6 col-lg-6 wow slideInRight">
                        <h2>@lang('Welcome'), {{Auth::user()->name}}!</h2>
                    </div>

                    <div class="col-xl-6 col-lg-6 col-md-12 wow slideInRight">

                        <div class="sidebar">
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12">

                                    <div class="widget widget_search">
                                        <form name="search_form" id="copyBoard" class="sayit_search_form">

                                            <span style="color: white" id="copybtn" data-copytarget="#ref" class="sayit_icon_search"><i
                                                        id="copybtn" data-copytarget="#ref" class="fa fa-copy"></i> </span>

                                            <input style="color: white; border: 1px solid white;" class="sayit_field_search" type="url"
                                                   id="ref" name="referral_link" value="{{url('/')}}/register/{{Auth::user()->username}}"
                                                   form="search_form">
                                            <div class="clear"></div>
                                        </form>
                                    </div>


                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- page title end -->

    <!-- counter begin-->
    @include(activeTemp().'layouts.balance_show')
    <!-- counter end -->

    <!-- about begin -->
    <div class="about">
        <div class="container">

            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-6 wow pulse">
                    <div class="single-about">
                        <div class="heading">
                            <div class="part-icon">
                                <i class="fa fa-money"></i>
                            </div>
                            <div class="part-text">
                                <h3>@lang('Total Deposited')</h3>
                            </div>
                        </div>
                        <h1 class="text-center">
                            <p> {{__($general->currency_sym)}} {{$total_deposit->sum('amount')}}</p>
                        </h1>
                        <a class="text-center" href="{{route('user.deposit.history')}}">@lang('View Report')</a>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-6 wow pulse">
                    <div class="single-about">
                        <div class="heading">
                            <div class="part-icon">
                                <i class="fa fa-reply"></i>
                            </div>
                            <div class="part-text">
                                <h3>{{__('Total Withdrawal')}}</h3>
                            </div>
                        </div>
                        <h1 class="text-center">
                            <p> {{__($general->currency_sym)}} {{$total_withdraw->sum('amount')}}</p>
                        </h1>
                        <a class="text-center" href="{{route('withdraw.history')}}">@lang('View Report')</a>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-6 wow pulse">
                    <div class="single-about">
                        <div class="heading">
                            <div class="part-icon">
                                <i class="fa fa-undo"></i>
                            </div>
                            <div class="part-text">
                                <h3>@lang('Total Earned Interest')</h3>
                            </div>
                        </div>
                        <h1 class="text-center">
                            <p> {{__($general->currency_sym)}} {{$total_interest}}</p>
                        </h1>
                        <a class="text-center" href="{{route('user.interest.log')}}">@lang('View Report')</a>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-6 wow pulse">
                    <div class="single-about">
                        <div class="heading">
                            <div class="part-icon">
                                <i class="fa fa-users"></i>
                            </div>
                            <div class="part-text">
                                <h3>@lang('Commission')</h3>
                            </div>
                        </div>
                        <h1 class="text-center">
                            <p>{{$total_ref->count()}}</p>
                        </h1>
                        <a href="{{url('/referral')}}">@lang('View Details')</a>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 wow pulse">
                    <div class="single-about">
                        <div class="heading">
                            <div class="part-icon">
                                <i class="fa fa-users"></i>
                            </div>
                            <div class="part-text">
                                <h3>@lang('Total Referral')</h3>
                            </div>
                        </div>
                        <h1 class="text-center">
                            <p>{{$total_ref->count()}}</p>
                        </h1>
                        <a href="{{url('/referral')}}">@lang('View Details')</a>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-6 wow pulse">
                    <div class="single-about">
                        <div class="heading">
                            <div class="part-icon">
                                <i class="fa fa-credit-card-alt"></i>
                            </div>
                            <div class="part-text">
                                <h3>@lang('Total Referral Commission') </h3>
                            </div>
                        </div>
                        <h1 class="text-center">
                            <p>{{__($general->currency_sym)}} {{$total_ref_com->sum('amount')}}</p>
                        </h1>
                        <a href="{{url('referral/commission')}}">@lang('View Details')</a>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-6 wow pulse">
                    <div class="single-about">
                        <div class="heading">
                            <div class="part-icon">
                                <i class="fa fa-exchange"></i>
                            </div>
                            <div class="part-text">
                                <h3>@lang('Total Transaction') </h3>
                            </div>
                        </div>
                        <h1 class="text-center">
                            <p>{{$total_trans->count()}}</p>
                        </h1>
                        <a href="{{route('user.transaction')}}">@lang('View Details')</a>
                    </div>
                </div>


            </div>
        </div>
    </div>

    @if(session()->has('message'))
        <div class="alert alert-success" role="alert">
            {{ session()->get('message') }}
        </div>
    @endif

@endsection

@section('script')

    <script>


        (function () {

            'use strict';

            // click events
            document.body.addEventListener('click', copy, true);

            // event handler
            function copy(e) {


                // find target element
                var
                    t = e.target,
                    c = t.dataset.copytarget,
                    inp = (c ? document.querySelector(c) : null);

                // is element selectable?
                if (inp && inp.select) {

                    // select text
                    inp.select();

                    try {
                        // copy text
                        document.execCommand('copy');
                        inp.blur();

                        // copied animation
                        t.classList.add('copied');
                        setTimeout(function () {
                            t.classList.remove('copied');
                        }, 1500);
                    } catch (err) {
                        alert('please press Ctrl/Cmd+C to copy');
                    }

                }

            }

        })();

    </script>

@stop
