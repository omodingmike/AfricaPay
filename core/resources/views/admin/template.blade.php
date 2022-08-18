@extends('admin.layout.master')
@section('css')
    <link rel="stylesheet" href="{{asset('assets/admin/css/template.css')}}">
@stop
@section('body')

    <div class="row">
        <div class="col-md-12">

            @if (count($errors) > 0)
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <strong class="col-md-12"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Alert!</strong>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif

            <div class="tile">
                <div class="tile-body">
                    <section id="demo-section" class="demo-section">
                                <div class="container">
                                    <div class="row">

                                        <div class="col-md-6">
                                            <!-- Demo Content Start -->
                                            <form method="post" action="{{route('template.active')}}">
                                                @csrf
                                                <input type="hidden" value="template1." name="status">

                                            <div class="demo-content">
                                                <div class="demo-thumb">
                                                    <div class="demo-thumb1">
                                                        <div class="demo-overlay">
                                                            <a href="#">
                                                                <span class="figure figure1 pranto-fig1" style="background: url({{asset('assets/template/temp-1.png')}});"></span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="demo-text">
                                                    <h6>Template One</h6>
                                                    <button class="btn btn-primary" @if($general->template_active == 'template1.') disabled  @endif type="submit">Active</button>
                                                </div>
                                            </div>
                                            </form>
                                            <!-- Demo Content End -->
                                        </div>

                                        <div class="col-md-6">
                                            <!-- Demo Content Start -->
                                            <form method="post" action="{{route('template.active')}}">
                                                @csrf
                                                <input type="hidden" value="template2." name="status">
                                            <div class="demo-content">
                                                <div class="demo-thumb">
                                                    <div class="demo-thumb1">
                                                        <div class="demo-overlay">
                                                            <a href="#">
                                                                <span class="figure pranto-fig1" style="background: url({{asset('assets/template/temp-2.png')}})"></span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="demo-text">
                                                    <h6>Template Two</h6>
                                                    <button @if($general->template_active == 'template2.') disabled  @endif class="btn btn-primary" type="submit">Active</button>
                                                </div>
                                            </div>
                                            </form>
                                            <!-- Demo Content End -->
                                        </div>

                                        <div class="col-md-6">
                                            <!-- Demo Content Start -->
                                            <form method="post" action="{{route('template.active')}}">
                                                @csrf
                                                <input type="hidden" value="template3." name="status">
                                            <div class="demo-content">
                                                <div class="demo-thumb">
                                                    <div class="demo-thumb1">
                                                        <div class="demo-overlay">
                                                            <a href="#">
                                                                <span class="figure pranto-fig1" style="background: url({{asset('assets/template/temp-3.png')}})"></span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="demo-text">
                                                    <h6>Template Three</h6>
                                                    <button @if($general->template_active == 'template3.') disabled  @endif class="btn btn-primary" type="submit">Active</button>
                                                </div>
                                            </div>
                                            </form>
                                            <!-- Demo Content End -->
                                        </div>

                                        <div class="col-md-6">
                                            <!-- Demo Content Start -->
                                            <form method="post" action="{{route('template.active')}}">
                                                @csrf
                                                <input type="hidden" value="template4." name="status">
                                            <div class="demo-content">
                                                <div class="demo-thumb">
                                                    <div class="demo-thumb1">
                                                        <div class="demo-overlay">
                                                            <a href="#">
                                                                <span class="figure pranto-fig1" style="background: url({{asset('assets/template/temp-4.png')}})"></span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="demo-text">
                                                    <h6>Template Three</h6>
                                                    <button @if($general->template_active == 'template4.') disabled  @endif class="btn btn-primary" type="submit">Active</button>
                                                </div>
                                            </div>
                                            </form>
                                            <!-- Demo Content End -->
                                        </div>


                                    </div>
                                </div>
                            </section>

                </div>
            </div>
        </div>


    </div>

@stop
@section('script')
<script>
    (function ($) {
        "use strict";
        jQuery(document).on('ready', function() {

            /*---------------------------------*/
            /*---------- Scroll to top ----------*/
            /*---------------------------------*/
            var scroll_top = $('.scroll-top');
            scroll_top.on('click', function() {      // When arrow is clicked
                $('body,html').animate({
                    scrollTop : 0                       // Scroll to top of body
                }, 2000);
            });



            // one-page nav section start
            var header =$('#header-menu');
            header.onePageNav({
                currentClass: 'current',
                changeHash: false,
                scrollSpeed: 750,
                scrollThreshold: 0.5,
                filter: '',
                easing: 'swing',
                begin: function() {
                    //I get fired when the animation is starting
                },
                end: function() {
                    //I get fired when the animation is ending
                },
                scrollChange: function($currentListItem) {
                    //I get fired when you enter a section and I pass the list item of the section
                }
            });


            /*================================
            ============ Top Bar =============
            =================================*/

            /*--show and hide scroll to top Active --*/

            var scroll_top_active =  $('.scroll-top.active');
            var scroll_top = $('.scroll-top')
            $(window).on('scroll', function() {
                if ($(this).scrollTop() >= 50) {        // If page is scrolled more than 50px
                    scroll_top_active.removeClass('active');
                    scroll_top.addClass('active');    // Fade in the arrow
                } else {
                    scroll_top.removeClass('active');   // Else fade out the arrow
                }
            });




        });

        $(window).on('scroll', function() {
            /*================================
            ============= Main menu Fixed  =============
            =================================*/
            var fixed_top = $(".main-menu");
            var slicknav = $(".slicknav_menu");

            if( $(this).scrollTop() > 100 ) {
                fixed_top.addClass("menu-fixed animated fadeInDown");
                slicknav.addClass("slick-position");
            }
            else{
                fixed_top.removeClass("menu-fixed animated fadeInDown");
                slicknav.removeClass("slick-position");
            }
            var back_top = $('#back-to-top');

            if ($(this).scrollTop() > 100) {
                back_top.fadeIn();
            } else {
                back_top.fadeOut();
            }

            /*================================
            ============= Scroll Fixed  =============
            =================================*/
            var back_top = $('#back-to-top');

            if ($(this).scrollTop() > 100) {
                back_top.fadeIn();
            } else {
                back_top.fadeOut();
            }


        });


    })(jQuery);
</script>
@stop
