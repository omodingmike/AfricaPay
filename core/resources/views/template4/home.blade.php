@extends(activeTemp().'layouts.master')
@section('style')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/front/css/custom.css')}}">
@stop
@section('content')
    <div class="hyip-breadcrump" style="background-image: url({{asset('assets/images/bred.jpg')}}); background-size: cover; ">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="breadcrump-title pranto-title text-center">
                        <h2 class="add-space">@lang('Welcome'), {{Auth::user()->name}}!</h2>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="single-widget" id="search-bar">
                                <form class="search sayit_search_form" name="search_form" id="copyBoard">
                                    <input class="sayit_field_search" type="url" id="ref" name="referral_link"  value="{{url('/')}}/register/{{Auth::user()->username}}" readonly>
                                    <button id="copybtn" data-copytarget="#ref" type="button"><i id="copybtn" data-copytarget="#ref" class="fa fa-copy"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include(activeTemp().'layouts.balance_show')
    <!-- feature begin-->
    <div class="feature">
        <div class="container">


            <div class="row">

                <div class="col-xl-4 col-lg-4 col-md-6">
                    <a href="{{route('user.deposit.history')}}">
                    <div class="single-feature">
                        <div class="part-icon">
                            <i class="fa fa-money"></i>
                        </div>
                        <div class="part-text">
                            <h3>@lang('Total Deposited')</h3>
                            <p> {{__($general->currency_sym)}} {{$total_deposit->sum('amount')}}</p>
                        </div>
                    </div>
                    </a>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-6">
                    <a href="{{route('withdraw.history')}}">
                    <div class="single-feature">
                        <div class="part-icon">
                            <i class="fa fa-reply"></i>
                        </div>
                        <div class="part-text">
                            <h3>{{__('Total Withdrawal')}}</h3>
                            <p> {{__($general->currency_sym)}} {{$total_withdraw->sum('amount')}}</p>
                        </div>
                    </div>
                    </a>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-6">
                    <a href="{{route('user.interest.log')}}">
                    <div class="single-feature">
                        <div class="part-icon">
                            <i class="fa fa-undo"></i>
                        </div>
                        <div class="part-text">
                            <h3>@lang('Total Earned Interest')</h3>
                            <p> {{__($general->currency_sym)}} {{$total_interest}}</p>
                        </div>
                    </div>
                    </a>
                </div>


                <div class="col-xl-4 col-lg-4 col-md-6">
                    <a href="{{url('/referral')}}">
                    <div class="single-feature">
                        <div class="part-icon">
                            <i class="fa fa-users"></i>
                        </div>
                        <div class="part-text">
                            <h3>@lang('Total Referral')</h3>
                            <p>{{$total_ref->count()}}</p>
                        </div>
                    </div>
                    </a>
                </div>


                <div class="col-xl-4 col-lg-4 col-md-6">
                    <a href="{{url('referral/commission')}}">
                    <div class="single-feature">
                        <div class="part-icon">
                            <i class="fa fa-credit-card-alt"></i>
                        </div>
                        <div class="part-text">
                            <h3>@lang('Referral Commission') </h3>
                            <p>{{__($general->currency_sym)}} {{$total_ref_com->sum('amount')}}</p>
                        </div>
                    </div>
                    </a>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-6">
                    <a href="{{route('user.transaction')}}">
                    <div class="single-feature">
                        <div class="part-icon">
                            <i class="fa fa-exchange"></i>
                        </div>
                        <div class="part-text">
                            <h3>@lang('Total Transaction')</h3>
                            <p>{{$total_trans->count()}}</p>
                        </div>
                    </div>
                    </a>
                </div>



            </div>
        </div>
    </div>
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
