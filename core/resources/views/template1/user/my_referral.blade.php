@extends(activeTemp().'layouts.master')
@section('style')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/front/css/custom.css')}}">
@stop
@section('content')
    <!-- page title begin-->
    <div class="page-title">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-6">
                    <h2 class="extra-margin">{{__($pt)}}</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- page title end -->

    <!-- counter begin-->
    @include(activeTemp().'layouts.balance_show')
    <!-- counter end -->
    <br>


    <div class="blog-post" style="padding:0" id="refpranto">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-8">
                    <div class="section-title text-center">
                        <h2 class="extra-margin">@lang('My Referral Link')</h2>
                    </div>
                </div>
            </div>

            <div class="row wow rubberBand">
                <div class="col-md-12">
                    <div class="single-blog">
                        <div class="part-text">
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-6">
                                    <div class="widget widget_search">
                                        <form name="search_form" id="copyBoard" class="sayit_search_form">
                                            <span style="color: black"  id="copybtn" data-copytarget="#ref" class="sayit_icon_search"><i id="copybtn" data-copytarget="#ref"  class="fa fa-copy"></i> </span>
                                            <input readonly class="sayit_field_search" type="url" id="ref" name="referral_link"  value="{{url('/')}}/register/{{Auth::user()->username}}"  form="search_form">
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


    <div class="blog-post" style="padding:0" id="refpranto">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-8">
                    <div class="section-title text-center">
                        <h2 class="extra-margin">@lang('My Referral Statistic')</h2>
                    </div>
                </div>
            </div>

            <div class="row wow rubberBand">
                <div class="col-md-12">
                    <div class="single-blog">

                        <div class="part-text pranto-ul">
                            <ul style="width: 100%">
                                <li class="container"><p> <strong>{{Auth::user()->username}}</strong> </p>
                                    <ul>
                                        {!! showBelowUser(Auth::id()) !!}
                                    </ul>
                                </li>

                            </ul>
                        </div>
                    </div>
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
