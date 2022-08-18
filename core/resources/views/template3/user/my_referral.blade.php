@extends(activeTemp().'layouts.master')
@section('style')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/front/css/custom.css')}}">
@stop
@section('content')

        <section class="page-content">
            <div class="page-heading page-heading-bg pranto-heading">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <h1 class="title pranto-title">{{__($pt)}}</h1>
                        </div>
                    </div>
                </div>
            </div>
            @include(activeTemp().'layouts.balance_show')
        </section>


        <div class="blog-wrap blog-page">
            <!--Start Container-->
            <div class="container">

                <!--Start Blog Post Row-->
                <div class="row">
                    <div class="col-md-12">
                        <!--Start Blog Post-->
                        <div class="single-blog-post">
                            <div class="content">
                                <div class="post-meta">
                                    <h2 class="post-title text-center">@lang('My Referral Link')</h2>
                                </div>
                                <div class="post-content">
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
                            <!--End Blog Post-->
                    </div>
                    <!--End Sidebar-->
                </div>
                <!--End Blog Sidebar Col-->

                <div class="row">
                    <div class="col-md-12">
                        <!--Start Blog Post-->
                        <div class="single-blog-post">
                            <div class="content">
                                <div class="post-meta">
                                    <h2 class="post-title text-center">@lang('My Referral Statistic')</h2>
                                </div>
                                <div class="post-content">
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
                        <!--End Blog Post-->
                    </div>
                    <!--End Sidebar-->
                </div>
            </div>
            <!--End Blog Post Row-->
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
