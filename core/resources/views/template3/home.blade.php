@extends(activeTemp().'layouts.master')
@section('style')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/front/css/custom.css')}}">
@stop
@section('content')

        <section class="page-content">
        <div class="page-heading page-heading-bg pranto-heading">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <h1 class="title pranto-title">@lang('Welcome'), {{Auth::user()->name}}!</h1>
                    </div>

                    <div class="col-lg-6">
                        <div class="blog-sidebar">
                            <!--Start Search Widget-->
                            <div class="search-widget widget">
                                <form name="search_form" id="copyBoard" class="sayit_search_form">
                                    <div class="form-element">
                                        <input type="url" id="ref" name="referral_link" readonly  value="{{url('/')}}/register/{{Auth::user()->username}}" class="input-field">
                                        <button id="copybtn" data-copytarget="#ref" type="button" class="submit-btn"> <i id="copybtn" data-copytarget="#ref" class="icofont icofont-copy"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include(activeTemp().'layouts.balance_show')
        <!-- how we build area start-->
        <div class="we-build-area">
            <div class="container">

                <!--End Section Heading Row-->
                <div class="row">
                    <div class="col-md-4 col-sm-6 pranto-home-margin">
                        <div class="single-how-we-build"><!-- single how we build -->
                            <div class="thumb">
                                <div class="icon">
                                    <i class="fa fa-money"></i>
                                </div>
                            </div>

                            <div class="content pranto-content">
                                <h4 class="title">@lang('Total Deposited')</h4>
                                <p> {{__($general->currency_sym)}} {{$total_deposit->sum('amount')}}</p>
                            </div>
                        </div><!-- //.single how we build -->
                    </div>
                    <div class="col-md-4 col-sm-6 pranto-home-margin">
                        <div class="single-how-we-build"><!-- single how we build -->
                            <div class="thumb">
                                <div class="icon">
                                    <i class="fa fa-reply"></i>
                                </div>
                            </div>
                            <div class="content pranto-content">
                                <h4 class="title">{{__('Total Withdrawal')}}</h4>
                                <p>{{__($general->currency_sym)}} {{$total_withdraw->sum('amount')}}</p>
                            </div>
                        </div><!-- //.single how we build -->
                    </div>
                    <div class="col-md-4 col-sm-6 pranto-home-margin">
                        <div class="single-how-we-build"><!-- single how we build -->
                            <div class="thumb">
                                <div class="icon">
                                    <i class="fa fa-undo"></i>
                                </div>
                            </div>
                            <div class="content pranto-content">
                                <h4 class="title">@lang('Total Earned Interest')</h4>
                                <p>{{__($general->currency_sym)}} {{$total_interest}}</p>
                            </div>
                        </div><!-- //.single how we build -->
                    </div>
                    <div class="col-md-4 col-sm-6 pranto-home-margin">
                        <div class="single-how-we-build"><!-- single how we build -->
                            <div class="thumb">
                                <div class="icon">
                                    <i class="fa fa-users"></i>
                                </div>
                            </div>
                            <div class="content pranto-content">
                                <h4 class="title">@lang('Total Referral')</h4>
                                <p>{{$total_ref->count()}}</p>
                            </div>
                        </div><!-- //.single how we build -->
                    </div>

                    <div class="col-md-4 col-sm-6 pranto-home-margin">
                        <div class="single-how-we-build"><!-- single how we build -->
                            <div class="thumb">
                                <div class="icon">
                                    <i class="fa fa-credit-card-alt"></i>
                                </div>
                            </div>
                            <div class="content pranto-content">
                                <h4 class="title">@lang('Referral Commission')</h4>
                                <p>{{__($general->currency_sym)}} {{$total_ref_com->sum('amount')}}</p>
                            </div>
                        </div><!-- //.single how we build -->
                    </div>

                    <div class="col-md-4 col-sm-6 pranto-home-margin">
                        <div class="single-how-we-build"><!-- single how we build -->
                            <div class="thumb">
                                <div class="icon">
                                    <i class="fa fa-exchange"></i>
                                </div>
                            </div>
                            <div class="content pranto-content">
                                <h4 class="title">@lang('Total Transaction')</h4>
                                <p>{{$total_trans->count()}}</p>
                            </div>
                        </div><!-- //.single how we build -->
                    </div>
                </div>
            </div>
        </div>
        <!-- how we build area end -->
        </section>

@endsection

@section('script')

    <script>


        (function() {

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
                        setTimeout(function() { t.classList.remove('copied'); }, 1500);
                    }
                    catch (err) {
                        alert('please press Ctrl/Cmd+C to copy');
                    }

                }

            }

        })();

    </script>

@stop
