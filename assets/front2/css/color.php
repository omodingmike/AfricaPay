<?php
header ("Content-Type:text/css");
$color = "#746EF1"; // Change your Color Here
$color2 = "#746EF1"; // Change your Color Here

function checkhexcolor($color) {
    return preg_match('/^#[a-f0-9]{6}$/i', $color);
}
function checkhexcolor2($color2) {
    return preg_match('/^#[a-f0-9]{6}$/i', $color2);
}

if( isset( $_GET[ 'color' ] ) AND $_GET[ 'color' ] != '' ) {
    $color = "#".$_GET[ 'color' ];
}

if( !$color OR !checkhexcolor( $color ) ) {
    $color = "#746EF1";
}


if( isset( $_GET[ 'color2' ] ) AND $_GET[ 'color2' ] != '' ) {
    $color2 = "#".$_GET[ 'color2' ];
}

if( !$color OR !checkhexcolor2( $color2 ) ) {
    $color2 = "#746EF1";
}


function hex2rgba( $color, $opacity) {

    if ($color[0] == '#') {
        $color = substr($color, 1);
    }
    if (strlen($color) == 6) {
        list($r, $g, $b) = array($color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5]);
    } elseif (strlen($color) == 3) {
        list($r, $g, $b) = array($color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2]);
    } else {
        return false;
    }
    $r = hexdec($r);
    $g = hexdec($g);
    $b = hexdec($b);
    $rgb = 'rgba('.$r. ',' .$g .',' .$b. ',' . $opacity.')';

    return $rgb;
}

function hex2rgba2( $color2, $opacity2) {

    if ($color2[0] == '#') {
        $color2 = substr($color2, 1);
    }
    if (strlen($color2) == 6) {
        list($r, $g, $b) = array($color2[0] . $color2[1], $color2[2] . $color2[3], $color2[4] . $color2[5]);
    } elseif (strlen($color2) == 3) {
        list($r, $g, $b) = array($color2[0] . $color2[0], $color2[1] . $color2[1], $color2[2] . $color2[2]);
    } else {
        return false;
    }
    $r = hexdec($r);
    $g = hexdec($g);
    $b = hexdec($b);
    $rgb = 'rgba('.$r. ',' .$g .',' .$b. ',' . $opacity2.')';

    return $rgb;
}


?>

.preloader,
.btn-primary,
.pricing-section .single-pricing .btn-box a, .login-button,
.single-team .social a:hover,
.scroll-to-top,
.blog-post .widget .widgettitle:after, .blog-post .widget .widgettitle:after,
.call-to-action-style-one,
.get-in-touch .form-content .inner form .frm-grp button[type=submit],
.our-news-letter .thm-container .inner form.news-letter button,
.tools-satisfaction .single-tool-satisfaction .icon-box .inner,
.header-navigation ul.navigation-box > li > a.join-btn{
background-color: <?php echo $color; ?>;
}

.slider-home-one .content a.thm-button:hover,
.tsk-contact-info .icon-bar i,
.btn-primary,
.panel-primary>.panel-heading,
.pagination>.active>a, .pagination>.active>a:focus, .pagination>.active>a:hover, .pagination>.active>span, .pagination>.active>span:focus, .pagination>.active>span:hover,
.call-to-action-style-one .cta-btn-box .cta-btn{
background: linear-gradient(to right, <?php echo $color2; ?> 0%, <?php echo $color2; ?> 28%, <?php echo $color; ?> 100%);
border-color: <?php echo $color2; ?>;
}

.panel-primary{
border-color: <?php echo $color2; ?>;
}

#minimal-bootstrap-carousel.slider-home-one .carousel-inner .item,
.tools-section,
.brand-section,
.process-section,
.contact .contact-form .btn-contact:hover,
.testimonial-section .testimonial-carousel.owl-theme .owl-dots .owl-dot.active span,
.about-section .single-about-box:before{
background: linear-gradient(to right, <?php echo $color; ?> 0%, <?php echo $color; ?> 28%, <?php echo $color2; ?> 100%);
}

.about-section .single-about-box:hover .icon-box,
.pricing-section .single-pricing:before,
.contact .contact-form .btn-contact,
.our-philoshopy .philoshopy-content a.learn-more{
background: linear-gradient(to right, <?php echo $color2; ?> 0%, <?php echo $color2; ?> 28%, <?php echo $color; ?> 100%);
}

.statics-section .single-statics .icon-box i,
.about-section .single-about-box .icon-box i,
.pricing-section .single-pricing .percent span,
.blog-post .single-blog .part-text a.read-more,
.blog-post .single-blog .part-text h3 a:hover,
.process-section .single-process .icon-box i,
.footer .footer-top .footer-right .footer-social a:hover,
.statics-section .single-statics .text-box span{
color: <?php echo $color; ?> !important;
}

.about-section .single-about-box a{
color: <?php echo $color2; ?> !important;
}
.about-section .single-about-box:hover .icon-box i{
    color:white !important;
}

.faq-section .accrodion-grp .accrodion{
    box-shadow: 0px 0px 10px <?php echo hex2rgba2($color,0.2) ?>;
}

.tsk-contact-info .contact-info-item,
.contact .contact-form .form-group input.form-control,
.blog-post .single-blog .part-text a.read-more:after,
.contact .contact-form .form-group textarea,
.contact .contact-form{
box-shadow: 1px 1px 2px black, 0 0 25px <?php echo $color; ?>, 0 0 5px <?php echo $color2; ?>;
}

.header-navigation ul.navigation-box > li.active > a, .header-navigation ul.navigation-box > li.current > a, .header-navigation ul.navigation-box > li:hover > a{
    color: #2d2d2d;
}

.blog-post .single-blog .part-text a.read-more{
border-top: 1px solid <?php echo $color; ?>;
border-left: 1px solid <?php echo $color; ?>;
border-bottom: 1px solid <?php echo $color2; ?>;
border-right: 1px solid <?php echo $color2; ?>;
}

.blog-post .single-blog,
.blog-post .widget_search input,
.footer .footer-bottom .thm-container{
border: 1px solid <?php echo hex2rgba2($color,0.13) ?>;
}

.blog-post .single-blog .part-text a.read-more:after{
background-image: -webkit-linear-gradient(-30deg, <?php echo $color; ?> 0%, <?php echo $color2; ?> 100%);
}