@extends(activeTemp().'layouts.master')
@section('style')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/front/css/custom.css')}}">
@stop
@section('content')

        <section class="tools-section pranto-tool">
            <div class="thm-container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="tools-content pranto-bread">
                            <h3>@lang('Welcome'), {{Auth::user()->name}}!</h3>
                        </div><!-- /.tools-content -->
                    </div><!-- /.col-md-6 -->
                </div><!-- /.row -->
            </div><!-- /.thm-container -->
        </section><!-- /.tools-section -->

        @include(activeTemp().'layouts.balance_show')

        <section class="about-section sec-pad">
            <div class="thm-container">
                <div class="row">
                   <!-- /.col-md-6 -->
                    <div class="col-md-12">
                        <!-- /.title -->
                        <div class="row">

                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <div class="single-about-box hvr-bounce-to-bottom">
                                    <div class="icon-box">
                                        <i class="fa fa-money"></i>
                                    </div><!-- /.icon-box -->
                                    <h3>@lang('Total Deposited')</h3>
                                    <p> {{__($general->currency_sym)}} {{$total_deposit->sum('amount')}}</p>
                                    <a href="{{route('user.deposit.history')}}" class="read-more">@lang('View Report')</a>
                                </div><!-- /.single-about-box -->
                            </div><!-- /.col-md-6 -->

                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <div class="single-about-box hvr-bounce-to-bottom">
                                    <div class="icon-box">
                                        <i class="fa fa-reply"></i>
                                    </div><!-- /.icon-box -->
                                    <h3>{{__('Total Withdrawal')}}</h3>
                                    <p> {{__($general->currency_sym)}} {{$total_withdraw->sum('amount')}}</p>
                                    <a href="{{route('withdraw.history')}}" class="read-more">@lang('View Report')</a>
                                </div><!-- /.single-about-box -->
                            </div><!-- /.col-md-6 -->

                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <div class="single-about-box hvr-bounce-to-bottom">
                                    <div class="icon-box">
                                        <i class="fa fa-undo"></i>
                                    </div><!-- /.icon-box -->
                                    <h3>@lang('Total Earned Interest')</h3>
                                    <p> {{__($general->currency_sym)}} {{$total_interest}}</p>
                                    <a href="{{route('user.interest.log')}}" class="read-more">@lang('View Report')</a>
                                </div><!-- /.single-about-box -->
                            </div><!-- /.col-md-6 -->

                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <div class="single-about-box hvr-bounce-to-bottom">
                                    <div class="icon-box">
                                        <i class="fa fa-users"></i>
                                    </div><!-- /.icon-box -->
                                    <h3>@lang('Total Referral')</h3>
                                    <p>{{$total_ref->count()}}</p>
                                    <a href="{{url('/referral')}}" class="read-more">@lang('View Details')</a>
                                </div><!-- /.single-about-box -->
                            </div><!-- /.col-md-6 -->

                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <div class="single-about-box hvr-bounce-to-bottom">
                                    <div class="icon-box">
                                        <i class="fa fa-credit-card-alt"></i>
                                    </div><!-- /.icon-box -->
                                    <h3>@lang('Total Referral Commission')</h3>
                                    <p>{{__($general->currency_sym)}} {{$total_ref_com->sum('amount')}}</p>
                                    <a href="{{url('referral/commission')}}" class="read-more">@lang('View Details')</a>
                                </div><!-- /.single-about-box -->
                            </div><!-- /.col-md-6 -->

                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <div class="single-about-box hvr-bounce-to-bottom">
                                    <div class="icon-box">
                                        <i class="fa fa-exchange"></i>
                                    </div><!-- /.icon-box -->
                                    <h3>@lang('Total Transaction')</h3>
                                    <p>{{$total_trans->count()}}</p>
                                    <a href="{{route('user.transaction')}}" class="read-more">@lang('View Details')</a>
                                </div><!-- /.single-about-box -->
                            </div><!-- /.col-md-6 -->


                        </div><!-- /.row -->

                    </div><!-- /.col-md-6 -->
                </div><!-- /.row -->
            </div><!-- /.thm-container -->
        </section><!-- /.about-section -->

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
