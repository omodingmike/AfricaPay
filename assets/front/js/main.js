(function ($) {
	"use strict";
    jQuery(document).ready(function($){

        $('.single-price').on('mouseover', function(){
            $(this).addClass('special');
        }); 
        $('.single-price').on('mouseout', function () {
            $(this).removeClass('special');
        }); 
        
        /*--------------------
            wow js init
        ---------------------*/
        new WOW().init();


        //======================================
        //========== magnificPopup video ============
        //======================================
        $('.venobox').magnificPopup({
            type: 'video'
        });
        $('.image-popup').magnificPopup({
            type: 'image'
        }); 
        
        $('.scroll-to-top').on('click', function () {
            $("html,body").animate({
                scrollTop: 0
            }, 1000);
        });
 
    });

    //define variable for store last scrolltop
    var lastScrollTop = '';
    
    $(window).on('scroll', function () {

        
        //back to top show/hide
        var ScrollTop = $('.scroll-to-top');
       if ($(window).scrollTop() > 300) {
           ScrollTop.fadeIn(1000);
       } else {
           ScrollTop.fadeOut(1000);
       }
       /*--------------------------
        sticky menu activation
       -------------------------*/
        var st = $(this).scrollTop();
        var mainMenuTop = $('.header-bottom');
        if ($(window).scrollTop() > 300) {
            if (st > lastScrollTop) {
                // hide sticky menu on scrolldown 
                mainMenuTop.removeClass('nav-fixed');
                
            } else {
                // active sticky menu on scrollup 
                mainMenuTop.addClass('nav-fixed');
            }

        } else {
            mainMenuTop.removeClass('nav-fixed ');
        }
        lastScrollTop = st;
       
    });
           
    $(window).on('load',function(){
        /*-----------------
            preloader
        ------------------*/
        var preLoder = $(".preloader");
        preLoder.fadeOut(1000);
       
    });

    $('#navbar-nav li a').on('click', function (e) {


        var anchor = $(this).attr('href');
        var anchorRef = $(this).attr('data-link');



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
    
}(jQuery));	







