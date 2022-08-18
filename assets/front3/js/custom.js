(function ($) {
    "use strict";

    jQuery(document).ready(function () {
        /*---------------------------------------------------
            Project Grid
        ----------------------------------------------------*/
        var Container = $('.container');

        Container.imagesLoaded(function () {
            // Project Grid With Filtering
            var $grid = $('.project-items').isotope({
                itemSelector: '.project-grid'
            });

            var portfolio = $('.project-menu');
            portfolio.on('click', 'button', function () {
                $(this).addClass('active').siblings().removeClass('active');
                var filterValue = $(this).attr('data-filter');
                $grid.isotope({
                    filter: filterValue
                });
            });

        });

        /*---------------------------------------------------
            Home Slider
        ----------------------------------------------------*/
        var  $headerCarusel = $('.slider');
        $headerCarusel.owlCarousel({
            loop: true,
            navText: ['<i class="icofont-thin-left"></i>', '<i class="icofont-thin-right"></i>'],
            nav: true,
            dots:false,
            autoplay: true,
            autoplayTimeout: 5000,
            animateOut: 'fadeOut',
            animateIn: 'fadeIn',
            smartSpeed: 450,
            responsive: {
                0: {
                    items: 1,
                    nav:false
                },
                768: {
                    items: 1,
                    nav:false
                },
                991: {
                    items: 1
                },
                1200: {
                    items: 1
                },
                1920: {
                    items: 1
                }
            }
        });
        
        /*---------------------------------------------------
            Testimonial Carousel
        ----------------------------------------------------*/
        var $testimonialCarousel = $('.testimonial');
        $testimonialCarousel.owlCarousel({
            loop: true,
            margin:30,
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 1
                },
                991: {
                    items: 2
                },
                1200: {
                    items: 2
                },
                1920: {
                    items: 3
                }
            }
        });

        /*---------------------------------------------------
            Partner Carousel
        ----------------------------------------------------*/
        var $partnerCarousel = $('.partner-items');
        $partnerCarousel.owlCarousel({
            loop: true,
            margin: 30,
            autoplay:true,
            autoplayTimeout:3000,
            responsive: {
                0: {
                    items: 1
                },
                450:{
                    items:2
                },
                768: {
                    items: 3
                },
                991: {
                    items: 3
                },
                1200: {
                    items: 4
                },
                1920: {
                    items: 4
                }
            }
        });

        /*---------------------------------------------------
            Counter
        ----------------------------------------------------*/
        var $counter = $('.count-number');
        $counter.counterUp({
            delay: 10, // the delay time in ms
            time: 1000 // the speed time in ms
        });
        /*---------------------------------------------------
            Project PopUp Image
        ----------------------------------------------------*/
        var $imgpopup = $('.popup-img');
        $imgpopup.magnificPopup({
            type: 'image',
            disableOn: false,
            gallery: {
                enabled: true
            }
        });

        /*---------------------------------------------------
            PopUp Video
        ----------------------------------------------------*/
        var $vidpopUp =  $('.popup-video')
        $vidpopUp.magnificPopup({
            disableOn: 300,
            type: 'iframe',
            mainClass: 'mfp-fade',
            removalDelay: 160,
            preloader: false,
            fixedContentPos: false
        });

        /*---------------------------------------------------
            Click To Top
        ----------------------------------------------------*/
        $(document).on('click', '.click-top a[href=#top]', function () {
            $('body,html').animate({
                scrollTop: 0
            }, 600);
            return false;
        });
    });

    jQuery(window).on('scroll', function () {
        /*---------------------------------------------------
            Click To Top
        ----------------------------------------------------*/
        var $clickTop = $('.click-top')
        if ($(this).scrollTop() > 250) {
            $clickTop.fadeIn();
        } else {
            $clickTop.fadeOut();
        }



    });

    $('.navbar-nav li a').on('click', function (e) {


        var anchor = $(this).attr('href');
        var pranto = anchor.charAt(0);
        if(pranto == '#')
        {
            e.preventDefault();
            var top = $(anchor).offset().top;
            $('html, body').animate({
                scrollTop: $(anchor).offset().top
            }, 1000);
            $(this).parent().addClass('active').siblings().removeClass('active');
        }

    });

    /*---------------------------------------------------
        Site Preloader
    ----------------------------------------------------*/
    jQuery(window).load(function () {
        var $preloader = $('.site-preloader');
        $preloader.fadeOut(500);
    });


}(jQuery));
